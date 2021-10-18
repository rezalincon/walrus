<?php

namespace App\Vendor;

use App\Model\Vendor;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    protected $fillable = ['file' ,'vendor_id'];
    
    public function vendor()
    {
        return $this->belongsTo(Vendor::class,'vendor_id','id');
    }
}
