<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
  

    function dateBy(Request $request)
    {
     if($request->ajax())
     {
        
      if($request->from_date != '' && $request->to_date != '')
      {

       $data = Order::join('users','orders.user_id','users.id')
       ->join('order_products','order_products.order_id','orders.id')
       ->select('orders.*','users.name','users.email','order_products.qty')     
       ->whereBetween('date',array($request->from_date, $request->to_date))     
       ->whereIn('orders.status',[1,2])
       ->get();

      }
  
      else
      {
        $data = Order::join('users','orders.user_id','users.id')
        ->join('order_products','order_products.order_id','orders.id')
        ->select('orders.*','users.name','users.email','order_products.qty')     
        ->whereIn('orders.status',[1,2])
        ->get();

      }

      return response($data);
     }

    }



    public function index()
    {

        $dateToday = Carbon::today()->toDateString();
        $date7days = Carbon::today()->subDay(7)->toDateString();

        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth();
        $data['sale7Days'] = Order::join('order_products','order_products.order_id','orders.id')
                        ->whereDate('orders.created_at','<=',$dateToday)
                        ->whereDate('orders.created_at','>=',$date7days)
                        ->whereIn('orders.status',['Completed'])
                        ->sum('qty');

                        $seven = Order::whereDate('orders.created_at','<=',$dateToday)
                        ->whereDate('orders.created_at','>=',$date7days)
                        ->whereIn('orders.status',['Completed'])->with('orderProduct')                      
                        ->get();                       
            
        $data['sale30Days'] = Order::join('order_products','order_products.order_id','orders.id')
                        ->whereBetween('orders.created_at',[$firstDayofPreviousMonth,$lastDayofPreviousMonth])
                        ->whereIn('orders.status',['Completed'])
                        ->sum('qty');

                        $last = Order::whereBetween('orders.created_at',[$firstDayofPreviousMonth,$lastDayofPreviousMonth])
                        ->whereIn('orders.status',['Completed'])
                        ->with('orderProduct')
                        ->get();

        $data['saleToday'] = Order::join('order_products','order_products.order_id','orders.id')
            ->whereDate('orders.created_at',$dateToday)
            ->whereIn('orders.status',['Completed'])
            ->sum('qty');

                        $today = Order::whereDate('orders.created_at',$dateToday)
                        ->whereIn('orders.status',['Completed'])
                        ->with('orderProduct')
                        ->get();


        $data['todaySellingAmount'] = Order::whereDate('created_at',$dateToday)
                                    ->whereIn('status',['Completed'])
                                    ->sum('subtotal');
        $data['last7daySellingAmount'] = Order::whereDate('created_at','<=',$dateToday)
                                        ->whereDate('created_at','>=',$date7days)
                                        ->whereIn('status',['Completed'])
                                        ->sum('subtotal');
        $data['last1monthSellingAmount'] = Order::whereBetween('created_at',[$firstDayofPreviousMonth,$lastDayofPreviousMonth])
                                            ->whereIn('status',['Completed'])
                                            ->sum('subtotal');

         $data['allSellingAmount'] = Order::whereIn('status',['Completed'])
                        ->sum('subtotal');

        $data['todayprofit'] = OrderProduct::whereDate('created_at',$dateToday)
        ->sum('profit');
        $data['sevendayprofit'] = OrderProduct::whereDate('created_at','>=',$date7days)
        ->sum('profit');
        $data['monthprofit'] = OrderProduct::whereDate('created_at',[$firstDayofPreviousMonth,$lastDayofPreviousMonth])
        ->sum('profit');
        $data['allp'] = OrderProduct::sum('profit');


        $data['saleAll'] = Order::join('order_products','order_products.order_id','orders.id')
        ->whereIn('orders.status',['Completed'])
        ->sum('qty');
        //return $lastDayofPreviousMonth;
        return view('admin.report.report',compact('data','today','seven','last'));

    }
}
