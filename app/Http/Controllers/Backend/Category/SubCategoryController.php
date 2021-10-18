<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('admin.sub-category.sub-category-view',compact('subcategories','categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required',
            'category_id' => 'required'
        ]);

        $data = SubCategory::create($request->all());
        $category = isset($data->category->name) ? $data->category->name : '';
        return response()->json([
            'data' => $data,
            'category' => $category
        ],200);
    }

    public function edit(SubCategory $subCategory)
    {
        return response()->json($subCategory);
    }

    public function update(Request $request, SubCategory $subCategory)
    {
        $category = $subCategory->category->name;
        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category_id;
        $subCategory->slug = $request->slug;
        $subCategory->save();
        return response()->json([
            'subcategory' => $subCategory,
            'category' => $category
        ],200);
    }

    //Status update
    public function statusUpdate(Request $request, SubCategory $subCategory)
    {
        $subCategory->status = $request->status;
        $subCategory->save();
        return response()->json('Status Successfully Updated!!!',200);
    }

    public function delete(SubCategory $subCategory)
    {
        $subCategory->child_categories()->delete();
        $subCategory->delete();
        return response()->json('SubCategory Successfully Deleted!!!',200);
    }
}
