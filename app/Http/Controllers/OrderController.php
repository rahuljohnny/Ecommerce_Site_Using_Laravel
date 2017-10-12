<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
     public function Orders($type='')
     {
         if($type =='pending')
         {
             $orders = Order::where('delivered','0')->get();
         }
         else if($type =='delivered')
         {
             $orders = Order::where('delivered','1')->get();
         }
         else
         {
             $orders = Order::all();
         }

         return view('admin.orders',compact('orders'));
     }

     public function toggledeliver(Request $request,$orderId)
     {
         $order = Order::find($orderId);
         $order->delivered = $request->delivered;
         $order->save();

         //$userInfo = User::where('id',$order->user_id)->get();

         Mail::to($order->user)->send(new OrderShipped($order));
         return back();
     }

    public function toggleUnoDeliver(Request $request,$orderId)
    {
        $order = Order::find($orderId);
        $order->delivered = $request->delivered;
        $order->save();

        return back();
    }


}
