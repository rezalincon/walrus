<?php


namespace App\Http\Controllers\Vendor;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\ChildCategory;
use App\Model\Product;
use App\Model\SubCategory;
use App\Model\Brand;
use App\Vendor\Banner;
use App\Model\Gallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\ProductImage;
use Auth;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    use ProductImage;
    public function addProduct()
    {
        $vendor = Auth::user();
        $banner = Banner::where('vendor_id',$vendor->id)->first();
        if (empty($banner->file) || empty($vendor->shop_image)){
            return redirect('/vendor/dashboard')->with('error','You have to upload your Shop Image And Shop Banner Before Add Product');
        }
        
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $childcategories=ChildCategory::all();
        $brand=Brand::all();
        return view('vendor.product.addProduct', compact('categories','subcategories','childcategories','brand'));
    }

    public function createProduct(Request $request)
    {
      $request->validate([
            'name'             =>'required',
            'sku'              =>'required',
            'category_id'      =>'required',
            // 'subcategory_id'   =>'required',
            // 'childcategory_id' =>'required',
            'photo'            =>'required|mimes:jpeg,jpg,png',

            'price'            =>'required',

            'details'          =>'required',
            'tags'             =>'required',

      ]);



        $product_detail=$request->details;
        $dom = new \DomDocument();
        //$dom->loadHtml($product_detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        
        $dom->loadHTML('<?xml encoding="UTF-8">'. $product_detail);
        $product_detail = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
        $product_detail .= $dom->saveHTML( $dom->documentElement );

        $size       ='';
        $size_qty   ='';
        $size_price ='';

          for ($i = 0; $i < count($request->size); $i++){
         $size       .= $request->size[$i].',';
         $size_qty   .= $request->size_qty[$i].',';
         $size_price .= $request->size_price[$i].',';
        };


        $color       ='';

          for ($i = 0; $i < count($request->color); $i++){
         $color     .= $request->color[$i].',';

        };


        $product = new Product;

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $input['imagename'] = rand(10000,99999).time().'.'.$image->extension();

            $filePath = public_path('uploads/product-images/');

            $img = Image::make($image->path());
            $img->resize(1000, 1000, function ($const) {
                $const->aspectRatio();
            })->save($filePath.'/'.$input['imagename']);
        }
        $filePath = "uploads/product-images/".$input['imagename'];

        $product->name             = $request->name;
        $product->sku              = $request->sku;
        $product->category_id      = $request->category_id;
        $product->subcategory_id   = $request->subcategory_id;
        $product->childcategory_id = $request->childcategory_id;
        $product->brand_id         = $request->brand_id;
        $product->photo            = $filePath;
        $product->ship             = $request->ship;
        $product->size             = $size;
        $product->size_qty         = $size_qty;
        $product->size_price       = $size_price;
        $product->color            = $color;
        $product->price            = $request->price;
        $product->previous_price   = $request->previous_price;
        $product->slug             = Str::slug($request->name." ".$request->sku,"-");
        $product->stock            = $request->stock;
        $product->details          = $product_detail;

        //$product->youtube          = $request->youtube;
        $youtubeId = $this->YoutubeID($request->youtube);
        $product->youtube = $youtubeId;
        
        $product->tags             = $request->tags;
         $product->status         = 1;
        $product->featured         = 0;
        $product->offer_product    = 0;
         if($request->online_payment){
            $product->online_payment   = $request->online_payment;
        }
        $product->vendor_id          =Auth::id();

        $product->save();

         $count=1;
          if($request->hasfile('image_file'))
         {
            foreach($request->file('image_file') as $file)
            {

                // $name = time().'.'.$count.$file->extension();
                // $file->move(public_path().'/uploads/product-gallery', $name);
                // $file= new Gallery;
                // $file->image_file=$name;
                // $file->product_id=$product->id;
                // $file->save();
                // $count++;
                if($file->extension() == 'jpg' || $file->extension() == 'png' || $file->extension() == 'jpeg'){
                 $input['imagename'] = rand(10000,99999).time().'.'.$file->extension();

                $filePath = public_path('/uploads/product-gallery');

                $img = Image::make($file->path());
                $img->resize(1000, 1000, function ($const) {
                    $const->aspectRatio();
                })->save($filePath.'/'.$input['imagename']);
                $file= new Gallery;
                $file->image_file=$input['imagename'];
                $file->product_id=$product->id;
                $file->save();
                $count++;
                }

            }
         }

         return redirect()->back()->with('success', 'Product Added Successfully');

        }




    public function showProducts()
    {
        $products=Product::all()->where('vendor_id',Auth::id());
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $childcategories=ChildCategory::all();
        return view('vendor.product.allProducts',compact('products', 'categories','subcategories','childcategories'));
    }

    public function deActivatedProducts()
    {
        $deactivatedProducts=Product::where('status',0)->where('vendor_id',Auth::id())->get();
        return view('vendor.product.deactivatedProducts',compact('deactivatedProducts'));
    }

    public function productCatalogs()
    {
        $products=Product::all();
        return view('vendor.product.productCatalogs',compact('products'));
    }

    public function statusUpdate(Request $request, Product $product)
    {
        $product->status = $request->status;
        // dd($product->status);
        $product->save();
        return response()->json('Status Successfully Updated!!!');
    }


    public function productEdit($id)
    {
       $product = Product::find($id);
       $categories=Category::all();
       $subcategories=SubCategory::all();
       $childcategories=ChildCategory::all();
       $brand=Brand::all();
       $gallery=Gallery::where('product_id','=',$id)->get();
        return view('vendor.product.editProduct', compact('product','categories','subcategories','childcategories','brand','gallery'));
    }


    public function productUpdate(Request $request, $id)
    {



    //     $request->validate([
    //         'name'             =>'required',
    //         'sku'              =>'required',.
    
    //         'category_id'      =>'required',
    //         'subcategory_id'   =>'required',
    //         'childcategory_id' =>'required',
    //         'brand_id'         =>'required',
    //          'photo'            =>'required',
    //         'price'            =>'required',
    //         'product_commission'=>'required',
    //         'tax'              =>'required',
    //         'details'          =>'required',
    //         'tags'             =>'required',
    $request->validate([
            'photo'            =>'mimes:jpeg,jpg,png',
        ]);



    //   ]);
        $product_detail=$request->details;
        $dom = new \DomDocument();
        //$dom->loadHtml($product_detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        
        $dom->loadHTML('<?xml encoding="UTF-8">'. $product_detail);
        $product_detail = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
        $product_detail .= $dom->saveHTML( $dom->documentElement );

        $size       ='';
        $size_qty   ='';
        $size_price ='';

          for ($i = 0; $i < count($request->size); $i++){
         $size       .= $request->size[$i].',';
         $size_qty   .= $request->size_qty[$i].',';
         $size_price .= $request->size_price[$i].',';
        };



        $color       ='';

          for ($i = 0; $i < count($request->color); $i++){
         $color     .= $request->color[$i].',';

        };




        $product = Product::find($id);

        $product->name             = $request->name;
        $product->sku              = $request->sku;
        $product->category_id      = $request->category_id;
        $product->subcategory_id   = $request->subcategory_id;
        $product->childcategory_id = $request->childcategory_id;
        $product->brand_id         = $request->brand_id;
        $product->ship             = $request->ship;
        $product->size             = $size;
        $product->size_qty         = $size_qty;
        $product->size_price       = $size_price;
        $product->color            = $color;
        $product->price            = $request->price;
        $product->previous_price   = $request->previous_price;
        $product->stock            = $request->stock;
        $product->details          = $product_detail;

        //$product->youtube          = $request->youtube;
        $youtubeId = $this->YoutubeID($request->youtube);
        $product->youtube = $youtubeId;
        
        $product->tags             = $request->tags;


        $product->vendor_id          =Auth::user()->id;
       $photo     =  $product->photo;
       $delete_path = public_path().'/'.$photo;

       if($request->online_payment){
        $product->online_payment   = $request->online_payment;
    }







          if ($request->hasFile('photo')) {
            // $filePath = $this->productImageUpload($request->photo);
            //  $product->photo = $filePath;
            //  $product->save();
            
                if(!empty($photo)) {
        
                    if(file_exists($delete_path)) {
                        unlink($delete_path);
                    }
                }
            
              $image = $request->file('photo');
              $input['imagename'] = rand(10000,99999).time().'.'.$image->extension();

              $filePath = public_path('uploads/product-images/');

              $img = Image::make($image->path());
              $img->resize(1000, 1000, function ($const) {
                  $const->aspectRatio();
              })->save($filePath.'/'.$input['imagename']);
              $filepath = "uploads/product-images/".$input['imagename'];
              $product->photo = $filepath;
              $product->save();
        }
        //$product->photo            = $filePath;



        $delete_path="";
        if($request->file('image_file')){
        $gallery=Gallery::where('product_id','=',$id)->get();

        foreach ($gallery as $data){
          $gallery_image=$data->image_file;
          $delete_path = public_path().'/uploads/product-gallery/'.$gallery_image;

          if(!empty($gallery_image)) {

            if(file_exists($delete_path)) {
                unlink($delete_path);
                  }
              }
          }
          $delete=Gallery::where('product_id','=',$id)->delete();
        }


        $count=1;
          if($request->hasfile('image_file'))
         {
            foreach($request->file('image_file') as $file)
            {

                // $name = time().'.'.$count.$file->extension();
                // $file->move(public_path().'/uploads/product-gallery', $name);


                // $file= new Gallery;
                // $file->image_file=$name;
                // $file->product_id=$product->id;
                // $file->save();
                // $count++;
                if($file->extension() == 'jpg' || $file->extension() == 'png' || $file->extension() == 'jpeg'){
                    $input['imagename'] = rand(10000,99999).time().'.'.$file->extension();
    
                    $filePath = public_path('/uploads/product-gallery');
    
                    $img = Image::make($file->path());
                    $img->resize(1000, 1000, function ($const) {
                        $const->aspectRatio();
                    })->save($filePath.'/'.$input['imagename']);
                    
                    
                    $file= new Gallery;
                    $file->image_file=$input['imagename'];
                    $file->product_id=$product->id;
                    $file->save();
                    $count++;
                }
            }
         }



        $product->save();





        return redirect()->back()->with('success', 'Product Edited Successfully');

    }

    public function productDelete($id)
    {
       $product = Product::find($id);

        $product->delete();

        return redirect()->back();
    }
    public function productView($id)
    {
       $product = Product::find($id);
       $gallery=Gallery::where('product_id','=',$id)->get();
        return view('vendor.product.viewProduct',compact('product','gallery'));
    }

    public function edit(Category $category)
    {
        return response()->json($category,200);
    }
    
      public function findsub($id,Request $req){

        $category = SubCategory::where('category_id','=',$id)->get();
        return response()->json($category,200);


    }

    public function findchild($id,Request $req){

        $category = ChildCategory::where('sub_category_id','=',$id)->get();
        return response()->json($category,200);


    }
    
    //Generating the youtube video Key:
    public function YoutubeID($url)
    {
        if(strlen($url) > 11)
        {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
            {
                return $match[1];
            }
            else
                return false;
        }

        return $url;
    }
}
