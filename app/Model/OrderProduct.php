<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $guarded=[];
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
    
    public function vendor(){
        return $this->belongsTo(Vendor::class,'vendor_id','id');
    }


}
