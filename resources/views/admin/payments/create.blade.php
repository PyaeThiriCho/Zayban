@extends('layouts.admin')
@section('content')

<div class="container-fluid px-4">
    <div class="my-3">
        <h1 class="mt-4 d-inline">Create Payment</h1>

        <a href="{{route('admin.payments.index')}}"
           class="btn btn-danger float-end">
            Back
        </a>
    </div>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}">Dashboard</a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{route('admin.payments.index')}}">Payments</a>
        </li>

        <li class="breadcrumb-item active">
            Create Payment
        </li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create Payment
        </div>

        <div class="card-body">

            <form action="{{route('admin.payments.store')}}"
                  method="post"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label for="pay" class="form-label">Pay</label>

                    <input type="text"
                           class="form-control @error('pay') is-invalid @enderror"
                           name="pay"
                           id="pay"
                           value="{{old('pay')}}">

                    @error('pay')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="logo" class="form-label">Logo</label>

                    <input type="file"
                           accept="image/*"
                           class="form-control @error('logo') is-invalid @enderror"
                           name="logo"
                           id="logo">

                    @error('logo')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="acc_no" class="form-label">Acc No</label>

                    <input type="number"
                           class="form-control @error('acc_no') is-invalid @enderror"
                           name="acc_no"
                           id="acc_no"
                           value="{{old('acc_no')}}">

                    @error('acc_no')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="acc_name" class="form-label">Acc Name</label>

                    <input type="text"
                           class="form-control @error('acc_name') is-invalid @enderror"
                           name="acc_name"
                           id="acc_name"
                           value="{{old('acc_name')}}">

                    @error('acc_name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>


                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">
                        Save
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection