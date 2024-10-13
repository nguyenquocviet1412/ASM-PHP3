<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

</body>

</html>
@extends('Admin.layouts.master')

@section('title')
    Chi tiết người dùng: {{ $user['fullname'] }}
@endsection

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h4 class="text-center">Chi tiết người dùng: {{ $user['fullname'] }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Full Name</label>
                            <p id="fullname" class="form-control-plaintext">{{$user->fullname}}</p>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <p id="username" class="form-control-plaintext">{{$user->username}}</p>
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <p id="role" class="form-control-plaintext">{{$user->role}}</p>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <p id="address" class="form-control-plaintext">{{$user->address}}</p>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <p id="email" class="form-control-plaintext">{{$user->email}}</p>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <p id="password" class="form-control-plaintext">********</p>
                        </div>

                        <div class="mb-3">
                            <label for="active" class="form-label">Active</label>
                            <p id="active" class="form-control-plaintext">
                                @if($user->active == 1)
                                    Hoạt động
                                @else
                                    Chưa kích hoạt
                                @endif
                            </p>
                        </div>

                        <div class="text-center">
                            <a href="{{route('admin.users.index')}}" class="btn btn-primary">Back to User List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
