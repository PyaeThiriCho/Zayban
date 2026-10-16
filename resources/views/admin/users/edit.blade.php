@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    <div class="my-3">
        <h1 class="mt-4 d-inline">Edit User</h1>
        <a href="{{route('admin.users.index')}}" class="btn btn-danger float-end">Back</a>
    </div>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Users</a></li>
        <li class="breadcrumb-item active">Edit User</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit User
        </div>
        <div class="card-body">
        <form action="{{route('admin.users.update', $user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
     
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{$user->name}}">
                @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

             <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{$user->phone}}">
                @error('phone')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>


            <div class="mb-3">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active"
                                id="profile-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#profile-tab-pane"
                                type="button"
                                role="tab">
                            Profile
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link"
                                id="new_profile-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#new_profile-tab-pane"
                                type="button"
                                role="tab">
                            New Profile
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active"
                        id="profile-tab-pane"
                        role="tabpanel">
                        <img src="{{$user->profile}}" alt="" class="w-25 h-25 my-3">
                        <input type="hidden"
                            name="old_profile"
                            value="{{$user->profile}}">
                    </div>
                    <div class="tab-pane fade"
                        id="new_profile-tab-pane"
                        role="tabpanel">

                        <input type="file"
                            accept="image/*"
                            class="form-control my-3"
                            name="profile"
                            id="profile">
                    </div>
                </div>
            </div>


            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{$user->email}}">
                @error('email')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>

                <input type="password"
                    class="form-control"
                    name="password"
                    id="password"
                    autocomplete="new-password">
            </div>


            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <!-- <input type="text" class="form-control @error('role') is-invalid @enderror" name="role" id="role" value="{{$user->role}}"> -->

             <select class="form-select @error('role') is-invalid @enderror" name="role" id="role">
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
            </select>

                @error('role')
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
