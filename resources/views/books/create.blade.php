@extends('books.app')
@section('content')
<div class="container">
    <h1>Thêm sách mới</h1>
    <form action="{{route('books.store')}}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Tên sách:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group mb-3">
            <label for="author">Tác giả:</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>
        <div class="form-group mb-3">
            <label for="category">Thể loại:</label>
            <input type="text" class="form-control" id="category" name="category" required>
        </div>
        <div class="form-group mb-3">
            <label for="year">Năm xuất bản:</label>
            <input type="text" class="form-control" id="year" name="year" required>
        </div>
        <div class="form-group mb-3">
            <label for="quantity">Số lượng bản sao:</label>
            <input type="text" class="form-control" id="quantity" name="quantity" required>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>

@endsection

