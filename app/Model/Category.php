<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class,'category_id','id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }
}
