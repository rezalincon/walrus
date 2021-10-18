<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['name','size','color','price','qty','photo','user_id','vendor_id','product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
