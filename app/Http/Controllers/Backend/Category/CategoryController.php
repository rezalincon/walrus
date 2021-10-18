<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.category-view',compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
            'commision' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            //'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->commision = $request->commision;



        if ($request->hasFile('photo')){
            $extension = $request->photo->getClientOriginalExtension();
            $filename = rand(10000,99999).time().'.'.$extension;
            $request->photo->move('uploads/category-images/',$filename);
            $category->photo = $filename;
        }

        // if ($request->hasFile('image')){
        //     $extension = $request->image->getClientOriginalExtension();
        //     $filename = rand(10000,99999).time().'.'.$extension;
        //     $request->image->move('uploads/category-images/featured/',$filename);
        //     $category->image = $filename;
        //     $category->is_featured = 1;
        // }
        $category->save();
        $data = Category::latest()->first();
        return response()->json($data, 200);
    }

    public function edit(Category $category)
    {
        return response()->json($category,200);
    }

    public function update(Request $request, Category $category)
    {

        $this->validate($request, [
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
            //'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->commision = $request->commision;


        if ($request->hasFile('photo')){
            unlink('uploads/category-images/'.$category->photo);
            $extension = $request->photo->getClientOriginalExtension();
            $filename = rand(10000,99999).time().'.'.$extension;
            $request->photo->move('uploads/category-images/',$filename);
            $category->photo = $filename;
        }

        // if ($request->hasFile('image')){
        //     if ($category->image != null){
        //         unlink('uploads/category-images/featured/'.$category->image);
        //     }
        //     $extension = $request->image->getClientOriginalExtension();
        //     $filename = rand(10000,99999).time().'.'.$extension;
        //     $request->image->move('uploads/category-images/featured/',$filename);
        //     $category->image = $filename;
        //     $category->is_featured = 1;
        // }
        $category->save();
        return response()->json($category,200);
    }

    public function delete(Category $category)
    {
        unlink('uploads/category-images/'.$category->photo);
        // if ($category->image != null){
        //     unlink('uploads/category-images/featured/'.$category->image);
        // }
//        $category->sub_categories->child_categories->delete();
//        $category->sub_categories->delete();
        foreach($category->sub_categories AS $child){
            foreach($child->child_categories AS $grandchild){
                $grandchild->delete();
            }
            $child->delete();
        }
        $category->delete();
        return response()->json('Successfully Deleted!!!',200);
    }

    public function statusUpdate(Request $request, Category $category)
    {
        $category->status = $request->status;
        $category->save();
        return response()->json('Status Successfully Updated!!!');
    }
    
   public function featureUpdate(Request $request, Category $category)
    {
        $category->is_featured = $request->status;
        $category->save();
        return response()->json('This Category is featured now');
    }
}
