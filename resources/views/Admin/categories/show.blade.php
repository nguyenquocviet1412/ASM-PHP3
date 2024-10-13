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
    Chi tiết danh mục: {{ $category->name }}
@endsection

@section('content')
    <h1>Chi tiết danh mục: {{ $category->name }}</h1>

    @if (!empty($_SESSION['errors']))
    <div class="alert alert-warning">
        <ul>
            @foreach ($_SESSION['errors'] as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>

        @php
        unset($_SESSION['errors']);
        @endphp
    </div>
    @endif
    <div class="container">
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" value="{{ $category->name }}" name="name" readonly>
        </div>
    </div>

@endsection
