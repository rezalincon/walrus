<?php

namespace App\Http\Controllers\Backend\Subscriber;

use App\Http\Controllers\Controller;
use App\Model\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function showSubscribers()
    {
        $subsribers = Subscriber::all();
        return view('admin.subscribers.index')->with(compact('subsribers'));
    }
    public function storeSubscribersEmail(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|unique:subscribers',
        ]);

        Subscriber::create($request->all());
       return response()->json("You are Subscribed");
        }
}
