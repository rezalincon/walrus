<?php

namespace App\Http\Controllers\Backend\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Logo;
use App\Model\OrderProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;

use App\Mail\OrderStatusEmail;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    //
    public function orderView()
    {
        $orders = Order::with('orderProduct', 'orderProduct.product')->get();
        return view('admin.orders.order-view',['orders'=>$orders]);
    }
    public function orderStatusUpdate(Request $request, Order $id)
    {
        
        $id->status = $request->status;
        $id->save();
        
        OrderProduct::where('order_id',$id->id)
            ->update(['status' => $request->status]);

        if ($request->status == 'Completed'){
            $order_product = OrderProduct::where('order_id',$id->id)->get();
            foreach ($order_product as $item){
                $profit= $item->qty * $item->product->price*($item->product->categories->commision/100);
                $vendorIncome = ($item->qty * $item->product->price) - $profit;
                $item->profit = $profit;
                $item->vendor_income = $vendorIncome;
                $item->save();
            }
        }else{
            $order_product = OrderProduct::where('order_id',$id->id)->get();
            foreach ($order_product as $item){
                $item->profit = null;
                $item->vendor_income=null;
                $item->save();
            }
        }
        $inputs = $request->all();
        dispatch(new \App\Jobs\OrderStatus($inputs));
        return response()->json('Status Successfully Updated!!!');
    }

    public function vendorOrderStatusUpdate(Request $request, OrderProduct $id)
    {
        $id->vendor_status = $request->vendor_status;
        $id->save();

        $inputs = $request->all();
        // Ship the order...

        //Mail::to($request->email)->send(new OrderStatus($request->vendor_status));



        return response()->json('Status Successfully Updated!!!');
    }

    public function orderDetails($id)
    {
        $orders=OrderProduct::where('order_id',$id)->with('product','order')->get();
        return view('admin.orders.order-details',['orders'=>$orders]);
    }


    public function vendorOrderView()
    {
        $vendor = Auth::user();
        $orders=OrderProduct::where('vendor_id',$vendor->id)->with('product','order')->get();
        return view('vendor.orders.order-view',['orders'=>$orders]);
    }

    public function vendorOrderDetails($id)
    {
        $orders=OrderProduct::where('id',$id)->with('product','order')->get();
        return view('vendor.orders.order-details',['orders'=>$orders]);
    }
    public function notifyOrderDetails($o_id)
    {
        DB::table('notifications')->where('data->order_id', $o_id)->where('notifiable_type', 'App\Model\Admin')->whereNull('read_at')->update(['read_at' => now(), 'read_by' => Auth::id()]);

        $orders=OrderProduct::where('order_id',$o_id)->with('product','order')->get();
        return view('admin.orders.order-details',['orders'=>$orders]);
    }


//invoice
public function Invoice($id){
    $invoiceLogo=Logo::where('type','invoice')->get();
    $orders=OrderProduct::where('order_id',$id)->with('product','order')->get();
    return view('admin.orders.invoice',compact('invoiceLogo','orders'));
}

public function vendorInvoice($id){
    $invoiceLogo=Logo::where('type','invoice')->get();
    $orders=OrderProduct::where('id',$id)->with('product','order')->get();
    return view('vendor.orders.vendorinvoice',compact('invoiceLogo','orders'));
}

    public function trackOrder(Request $request)
    {

        $data=Order::where('order_id',$request->oid)->first();
        return response()->json($data, 200);

    }


}
