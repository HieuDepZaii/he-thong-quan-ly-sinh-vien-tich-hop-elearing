@extends('layouts.app')
@section('content')
    <h1>Admin Home</h1>
    <h2>mã GV: {{\Illuminate\Support\Facades\Auth::user()->id}}</h2>

    <button><a href="{{route('admin.showGiangVien')}}">xem ds giảng viên</a></button>
    <button><a href="{{route('admin.showSinhVien')}}">xem ds sinh viên</a></button>
    <button><a href="{{route('admin.showLopHoc')}}">xem ds lớp môn học</a></button>
    <button><a href="{{route('admin.showGiangDay')}}">xem ds giảng dạy</a></button>
    <button><a href="{{route('home')}}">Home</a></button>
@endsection
