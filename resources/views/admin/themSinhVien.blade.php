@extends('layouts.app')
@section('content')
{{session('msg')}}
<form action="{{route('admin.saveSinhVien')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="anh">ảnh đại diện</label>
    <input type="file" name="anh" >
    <br>
    <label for="name">tên sinh viên:</label>
    <input type="text" name="name" required>
    <br>
    <label for="gioi_tinh">Giới tính: </label>
    <select name="gioi_tinh" >
        <option value="1">Nam</option>
        <option value="0">Nữ</option>
    </select>
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
    <button type="submit">Thêm</button>
</form>
<button><a href="{{route('admin.home')}}">HOME</a></button>
<button><a href="{{route('admin.showSinhVien')}}">DS sinh viên</a></button>
@endsection
