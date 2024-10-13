
@extends('Admin.layouts.master')

@section('title')
    Tạo tài khoản
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h4 class="text-center">Tạo tài khoản</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.users.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Full Name</label>
                            <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Enter full name" >
                        </div>
                        @error('fullname')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" >
                        </div>
                        @error('username')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" class="form-select" id="role" >
                                <option selected disabled>Choose role...</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        @error('role')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Enter address">
                        </div>
                        @error('address')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" >
                        </div>
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" >
                        </div>
                        @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="mb-3">
                            <label for="password" class="form-label">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" id="password" placeholder="Enter confirm password" >
                        </div>
                        @error('confirm_password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Add User</button>
                            <a href="{{route('admin.users.index')}}" class="btn btn-secondary ms-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
