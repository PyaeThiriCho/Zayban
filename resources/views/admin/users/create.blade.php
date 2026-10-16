@extends('layouts.admin')
@section('content')

<div class="container-fluid px-4">
    <div class="my-3">
        <h1 class="mt-4 d-inline">Create User</h1>
        <a href="{{route('admin.users.index')}}" class="btn btn-danger float-end">Back</a>
    </div>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Users</a></li>
        <li class="breadcrumb-item active">Create User</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create User
        </div>

        <div class="card-body">

            <form action="{{route('admin.users.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>

                    <input type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           name="name"
                           id="name"
                           value="{{old('name')}}">

                    @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>

                    <input type="text"
                           class="form-control @error('phone') is-invalid @enderror"
                           name="phone"
                           id="phone"
                           value="{{old('phone')}}">

                    @error('phone')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="profile" class="form-label">Profile</label>

                    <input type="file"
                           accept="image/*"
                           class="form-control @error('profile') is-invalid @enderror"
                           name="profile"
                           id="profile">

                    @error('profile')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>

                    <input type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           name="email"
                           id="email"
                           value="{{old('email')}}" autocomplete="off">

                    @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>

                    <input type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password"
                           id="password" autocomplete="new-password">

                    @error('password')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>

                    <select class="form-select @error('role') is-invalid @enderror"
                            name="role"
                            id="role">

                        <option value="">Choose Role</option>

                        <option value="admin" {{old('role') == 'admin' ? 'selected':''}}>
                            Admin
                        </option>

                        <option value="staff" {{old('role') == 'staff' ? 'selected':''}}>
                            Staff
                        </option>

                        <option value="user" {{old('role') == 'user' ? 'selected':''}}>
                            User
                        </option>

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