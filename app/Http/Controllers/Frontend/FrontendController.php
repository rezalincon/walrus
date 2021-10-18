<?php

namespace App\Http\Controllers\Frontend;

use App\Events\OrderCompleteEvent;
use App\Events\VendorOrderEvent;
use App\Model\VendorNotification;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Other;
use App\Model\SubCategory;
use App\Model\ChildCategory;
use App\Model\Brand;
use App\Model\Product;
use App\Model\Vendor;
use App\Model\Cart;
use App\Model\Shipping;
use App\Model\Order;
use App\Model\OrderProduct;
use App\Model\Slider;
use App\Model\HeaderText;
use App\Notifications\VendorOrderNotification;
use App\Rating;
use App\Model\Advertise;
use App\Model\Admin;
use App\Notifications\OrderNotification;
use App\Model\Service;
use App\Model\Gallery;
use App\Model\Campaign;
use App\Model\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Vendor\Banner;
class FrontendController extends Controller
{
    public function index()
    {
        $campaign1=Campaign::where('type','=','banner1')->first();
        if($campaign1)
        {
            $campaign1= $campaign1->file;
        }
        else {
            $campaign1="common.png";
        }
        $link1=Campaign::where('type','=','link1')->first();
        if($link1)
        {
            $link1= $link1->file;
        }
        else {
            $link1="/";
        }

        $campaign2=Campaign::where('type','=','banner2')->first();
        $pop=Campaign::where('type','=','popup')->first();

        if($campaign2)
        {
            $campaign2= $campaign2->file;
        }
        else {
            $campaign2="common.png";
        }
        $link2=Campaign::where('type','=','link2')->first();
        if($link2)
        {
            $link2= $link2->file;
        }
        else {
            $link1="/";
        }
        
        $brand=Brand::whereHas('products')->where('is_featured','=',1)->where('status',1)->limit(10)->get();

        $product= Product::whereHas('vendor',function($q){$q->where('status',1);})->where('featured',1)->where('status',1)->where('stock','>',0)->where('offer_product','=',0)->limit(120)->get();

        $offer_product= Product::whereHas('vendor',function($q){$q->where('status',1);})->where('offer_product','=',1)->where('stock','>',0)->where('status',1)->limit(24)->latest()->get();

        $shop= Vendor::whereHas('products',function($q){$q->where('status',1);})->where('s_status','=',1)->where('feature',1)->limit(18)->get();


        $slider=Slider::get();
        $advertise=Advertise::get();
        $service=Service::get();

       // $rating = Rating::get();

        $orderProducts = OrderProduct::with('product')
                                ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
                                ->get();

        $vendors = clone $orderProducts;
        $vendorIds = $vendors->pluck('vendor_id')->toArray();
        $vendorIds= array_unique($vendorIds);
        $vendorData = [];
        // return $vendorIds;
        foreach ($vendorIds as $vendorId)
        {
            $orders = clone $orderProducts;
            $orders = $orders->where('vendor_id','=',$vendorId)->all();
            $vendor = [];
            $vendor['vendor_id'] = $vendorId;
            $total = 0;
            foreach ($orders as $order) {
                $total += ($order->qty * ($order->product->price ?? 0));
            }
            $vendor['total_sell'] = $total;

            $vendorData[] = $vendor;
        }
        $tShops = [];
        $minimumAmountTopVEndor = Other::first();
        foreach ($vendorData as $top)
        {
           if($top['total_sell'] >= $minimumAmountTopVEndor->top_vendor_amount)
           {
               $tShops[]=Vendor::where('id','=',$top['vendor_id'])->limit(8)->first();
           }
        }

        $categories = Category::whereHas('products',function($q){$q->where('status',1);})->where('status',1)->where('is_featured',1)->limit(12)->get();
       // return $shops;
        return view('frontend.main',compact('brand','product','offer_product','shop','slider','advertise','service','tShops','campaign1','campaign2','link1','link2','pop','categories'));
    }

    public function moreBrand(){
        $brand=Brand::whereHas('products',function($q){$q->where('status',1);})->where('status','=',1)->paginate(6);
        return view('frontend.brand.more_brand',compact('brand'));
    }

    public function productByBrand($id){

        $productByBrand=Product::whereHas('vendor',function($q){$q->where('s_status',1);})->where('brand_id',$id)->where('status',1)->paginate(6);
        return view('frontend.brand.brand_product',compact('productByBrand'));
    }

    public function brandProductSearchAjax(Request $request, $brandId)
    {
        $products = Product::where('brand_id',$brandId)
                        ->where('name','LIKE','%'.$request->searchText.'%')->orderBy('name')->get();
        return response()->json($products,200);
    }

    public function brandSearchAjax(Request $request)
    {
        $brands = Brand::where('name','LIKE','%'.$request->searchText.'%')->where('status',1)->orderBy('name')->get();
        return response()->json($brands,200);
    }


// public function productDetails($id){

//     $star1 = Rating::where('product_id',$id)->where('rating',1)->get();
//     $star2 = Rating::where('product_id',$id)->where('rating',2)->get();
//     $star3 = Rating::where('product_id',$id)->where('rating',3)->get();
//     $star4 = Rating::where('product_id',$id)->where('rating',4)->get();
//     $star5 = Rating::where('product_id',$id)->where('rating',5)->get();
//     $rating = Rating::where('product_id',$id)->get();
//     $productDetails=Product::where('id',$id)->get();
//     $productGallery=Gallery::where('product_id',$id)->get();
//     $categoryProducts = Product::where('category_id',$productDetails[0]->category_id)->limit(5)->get();
//     $services = Service::all();
//     $banner=Advertise::limit(4)->get();
//     return view('frontend.product.product_details',
//         compact('productDetails','productGallery','rating',
//             'star1','star2','star3','star4','star5','categoryProducts','services','banner'));
// }

public function productDetails($id){

    $productDetails= Product::where('id',$id)->get();
    
    $star1 = Rating::where('product_id',$productDetails[0]->id)->where('rating',1)->get();
    $star2 = Rating::where('product_id',$productDetails[0]->id)->where('rating',2)->get();
    $star3 = Rating::where('product_id',$productDetails[0]->id)->where('rating',3)->get();
    $star4 = Rating::where('product_id',$productDetails[0]->id)->where('rating',4)->get();
    $star5 = Rating::where('product_id',$productDetails[0]->id)->where('rating',5)->get();
    $rating = Rating::where('product_id',$productDetails[0]->id)->get();

    $productGallery=Gallery::where('product_id',$productDetails[0]->id)->get();
    $categoryProducts = Product::whereHas('vendor',function($q){$q->where('s_status',1);})->where('category_id',$productDetails[0]->category_id)->limit(5)->get();
    $services = Service::all();
    $banner=Advertise::limit(4)->get();
    return view('frontend.product.product_details',
        compact('productDetails','productGallery','rating',
            'star1','star2','star3','star4','star5','categoryProducts','services','banner'));
}


public function searchajax(Request $req){

    $products = Product::whereHas('vendor',function($q){$q->where('s_status',1);})->where('name','LIKE','%'.$req->search.'%')->get();

    $brands = Brand::whereHas('products',function($q){$q->where('status',1);})->where('name','LIKE','%'.$req->search.'%')->get();
    $vendors = Vendor::whereHas('products',function($q){$q->where('status',1);})->where('shop_name','LIKE','%'.$req->search.'%')->where('s_status',1)->get();
    return response()->json([$products,$brands,$vendors],200);
}

public function productAll(){
    $product=Product::whereHas('vendor', function($q){$q->where('status',1);})->where('status',1)->paginate(6);
    $categories = Category::all();
    return view('frontend.product.all_product',compact('product','categories'));
}

public function offerProduct(){
    $offer_product=Product::whereHas('vendor',function($q){$q->where('s_status',1);})->where('offer_product','=',1)->where('status',1)->limit(8)->latest()->paginate(6);
    $categories = Category::all();
    return view('frontend.product.offer-product',compact('offer_product','categories'));
}

public function cartView(){
    $id=Auth::id();
    $carts=Cart::where('user_id', $id)->get();
    $sum=Cart::where('user_id', $id)->sum('subtotal');
    return view('frontend.viewcart',compact('carts','sum'));
}

public function checkOut(){
     $id=Auth::id();
     $carts=Cart::where('user_id', $id)->get();
     $ship=Shipping::where('status','=',1)->get();
     $sum=Cart::where('user_id', $id)->sum('subtotal');
     $isOnlinePayment = 0;
     foreach ($carts as $row)
     {
        if ($row->product->online_payment == 1){
            $isOnlinePayment = 1;
        }
     }
     if(count($carts)<1){
        return Redirect()->route('view.cart')->with('success', 'Shopping cart is Empty Please Add Some product');
    }
    $users=Auth::user();

     return view('frontend.checkout',compact('users','carts','ship','sum','isOnlinePayment'));


}

    public function directcheckout($qty, $productId, $color = null, $size = null)
    {
        $id = Auth::id();
        $product = Product::where('id',$productId)->first();
        $price = $product->price;
        if ($size){
            $sizePrice = explode(",", $product->size_price);
            $sizes = explode(",",$product->size);
            for($i = 0; $i < count($sizes); $i++){
                if ($sizes[$i] == $size){
                    $price = $sizePrice[$i];
                    break;
                }
            }
        }
        $subtotal = (double)$price * (double)$qty;
        $cart = new Cart();
        $cart->name = $product->name;
        $cart->product_id = $product->id;
        $cart->size = $size;
        $cart->color = $color;
        $cart->qty = $qty;
        $cart->subtotal = floatval($subtotal);
        $cart->price = $price;
        $cart->photo = $product->photo;
        $cart->user_id = $id;
        $cart->vendor_id = $product->vendor->id;
        //$cart->save();

        //$carts = Cart::where('id',$cart->id)->get();
        $carts = array($cart);
        session()->put('cart',$carts);

        $ship=Shipping::where('status','=',1)->get();
        $sum = $subtotal;
        $isOnlinePayment = 0;
        if ($product->online_payment == 1){
            $isOnlinePayment = 1;
        }
        $users=Auth::user();

        return view('frontend.checkout'
            ,compact('users','carts','ship','sum','isOnlinePayment'));
    }


    public function orderComplete(Request $request){

        //----------- unique order code -------------
        function generateRandomString($length = 10) {
            $characters = '0123456789';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        $order_code = generateRandomString(6);

        // if order code is same, add extra 2 digits to make it unique
        $original_order_code = $order_code;
        $count = 0;
        while(true){
            $same_code = Order::where('order_id', $order_code)->first();
            if($same_code){
                $order_code = $original_order_code.mt_rand(0,9).(++$count);
            }
            else{
                break;
            }
        }

        $order=Order::create([
            'user_id'=>Auth::id(),
            'name'=>$request->name,
            'address'=>$request->address,
            'city'=>$request->city,
            'country'=>$request->country,
            'zip'=>$request->zip,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'note'=>$request->note,
            'payment_method'=>$request->payment,
            'subtotal'=>$request->subtotal,
            'shipping_method'=>$request->ship,
            'total'=>$request->total,
            'status'=>'pending',
            'order_id' => $order_code



           ]);
        $vendors = array();
        $order_product_id = array();
           if(Auth::user()){
            $idauth=Auth::id();
            if(session()->has('cart')){
                $cartShop = session('cart');
            }else{
                $cartShop=Cart::where('user_id',$idauth)->get();
            }

            // $cartShopx=Cart::where('user_id',$idauth)->get('product_id');

            // $collection = collect($cartShop['product_id']->toArray());

            // return $collection;
                foreach($cartShop as $confirmOrder){
                    $orderProduct=OrderProduct::create([
                    'order_id'=>$order->id,
                    'product_id'=>$confirmOrder->product_id,
                    'qty'=>$confirmOrder->qty,
                    'size'=>$confirmOrder->size,
                    'color'=>$confirmOrder->color,
                    'vendor_id'=>$confirmOrder->vendor_id,
                    'vendor_status' =>'Pending',
                ]);
                    array_push($vendors,$confirmOrder->vendor_id);
                    array_push($order_product_id, $orderProduct->id);
                    VendorNotification::create([
                       'order_code' => $order->order_id,
                        'order_id' => $order->id,
                        'order_product_id' => $orderProduct->id,
                        'name' => Auth::user()->name,
                        'type' => 'order',
                        'vendor_id' => $confirmOrder->vendor_id
                    ]);

                    $product = Product::find($confirmOrder->product_id);
                $product->decrement('stock',$confirmOrder->qty);

            }

        }


        // return $cartShop->product_id;

        $admins = Admin::all();

        //Notification::send( $admins, new OrderNotification( Auth::user()->name, $order->id, $order->order_id));
        if(count( $cartShop)<1){
            return Redirect()->route('view.cart')->with('success', 'Shopping cart is Empty Please Add Some product');
        }

        // send notification to all admins
        $admins = Admin::all();
//        $vendors = Vendor::all();
        Notification::send( $admins,new OrderNotification( Auth::user()->name, $order->id, $order->order_id,$vendors, $order_product_id));
        //Notification::send($vendors,new VendorOrderNotification(Auth::user()->name, $order->id, $order->order_id,$vendors));
        //Real time notification by pusher
        $a = date("Y/m/d h:i:sa");
        $name = Auth::user()->name;
        $order_id = $order->id;
        $order_code = $order->order_id;
        $created_at = $a;
        $text = 'has placed an order.';
        $type = 'order';
        $response = null;

        event(new OrderCompleteEvent($name,$order_id,$order_code,$created_at,$text,$type,$vendors, $order_product_id));
//        event(new VendorOrderEvent($name,$order_id,$order_code,$created_at,'vendorOrder', $vendors));
        //Real time notification by pusher ends
        if(session()->has('cart')){
            session()->forget('cart');
        }else{
            Cart::where('user_id',Auth::id())->delete();
        }

        $f=$order->id;
        $orders=OrderProduct::where('order_id',$f)->with('product','order')->get();
        return view('frontend.order_complete',compact('orders'));
    }

    public function profile(){
        // $customer = Auth::user();
        $orders = Order::where('user_id', Auth::id())->with('orderProduct')->get();
        return view('frontend.profile.customer-profile', compact('orders'));
    }

    public function orderDetails($id){

        // $order = Order::find($id)->with('orderProduct')->first();
        $orders=OrderProduct::where('order_id',$id)->with('product','order')->get();
        return view('frontend.profile.order-details', compact('orders'));
    }


//shopbystore

public function shopProduct($id){
    $shopProduct= Product::whereHas('vendor',function($q){$q->where('s_status',1);})->where('vendor_id',$id)->where('status',1)->paginate(6);

    $vendor= Vendor::where('id',$id)->get();
    
    $banner=Banner::where('vendor_id','=',$id)->first();

    $categories = Category::where('status',1)->get();
    return view('frontend.product.shop_product',compact('shopProduct','vendor','categories','banner'));

}

//Shop category product ajax
public function shopCategoryProduct($catId,$vendorId)
{
    $products = Product::whereHas('vendor',function($q){$q->where('s_status',1);})->with('sub_categories','ratings')->where('vendor_id',$vendorId)
                    ->where('category_id',$catId)->where('status',1)->orderBy('name')->get();
    return response()->json($products,200);
}

//Shop price filter ajax
public function shopPriceFilterProducts(Request $request, $vendorId)
{
    if (!isset($request->second)){
        $products = Product::with('sub_categories','ratings')
            ->where('vendor_id',$vendorId)
            ->where('status',1)
            ->where('price','>=',(int)$request->first)->orderBy('name')->get();
    }else{
        $products = Product::with('sub_categories','ratings')
            ->where('vendor_id',$vendorId)
            ->where('status',1)
            ->where('price','>=',(int)$request->first)
            ->where('price','<=',(int)$request->second)->orderBy('name')->get();
    }
    return response()->json($products,200);
}

 public function Shop(){
    $shop=Vendor::whereHas('products',function($q){$q->where('status',1);})->where('s_status','=',1)->paginate(6);
    return view('frontend.product.shop',compact('shop'));
 }

 //Shop search result by ajax
    public function shopSearchAjax(Request $request)
    {

        $vendors = Vendor::where('shop_name','LIKE','%'.$request->searchText.'%')
                        ->where('status',1)->get();
        return response()->json($vendors,200);
    }

public function categorizeProducts($c_id)
{
    $products=Product::whereHas('vendor',function($q){$q->where('s_status',1);})->where('category_id','=',$c_id)->where('status',1)->paginate(6);;
    $category=Category::where('id','=',$c_id)->first();
    return view('frontend.category.categorizeProducts',['products'=>$products,'category'=> $category]);
}
public function childCategorizeProducts($c_id)
{
    $products=Product::whereHas('vendor',function($q){$q->where('s_status',1);})->where('childcategory_id','=',$c_id)->where('status',1)->paginate(6);
    $ChildCategory=ChildCategory::where('id','=',$c_id)->first();
    return view('frontend.category.childCategorizeProducts',['products'=>$products,'ChildCategory'=> $ChildCategory]);
}
public function subCategorizeProducts($s_id)
{
    $products= Product::whereHas('vendor',function($q){$q->where('s_status',1);})->where('subcategory_id','=',$s_id)->where('status',1)->paginate(6);
    
    $SubCategory= SubCategory::where('id','=',$s_id)->first();
    return view('frontend.category.subCategorizeProducts',['products'=>$products,'SubCategory'=> $SubCategory]);
}

//ALl categories
public function allCategories()
{
    $categories = Category::whereHas('products', function($q){$q->where('status',1);})->where('status','=',1)->orderBy('name')->paginate(20);
    return view('frontend.category.allCategories',compact('categories'));
}

//Category Products filter by ajax
public function categoryProducts($catID)
{
    $products = Product::with('sub_categories','ratings')
        ->where('category_id',$catID)->where('status',1)->orderBy('name')
        ->get();
    return response()->json($products,200);
}

//offer category product filter by ajax
public function offerCategoryProducts($catID)
{
    $products = Product::with('sub_categories','ratings')
        ->where('offer_product','=',1)
        ->where('category_id',$catID)->where('status',1)->orderBy('name')
        ->get();
    return response()->json($products,200);
}

//Products by price filter
public function priceFilter(Request $request)
{
    if (!isset($request->second)){
        $products = Product::with('sub_categories','ratings')
        ->where('status',1)->where('price','>=',(int)$request->first)->orderBy('name')->get();
    }else{
        $products = Product::with('sub_categories','ratings')
            ->where('price','>=',(int)$request->first)
            ->where('status',1) ->where('price','<=',(int)$request->second)->orderBy('name')->get();
    }
    return response()->json($products,200);
}

    //offer product price filter
    public function offerPriceFilter(Request $request)
    {
        if (!isset($request->second)){
            $products = Product::with('sub_categories','ratings')
                ->where('offer_product','=',1)
                ->where('status',1)->where('previous_price','>=',(int)$request->first)->orderBy('name')->get();
        }else{
            $products = Product::with('sub_categories','ratings')
                ->where('offer_product','=',1)
                ->where('previous_price','>=',(int)$request->first)
                ->where('status',1) ->where('previous_price','<=',(int)$request->second)->orderBy('name')->get();
        }
        return response()->json($products,200);
    }

    //update slugs
    public function updateSlug()
    {
        $products = Product::all();
        foreach ($products as $product){
            $slug = Str::slug($product->name." ".$product->sku,'-');
            $product->update(['slug' => $slug]);
        }
    }

    public function terms()
    {
        $terms = Term::first();

        return view('frontend.terms',compact('terms'));
    }
}
