@extends('Admin.layouts.master')

@section('title')
    Danh sách Bài viết
@endsection

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">


    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h1 class="m-0">Danh sách bài viết</h1>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">

                    <a class="btn btn-primary" href="{{ route('admin.posts.create') }}">Thêm mới</a>

                    @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>TITLE</th>
                                    <th>IMAGE</th>
                                    <th>CONTENT</th>
                                    <th>CATEGORY NAME</th>
                                    <th>AUTHOR</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>
                                            <img src="{{$post->image}}" width="80" alt="">
                                            <img src="{{asset('storage'). '/'. $post->image}}" width="80" alt="">
                                        </td>
                                        <td>{{ Str::limit($post->content, 200) }}</td>
                                        <td>{{$post->category->name}}</td>
                                        <td>
                                            @if ($post->user)
                                                {{ $post->user->username }}
                                            @else
                                                Người đăng không tồn tại
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.toggleStatus', $post->id) }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name="status" value="{{ $post->status ? 0 : 1 }}">
                                                <input type="checkbox" class="toggle-status" {{ $post->status ? 'checked' : '' }} data-toggle="toggle" data-on="PUBLIC" data-off="PRIVATE" data-onstyle="success" data-offstyle="danger" onchange="this.form.submit()">
                                            </form>
                                        </td>
                                        <td class="d-flex">
                                            <a class="btn btn-info" href="{{ route('admin.posts.show',$post->id) }}">Xem</a>
                                            <a class="btn btn-warning" href="{{ route('admin.posts.edit',$post->id) }}">Sửa</a>

                                            <form action="{{route('admin.posts.destroy',$post->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit"
                                                    onclick="return confirm('Bạn có chắc muốn Bài viết có ID: {{$post->id}} không ?')"
                                                >Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
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
@endsection
