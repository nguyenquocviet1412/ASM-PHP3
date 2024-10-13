@extends('Admin.layouts.master')

@section('title')
    Chi tiết bài viết
@endsection

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Chi tiết bài viết</h3>
        </div>
        <div class="card-body">
            <!-- Hiển thị ID bài viết -->
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">ID bài viết:</div>
                <div class="col-md-9">{{ $post->id }}</div>
            </div>

            <!-- Hiển thị tiêu đề bài viết -->
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Tiêu đề:</div>
                <div class="col-md-9">{{ $post->title }}</div>
            </div>

            <!-- Hiển thị hình ảnh bài viết -->
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Hình ảnh:</div>
                <div class="col-md-9">
                    <img src="{{ $post->image }}" alt="Image" class="img-fluid" width="300">
                </div>
            </div>

            <!-- Hiển thị nội dung bài viết -->
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Nội dung:</div>
                <div class="col-md-9">{{ $post->content }}</div>
            </div>

            <!-- Hiển thị danh mục bài viết -->
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Danh mục:</div>
                <div class="col-md-9">{{ $post->category->name }}</div>
            </div>

            <!-- Hiển thị thông tin người đăng -->
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Người đăng:</div>
                <div class="col-md-9">
                    @if ($post->user)
                        {{ $post->user->username }}
                    @else
                        Người đăng không tồn tại
                    @endif
                </div>
            </div>

            <!-- Hiển thị trạng thái bài viết -->
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Trạng thái:</div>
                <div class="col-md-9">
                    {{ $post->status ? 'Đã đăng' : 'Chưa đăng' }}
                </div>
            </div>

            <!-- Nút điều hướng -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Quay lại</a>
                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">Chỉnh sửa</a>
                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa bài viết này không?')">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
