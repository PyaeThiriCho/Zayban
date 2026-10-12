@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    <div class="my-3">
        <h1 class="mt-4 d-inline">Edit Payment</h1>
        <a href="{{route('admin.payments.index')}}" class="btn btn-danger float-end">Back</a>
    </div>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.payments.index')}}">Payments</a></li>
        <li class="breadcrumb-item active">Edit Payment</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit Payment
        </div>
        <div class="card-body">
        <form action="{{route('admin.payments.update', $payment->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
   
            <div class="mb-3">
                <label for="pay" class="form-label">Pay</label>
                <input type="text" class="form-control @error('pay') is-invalid @enderror" name="pay" id="pay" value="{{$payment->pay}}">
                @error('pay')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

        <div class="mb-3">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="true">Logo</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="new_image-tab" data-bs-toggle="tab" data-bs-target="#new_image-tab-pane" type="button" role="tab" aria-controls="new_image-tab-pane" aria-selected="false">New Logo</button>
                    </li>
                 </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                        <img src="{{$payment->logo}}" alt="" class="w-25 h-25 my-3">
                        <input type="hidden" name="old_logo" id="" value="{{$payment->logo}}">
                    </div>
                    <div class="tab-pane fade" id="new_image-tab-pane" role="tabpanel" aria-labelledby="new_image-tab" tabindex="0">
                        <input type="file" accept="image/*" class="form-control my-3" name="logo" id="logo">
                    </div>
                </div>
        </div>        

            <div class="mb-3">
                <label for="acc_no" class="form-label">Acc No</label>
                <input type="number" class="form-control @error('acc_no') is-invalid @enderror" name="acc_no" id="acc_no" value="{{$payment->acc_no}}">
                @error('acc_no')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="acc_name" class="form-label">Acc Name</label>
                <input type="text" class="form-control @error('acc_name') is-invalid @enderror" name="acc_name" id="acc_name" value="{{$payment->acc_name}}">
                @error('acc_name')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
                
            
            
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>


@endsection
