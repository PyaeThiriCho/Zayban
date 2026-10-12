<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Payment;
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
}
