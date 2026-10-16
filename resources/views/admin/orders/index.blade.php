@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    <div class="my-3">
        <h1 class="mt-4 d-inline">
            @if(Request::is('admin/orderAccept'))
            <span class="text-primary">Order Accept</span>
            @elseif(Request::is('admin/orderComplete'))
            <span class="text-success">Order Complete</span>
            @else
            <span>Order Pending</span>
            @endif
        </h1>

        <a href="{{route('admin.order.complete')}}" class="btn btn-success float-end">Order Complete List</a>
        <a href="{{route('admin.order.accept')}}" class="btn btn-primary mx-3 float-end">Order Accept List</a>
        <a href="{{route('admin.orders')}}" class="btn btn-secondary float-end">Order List</a>

    </div>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Orders list
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Voucher No</th>
                        <th>User Name</th>
                        <th>Status</th>
                        <th>Payment Method</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Voucher No</th>
                        <th>User Name</th>
                        <th>Status</th>
                        <th>Payment Method</th>
                        <th>#</th>
                    </tr>
                </tfoot>
                <tbody>
                   @php 
                   $j = 1;
                   @endphp
                   @foreach($orderData as $order)
                   
                   @if($order != null)
                   <tr>
                    <td>{{$j++}}</td>
                    <td>{{$order->voucher_no}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>
                        <span class="badge text-bg-secondary">{{$order->status}}</span>

                    </td>
                    <td>{{$order->payment->pay}}</td>
                    <td>
                        <a href="{{route('admin.order.detail',$order->voucher_no)}}" class="btn btn-primary btn-sm">Detail</a>
                    </td>
                   </tr>

                   @endif
                   @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>


@endsection