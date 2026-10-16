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
            <form class="row" id="paymentForm" enctype="multipart/form-data">
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

                


                

                @if(Auth::user() && Auth::user()->role == 'user')
                
                <button class="btn btn-success my-3" id="order-now" type="submit">
                    Order Now
                </button>

                @else
                 <a href="/login" class="btn btn-primary my-3">Login</a>

                @endif

             
            </form>
    </div>
</div>
@endsection

@section('script')

<script>
        $(document).ready(function(){
            $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#paymentForm').on('submit', function(e){
        e.preventDefault();
        let formData = new FormData(this);
        // console.log(Object.fromEntries (formData));

        let orderData = localStorage.getItem('zayban');
        formData.append('orderItems', orderData);

        $.ajax({
            type: 'POST',
            url: "{{route('order.now')}}",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
                console.log(response);

                if(response){
                    alert('Order Success');
                    localStorage.clear('zayban');
                    location.href = '/';
                }
            }
        })
        
    })
        })
</script>

@endsection