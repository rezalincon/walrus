<?php

namespace App\Http\Controllers\Frontend\Cart;

use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index($id)
    {
        $product = Product::find($id);
        if ($product->size != null){
            $size = explode(",",$product->size)[0];
        }else{
            $size = "";
        }

        if ($product->color != null){
            $color = explode(",",$product->color)[0];
        }else{
            $color = "";
        }


        $price = $product->price;
      
        $name = $product->name;
        $stock = $product->stock;
        $photo = $product->photo;
        $vendor_id = $product->vendor_id;


        return response()->json([
            'name' => $name,
            'price' => $price,
            'size' => $size,
            'color' => $color,
            'id' => $id,
            'photo' => $photo,
            'vendor_id' => $vendor_id,
            'stock' => $stock,
            'slug' => $product->slug
        ],200);
    }

    public function getCartData($userId)
    {
        $cartData = Cart::where('user_id',$userId)->get();
        return response()->json($cartData,200);
    }

    public function saveCartData(Request $request, $userId)
    {
        $cart = Cart::where('user_id',$userId)
                    ->where('product_id',$request->product_id)->first();
        if (!isset($cart)){
            $cart1 = new Cart();
            $cart1->name = $request->name;
            $cart1->size = $request->size;
            $cart1->color = $request->color;
            $cart1->price = $request->price;
            $cart1->qty = $request->qty;
            $cart1->photo = $request->photo;
            $cart1->user_id = $userId;
            $cart1->product_id = $request->product_id;
            $cart1->subtotal = $request->subtotal;
            $cart1->vendor_id = $request->vendor_id;
            $cart1->slug = $request->slug;
            $cart1->save();
        }else{
            $cart->qty = $request->qty;
            $cart->subtotal = $request->subtotal;
            $cart->price = $request->price;
            $cart->save();
        }

        return response()->json($cart);
    }

    public function deleteCartItem($userId, $productId)
    {
        $item = Cart::where('user_id',$userId)
                        ->where('product_id',$productId)->delete();
        return response()->json('Data Successfully Deleted');
    }
    
    public function deleteAllCartItem($userId)
    {
        Cart::where('user_id',$userId)->delete();
        return response()->json('Cart successfully Cleared!!!');
    }
    
    public function getProductQuantity(Product $product)
    {
        return response()->json($product->stock);
    }
    
    public function storeProductQuantity(Request $request, $userId, $productId)
    {
        $cart = Cart::where('user_id',$userId)->where('product_id',$productId)->first();
        $cart->qty = $request->quantity;
        $cart->save();
        return response()->json('success');
    }
}
