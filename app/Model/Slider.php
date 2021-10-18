<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    protected $fillable = ['subtitle','title','description','image_file','link','text_position'];
}
