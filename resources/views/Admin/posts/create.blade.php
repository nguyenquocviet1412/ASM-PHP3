@extends('Admin.layouts.master')

@section('title')
    Thêm bài viết
@endsection

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Thêm bài viết mới</h3>
        </div>
        <div class="card-body">
            <!-- Form thêm bài viết -->
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Tiêu đề bài viết -->
                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Nhập tiêu đề" required>
                </div>

                <!-- Hình ảnh bài viết -->
                <div class="mb-3">
                    <label for="image" class="form-label">Hình ảnh</label>
                    <input type="file" name="image" class="form-control" id="image" >
                </div>

                <!-- Nội dung bài viết -->
                <div class="mb-3">
                    <label for="content" class="form-label">Nội dung</label>
                    <textarea name="content" class="form-control" id="content" rows="5" placeholder="Nhập nội dung" required></textarea>
                </div>

                <!-- Danh mục bài viết -->
                <div class="mb-3">
                    <label for="category" class="form-label">Danh mục</label>
                    <select name="id_category" id="category" class="form-select" required>
                        <option value="" disabled selected>Chọn danh mục</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Trạng thái bài viết -->
                <div class="mb-3">
                    <label for="status" class="form-label">Trạng thái</label>
                    <select name="status" id="status" class="form-select" >
                        <option value="1">Đã đăng</option>
                        <option value="0">Chưa đăng</option>
                    </select>
                </div>

                <input type="hidden" name="id_user" value="{{session('user.id')}}">
                <!-- Nút thêm bài viết -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Quay lại</a>
                    <button type="submit" class="btn btn-success">Thêm bài viết</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
