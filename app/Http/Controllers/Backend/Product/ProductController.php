<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\ChildCategory;
use App\Model\Product;
use App\Model\SubCategory;
use App\Model\Brand;
use App\Model\Gallery;
use Illuminate\Http\Request;
use App\Traits\ProductImage;
use Auth;

class ProductController extends Controller
{
    use ProductImage;
    public function Product()
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $childcategories=ChildCategory::all();
        $brand=Brand::all();
        return view('admin.product.addProduct', compact('categories','subcategories','childcategories','brand'));
    }

    public function createProduct(Request $request)
    {
      $request->validate([
            'name'             =>'required',
            'sku'              =>'required',
            'category_id'      =>'required',
            'subcategory_id'   =>'required',
            'childcategory_id' =>'required',
            'photo'            =>'required',
            'price'            =>'required',
            'tax'              =>'required',
            'details'          =>'required',
            'tags'             =>'required',
      ]);



        $product_detail=$request->details;
        $dom = new \DomDocument();
        $dom->loadHtml($product_detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $product_detail   = $dom->saveHTML();

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


        if ($request->hasFile('photo')) {
            $filePath = $this->productImageUpload($request->photo);
       }


        $product = new Product;

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
        $product->cash_back        = $request->cash_back;
        $product->tax              = $request->tax;
        $product->stock            = $request->stock;
        $product->details          = $product_detail;
        $product->vat              = $request->vat;
        $product->youtube          = $request->youtube;
        $product->tags             = $request->tags;
        $product->featured         = $request->feature;
        $product->offer_product    = $request->offerproduct;
if($request->online_payment){
    $product->online_payment   = $request->online_payment;
}


        $product->vendor_id        =Auth::user()->id;

        $product->save();

         $count=1;
          if($request->hasfile('image_file'))
         {

            foreach($request->file('image_file') as $file)
            {

                $name = time().'.'.$count.$file->extension();
                $file->move(public_path().'/uploads/product-gallery', $name);
                $file= new Gallery;
                $file->image_file=$name;
                $file->product_id=$product->id;

                $file->save();
                $count++;

            }

         }


        return redirect()->back()->with('success', 'Product Added Successfully');



        }




    public function showProducts()
    {
        $products=Product::all();
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $childcategories=ChildCategory::all();
        return view('admin.product.allProducts',compact('products','categories','subcategories','childcategories'));
    }

    public function deActivatedProducts()
    {
        $deactivatedProducts=Product::where('status',0)->get();
        return view('admin.product.deactivatedProducts',compact('deactivatedProducts'));
    }

    public function productCatalogs()
    {
        $products=Product::all();
        return view('admin.product.productCatalogs',compact('products'));
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
       //dd($brand->name);
       $gallery=Gallery::where('product_id','=',$id)->get();
      // dd($gallery->image_file);
        return view('admin.product.editProduct', compact('product','categories','subcategories','childcategories','brand','gallery'));
    }

    public function productUpdate(Request $request, $id)
    {




    //     $request->validate([
    //         'name'             =>'required',
    //         'sku'              =>'required',
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



    //   ]);
        $product_detail=$request->details;
        $dom = new \DomDocument();
        $dom->loadHtml($product_detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $product_detail   = $dom->saveHTML();

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
        $product->offer_product    = $request->offerproduct;
        $product->youtube          = $request->youtube;
        $product->tags             = $request->tags;

        $product->featured         = $request->feature;

        // $product->vendor_id          =Auth::user()->id;

            $product->online_payment   = $request->online_payment;


       $photo     =  $product->photo;
       $delete_path = public_path().'/'.$photo;




       

          if ($request->hasFile('photo')) {
             if(!empty($photo)) {

                if(file_exists($delete_path)) {
                    unlink($delete_path);
                }
             }
            $filePath = $this->productImageUpload($request->photo);

             $product->photo = $filePath;
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

                $name = time().'.'.$count.$file->extension();
                $file->move(public_path().'/uploads/product-gallery', $name);


                $file= new Gallery;
                $file->image_file=$name;
                $file->product_id=$product->id;
                $file->save();
                $count++;

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

        return view('admin.product.viewProduct',compact('product','gallery'));
    }

    public function edit(Category $category)
    {
        return response()->json($category,200);
    }
    
    //featured update
    public function featuredUpdate(Request $request, Product $product)
    {
        $product->featured = $request->featured;
        $product->save();
        return response()->json('This product is Featured Now!!!');
    }
}
