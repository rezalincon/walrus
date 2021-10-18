<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // use HasFactory;
    protected $guarded= [];

    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id' ,'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id' ,'id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class,'vendor_id' ,'id')->withDefault();
    }

    public function sub_categories()
    {
        return $this->belongsTo(SubCategory::class,'subcategory_id' ,'id')->withDefault();
    }
    public function child_categories()
    {
        return $this->belongsTo(ChildCategory::class, 'childcategory_id','id')->withDefault();
    }
    public function galleries()
    {
        return $this->hasMany(Gallery::class,'product_id','id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function avgReviewRating()
    {
    return $this->ratings()->avg('rating');
    }

    public function cart()
    {
        return $this->hasOne(Cart::class,'product_id','id');
    }


}
