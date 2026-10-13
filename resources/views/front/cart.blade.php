@extends('layouts.front') 
@section('content')
<div class="container my-5 py-5">
    <h3 class="text-center py-3">My Shopping Carts</h3>
    <div class="table-responsive">
        <table class="table table-border">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Item Name</th>
                    <th>Item Image</th>
                    <th>Item Price</th>
                    <th>Item Discount</th>
                    <th>Qty</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody id="tbody">
                
            </tbody>
        </table>
    </div>

    <div class="d-grid gap-2">
            <form class="row" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="payment_slip">Payment Slip</label>
                    <input type="file" name="payment_slip" id="payment_slip" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="payment_method">Payment method</label>
                    <select name="payment_method" id="payment_method" class="form-select">
                        <option value="">Choose Pay</option>
                        @foreach($payments as $payment)
                           <option value="{{$payment->id}}">{{$payment->pay}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="address">Address</label>
                    <textarea name="address" id="" class="form-control"></textarea>
                </div>

                @guest

                <a href="/login" class="btn btn-primary my-3">Login</a>

                @else

                @if(Auth::user()->role == 'user')

                <button class="btn btn-success my-3" id="order-now" type="submit">
                    Order Now
                </button>

                @endif

                @endguest
            </form>
    </div>
</div>
@endsection