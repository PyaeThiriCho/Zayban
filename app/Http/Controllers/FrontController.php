<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index(){
        // $items = Item::all();
        $items = Item::orderBy('id', 'DESC')->paginate(8);

        return view('front.index', compact('items'));
    }

    public function shopItem($id){
        $item = Item::find($id);
        $categoryID = $item->category_id;
        $related_items = Item::where('category_id', $categoryID)->where('id', '!=', $id)->orderBy('id', 'DESC')->limit(4)->get();
        return view('front.detail', compact('item', 'related_items'));
    }

    public function itemCategory($category_id){
        $items = Item::where('category_id', $category_id)->orderBy('id', 'DESC')->paginate(8);
        return view('front.item-category', compact('items'));
    }

    public function cart(){
        $payments = Payment::all();
        return view('front.cart', compact('payments'));
    }

    public function orderNow(Request $request){
        // dd($request);

        $orderArray = json_decode($request->orderItems);
        //var_dump($orderArray);

        $voucher_no = 'ZB-'.time();
        echo $voucher_no;

        //file upload
        $file_name = time().'.'.$request->payment_slip->extension(); //234567821.jpg

        $upload = $request->payment_slip->move(public_path('images/slips/'), $file_name);

        foreach($orderArray as $data){
            $order = new Order();
            $total = $data->qty* ($data->price - ($data->price * ($data->discount/100)));
            $order->voucher_no = $voucher_no;
            $order->total = $total;
            $order->qty = $data->qty;
            $order->slip = '/images/slips/'.$file_name;
            $order->status = 'Pending';
            $order->address = $request->address;
            $order->user_id = Auth::id();
            $order->item_id = $data->id;
            $order->payment_id = $request->payment_method;
            
            $order->save();
        }
        return 'Your Order Success';
    }
}


