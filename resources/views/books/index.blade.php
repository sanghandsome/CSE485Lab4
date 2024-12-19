@extends('books.app')

@section('content')
@php
 $cnt = 1
@endphp
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h1 class="mb-4">Danh sách sách</h1>
<a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Thêm sách mới</a>
<table class="table">
    <thead>
    <tr>
        <th scope="col">STT</th>
        <th scope="col">Tên sách</th>
        <th scope="col">Tác giả</th>
        <th scope="col">Thể loại</th>
        <th scope="col">Năm xuất bản</th>
        <th scope="col">Số lượng bản sao</th>
        <th scope="col">Hành động</th>

    </tr>
    </thead>
    <tbody>
    @foreach($books as $book)
        <tr>
            <th scope="row">{{$cnt}}</th>
            <td>{{$book->name}}</td>
            <td>{{$book->author}}</td>
            <td>{{$book->category}}</td>
            <td>{{$book->year}}</td>
            <td>{{$book->quantity}}</td>
            <td>
                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline" id="delete-form-{{ $book->id }}">
                    @csrf
                    @method('DELETE')
{{--                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>--}}
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
                </form>
            </td>
        </tr>
        @php
            $cnt++
         @endphp
    @endforeach
    </tbody>
</table>
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa công việc này không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $book->id }})">Xóa</button>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center mt-4">
    {{$books->links()}}
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
<script>
    function selectID(taskId){
        deleteID =

    }
    function confirmDelete(taskId) {
        // Nếu người dùng nhấn "Xóa", submit form để thực hiện xóa
        document.getElementById('delete-form-' + taskId).submit();
    }
</script>
</html>
@endsection
