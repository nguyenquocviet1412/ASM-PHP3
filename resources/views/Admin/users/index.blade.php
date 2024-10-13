@extends('Admin.layouts.master')

@section('title')
    Danh sách User
@endsection

@section('content')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h1 class="m-0">Danh sách User</h1>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">

                    <a class="btn btn-primary" href="{{ route('admin.users.create') }}">Thêm mới</a>

                    @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="container mt-5">
                        <h2 class="text-center mb-4">Danh Sách Người Dùng</h2>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="search" placeholder="Tìm kiếm người dùng...">
                        </div>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>FULLNAME</th>
                                    <th>USERNAME</th>
                                    <th>EMAIL</th>
                                    <th>PASSWORD</th>
                                    <th>ADDRESS</th>
                                    <th>ROLE</th>
                                    <th>ACTIVE</th>
                                    <td>ACTION</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->fullname}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>********</td>
                                    <td>{{$user->address}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>
                                        <form action="{{ route('admin.toggleStatusUser', $user->id) }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" name="active" value="{{ $user->active ? 0 : 1 }}">
                                            <input
                                            @if (session('user.id') === $user->id)
                                                disabled
                                            @endif
                                            type="checkbox" class="toggle-status" {{ $user->active ? 'checked' : '' }} data-toggle="toggle" data-on="Hoạt động" data-off="Chưa kích hoạt" data-onstyle="success" data-offstyle="danger" onchange="this.form.submit()">
                                        </form>
                                    </td>
                                    <td class="d-flex">
                                        <a class="btn btn-info" href="{{ route('admin.users.show',$user->id) }}">Xem</a>
                                        <a class="btn btn-warning" href="{{ route('admin.users.edit',$user->id) }}">Sửa</a>

                                        <form action="{{route('admin.users.destroy',$user->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"
                                                onclick="return confirm('Bạn có chắc muốn tài khoản có ID: {{$user->id}} không ?')"
                                                @if (session('user.id') === $user->id)
                                                    disabled
                                                @endif
                                                >Delete</button>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <script>
                        $(function() {
                    $('.toggle-status').bootstrapToggle();
                });
                    </script>


                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
                </div>
            </div>
        </div>
    </div>
@endsection
