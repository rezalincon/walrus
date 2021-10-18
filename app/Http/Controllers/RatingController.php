<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rating;
use App\Model\Product;

class RatingController extends Controller
{
    function index(Request $req){

        $rating = new Rating;
        $rating->product_id = $req->product_id;
        $rating->review = $req->review;
        $rating->rating = $req->rating;
        $rating->name = $req->name;
        $rating->email = $req->email;
        $rating->save();

        $reviews = Rating::where('product_id',$req->product_id)->get();

        if (sizeof($reviews) > 0){
              $ratingCount = $reviews->count();
              $sum = $reviews->sum('rating');
              $avg_rating = $sum/$ratingCount;
        }
        else{
              $ratingCount = 0;
              $avg_rating = 0;
        }
        // return $avg_rating;
        $product = Product::find($req->product_id);
        $product->avg_rating = $avg_rating;
        $product->save();


        return redirect()->back()->with('success', 'Review Post Successfully');;


    }
}
