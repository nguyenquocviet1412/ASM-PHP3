@extends('Admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Sửa bài viết</h3>
        </div>
        <div class="card-body">
            <!-- Form sửa bài viết -->
            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Tiêu đề bài viết -->
                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}" required>
                </div>

                <!-- Hình ảnh bài viết -->
                <div class="mb-3">
                    <label for="image" class="form-label">Hình ảnh</label>
                    <input type="file" name="image" class="form-control" id="image">
                    <small class="text-muted">Để lại trống nếu không muốn thay đổi hình ảnh.</small>
                </div>

                <!-- Hiển thị hình ảnh hiện tại -->
                @if($post->image)
                    <div class="mb-3">
                        <label class="form-label">Hình ảnh hiện tại</label><br>
                        <img src="{{ asset('storage/' . $post->image) }}" width="150" alt="Hình ảnh bài viết">
                    </div>
                @endif

                <!-- Nội dung bài viết -->
                <div class="mb-3">
                    <label for="content" class="form-label">Nội dung</label>
                    <textarea name="content" class="form-control" id="content" rows="5" required>{{ $post->content }}</textarea>
                </div>

                <!-- Danh mục bài viết -->
                <div class="mb-3">
                    <label for="category" class="form-label">Danh mục</label>
                    <select name="id_category" id="category" class="form-select" required>
                        <option value="" disabled>Chọn danh mục</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $post->id_category ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Trạng thái bài viết -->
                <div class="mb-3">
                    <label for="status" class="form-label">Trạng thái</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Đã đăng</option>
                        <option value="0" {{ $post->status == 0 ? 'selected' : '' }}>Chưa đăng</option>
                    </select>
                </div>

                <!-- Nút sửa bài viết -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Quay lại</a>
                    <button type="submit" class="btn btn-success">Cập nhật bài viết</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
