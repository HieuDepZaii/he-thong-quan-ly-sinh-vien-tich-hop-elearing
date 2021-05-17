@extends('layouts.app')
@section('content')
<h2>danh sách giảng viên</h2>
{{session('msg_edit')}}
{{session('msg_delete')}}
<br>
<button><a href="{{route('admin.createGiangVien')}}">thêm giảng viên</a></button>
<button><a href="{{route('admin.home')}}">Admin Home</a></button>
@foreach($giangvien as $item)
    <fieldset >
    <ul>
        <li>Ảnh đại diện:
            <br>
            <img style="max-width: 200px;height: auto" src="{{asset($item->anh)}}" alt="id {{$item->id}}">
        </li>
        <li>mã giảng viên: {{$item->id}}</li>
        <li>tên giảng viên: {{$item->name}}</li>
        <li>email: {{$item->email}}</li>
        <li>ngày sinh:
            @php
            $ngaysinh=strtotime($item->ngay_sinh);
            //in ngày tháng năm theo định dạng muốn truyền
            echo date('d/m/Y',$ngaysinh);
            @endphp
        </li>
        <br>
        <button><a href="{{route('admin.suaGiangVien',['id'=>$item->id])}}">sửa</a></button>
        <form action="{{route('admin.xoaGiangVien',['id'=>$item->id])}}" method="post">
            @csrf
            @method('delete')
            <button type="submit">xóa</button>
        </form>
    </ul>
    </fieldset>
@endforeach

@endsection
