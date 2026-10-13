@extends('layouts.admin')
@section('content')

                <main>
                    <div class="container-fluid px-4">
                        <div class="my-3">
                            <h1 class="mt-4 d-inline">Users</h1>
                            <a href="{{route('admin.users.create')}}" class="btn btn-primary float-end">Create User</a>
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Users List
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Profile</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                             <th>No.</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Profile</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                
                                    <tbody>
                                        @php 
                                           $j = 1;
                                        @endphp
                                        @foreach($users as $user)

                                        <tr>
                                            <td>{{$j++}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->profile}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->role}}</td>
                                            <td>
                                                <a class="btn btn-sm btn-danger delete" data-id="{{$user->id}}">Delete</a>
                                                <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-sm btn-warning">Edit</a>
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
            $('#deleteForm').attr('action', `users/${id}`);

            $('#deleteModal').modal('show');
       })
    })
</script>

@endsection