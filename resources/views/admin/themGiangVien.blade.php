@extends('layouts.app')
@section('content')
{{session('msg')}}
<form action="{{route('admin.saveGiangVien')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="anh">ảnh đại diện</label>
    <input type="file" name="anh">
    <br>
    <label for="name">tên giảng viên:</label>
    <input type="text" name="name" required>
    <br>
    <label for="email">email:</label>
    <input type="email" name="email" required>
    <br>
    <label for="ngay_sinh">ngày sinh:</label>
    <select name="ngay" id="ngay">
        <?php
        for ($i = 1; $i <= 31; $i++) {
        ?>
        <option value="{{$i}}">{{$i}}</option>
        <?php
        }
        ?>
    </select>

    <select name="thang" id="thang">
        <?php
        for ($i = 1; $i <= 12; $i++) {
        ?>
        <option value="{{$i}}">{{$i}}</option>
        <?php
        }
        ?>
    </select>
    <select name="nam" id="nam">
        <?php
        for ($i = 1990; $i <= (int)date("Y"); $i++) {
        ?>
        <option value="{{$i}}">{{$i}}</option>
        <?php
        }
        ?>
    </select>
    <br>
    <label for="password">mật khẩu: <input type="password" name="password"></label>
    <br>
    <button type="submit">Thêm</button>
</form>
<button><a href="{{route('admin.home')}}">HOME</a></button>
<button><a href="{{route('admin.showGiangVien')}}">DS giảng viên</a></button>
@endsection
