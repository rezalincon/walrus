<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['category_id','name','slug','status'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    }

    public function child_categories()
    {
        return $this->hasMany(ChildCategory::class, 'sub_category_id','id');
    }
}
