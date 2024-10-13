@extends('Admin.layouts.master')

@section('title')
Danh sách Danh mục
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h1 class="m-0">Danh sách Danh mục</h1>
                    </div>
                </div>
            </div>
            <div class="white_card_body">

                <a class="btn btn-primary" href="{{ route('admin.categories.create') }}">Thêm mới</a>
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
                                <th>NAME</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($categories2 as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td class="d-flex">

                                    <a class="btn btn-info" href="{{ route('admin.categories.show',$category->id) }}">Xem</a>
                                    <a class="btn btn-warning" href="{{ route('admin.categories.edit',$category->id) }}">Sửa</a>

                                    <form action="{{route('admin.categories.destroy',$category->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"
                                            onclick="return confirm('Bạn có chắc muốn Danh mục có ID: {{$category->id}} không ?')"
                                        >Delete</button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $categories2->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
