<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
     public function orders(){
        $orders = Order::all();

        //var_dump($orders);
        $voucherGroup = $orders->groupBy('voucher_no')->toArray();
        //dd($voucherGroup);
        $orderData = [];
        foreach($voucherGroup as $voucher){
            $orderID = array_column($voucher, 'id'); 
            print_r($orderID);
            $orderData[] = Order::whereIn('id', $orderID)->where('status', 'Pending')->first();

        }

        // dd($orderData);

        return view('admin.orders.index', compact('orderData'));

    }

     public function orderAccept(){
        $orders = Order::all();

        //var_dump($orders);
        $voucherGroup = $orders->groupBy('voucher_no')->toArray();
        //dd($voucherGroup);
        $orderData = [];
        foreach($voucherGroup as $voucher){
            $orderID = array_column($voucher, 'id'); 
            print_r($orderID);
            $orderData[] = Order::whereIn('id', $orderID)->where('status', 'Accept')->first();

        }

        // dd($orderData);

        return view('admin.orders.index', compact('orderData'));

    }



    public function orderComplete(){
        $orders = Order::all();

        //var_dump($orders);
        $voucherGroup = $orders->groupBy('voucher_no')->toArray();
        //dd($voucherGroup);
        $orderData = [];
        foreach($voucherGroup as $voucher){
            $orderID = array_column($voucher, 'id'); 
            print_r($orderID);
            $orderData[] = Order::whereIn('id', $orderID)->where('status', 'Complete')->first();

        }

        // dd($orderData);

        return view('admin.orders.index', compact('orderData'));

    }

    public function orderDetail($voucherNo){
        $orders = Order::where('voucher_no', $voucherNo)->get();
        $orderFirst = Order::where('voucher_no', $voucherNo)->first();
        return view('admin.orders.detail', compact('orders', 'orderFirst'));
    }

    public function statusUpdate(Request $request, $voucherNo){
        Order::where('voucher_no', $voucherNo)->update(['status' => $request->status]);
        return redirect()->route('admin.orders');
    }
}
