<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::orderBy('id', 'DESC')->paginate(15);
        return view('admin.payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = Payment::find($id);
        return view('admin.payments.edit',compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request);
        $payment = Payment::find($id);
        $payment->update($request->all());

        if($request->hasFile('logo')){

          //file upload
        $file_name = time().'.'.$request->logo->extension(); //2345234234.jpg

        $upload = $request->logo->move(public_path('images/payments/'), $file_name); //folder ထဲကို upload 
        if ($upload){
            $payment->logo = "/images/payments/".$file_name;
        }

        }else{
            $payment->logo = $request->old_logo;
        }
        $payment->save();
        return redirect()->route('admin.payments.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
