@extends('layouts.admin')
@section('content')

    <div class="container-fluid px-4">
        <div class="my-5">
            <h3 class="my-4 d-inline">Order Details</h3>
            <a href="{{route('admin.orders')}}" class="btn btn-sm btn-danger float-end">Cancel</a>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h3 class="text-center">ZayBan</h3>

                <div class="row">
                    <div class="col-md-6">
                        <p>Name - {{$orderFirst->user->name}}</p>
                        <p>Phone - {{$orderFirst->user->phone}}</p>
                        <p>Voucher No - {{$orderFirst->voucher_no}}</p>
                    </div>
                    <div class="col-md-6 text-end">
                        <p>Date - {{date('M d, Y', strtotime($orderFirst->created_at))}}</p>
                        <p>Address - {{$orderFirst->address}}</p>
                        <p>Payment Method - {{$orderFirst->payment->pay}}</p>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Qty</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                           $j = 1;
                           $total = 0;
                        @endphp
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$j++}}</td>
                            <td>{{$order->item->name}}</td>
                            <td>{{$order->item->price}} MMK</td>
                            <td>{{$order->item->discount}} %</td>
                            <td>{{$order->qty}}</td>
                            <td>{{$order->total}} MMK</td>

                            @php
                            $total += $order->total;
                            @endphp

                        </tr>

                        @endforeach

                        <tr>
                            <td colspan="5">Total</td>
                            <td>{{$total}}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="offset-md-4 col-md-4">
                        <img src="{{$orderFirst->slip}}" alt="" class="img-fluid">
                    </div>

                    <form action="{{route('admin.order.status', $orderFirst->voucher_no)}}" method="post" class="d-grid gap-2 my-5">
                        @csrf 
                        @method('put')
                        @if($orderFirst->status == 'Pending')
                        <input type="hidden" name="status" value="Accept" id="">
                        <button class="btn btn-primary">Order Accept</button>

                        @else

                        <input type="hidden" name="status" value="Complete" id="">
                        <button class="btn btn-success">Order Complete</button>

                        @endif
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

@endsection