@extends('layouts.admin')
@section('content')

                <main>
                    <div class="container-fluid px-4">
                        <div class="my-3">
                            <h1 class="mt-4 d-inline">Payments</h1>
                            <a href="{{route('admin.payments.create')}}" class="btn btn-primary float-end">Create Payment</a>
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Payments</li>
                        </ol>
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Payments List
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Pay</th>
                                            <th>Logo</th>
                                            <th>Acc_No</th>
                                            <th>Acc_Name</th>
                                            <th>Deleted_at</th>
                                            <th>Created_at</th>
                                            <th>Updated_at</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Pay</th>
                                            <th>Logo</th>
                                            <th>Acc_No</th>
                                            <th>Acc_Name</th>
                                            <th>Deleted_at</th>
                                            <th>Created_at</th>
                                            <th>Updated_at</th>
                                            <th>Action</th>

                                        </tr>
                                    </tfoot>
                                
                                    <tbody>
                                        @php 
                                           $j = 1;
                                        @endphp
                                        @foreach($payments as $payment)

                                        <tr>
                                            <td>{{$j++}}</td>
                                            <td>{{$payment->pay}}</td>
                                            <td>{{$payment->logo}}</td>
                                            <td>{{$payment->acc_no}}</td>
                                            <td>{{$payment->acc_name}}</td>
                                            <td>{{$payment->deleted_at}}</td>
                                            <td>{{$payment->created_at}}</td>
                                            <td>{{$payment->updated_at}}</td>
                                            <td>
                                                <a class="btn btn-sm btn-danger delete" data-id="{{$payment->id}}">Delete</a>
                                                <a href="{{route('admin.payments.edit', $payment->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </main>

        <!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-light">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete...</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h1>Are you sure delete?</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>

        <form action="" method="post" id="deleteForm">
            @csrf 
            @method('delete')
        <button type="submit" class="btn btn-danger">Yes</button>
        </form>    

       </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
        $('tbody').on('click','.delete',function(){

            let id = $(this).data('id');
            $('#deleteForm').attr('action', `payments/${id}`);

            $('#deleteModal').modal('show');
       })
    })
</script>

@endsection