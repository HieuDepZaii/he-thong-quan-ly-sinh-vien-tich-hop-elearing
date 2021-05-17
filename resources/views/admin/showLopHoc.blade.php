@extends('layouts.app')
@section('content')
    {{session('msg_edit')}}
    {{session('msg_delete')}}
    <br>
    <button><a href="{{route('admin.createLopHoc')}}">thêm lớp học</a></button>
    <button><a href="{{route('admin.home')}}">Admin Home</a></button>
    @foreach($lophoc as $item)
        <fieldset>
            <ul>
                <li>tên lớp: {{$item->ten_lop}}</li>
                <li>tên giảng viên: {{$item->name}}</li>
                <li>ngày bắt đầu:
                    @php
                        $ngay_bat_dau=strtotime($item->ngay_bat_dau);
                        //in ngày tháng năm theo định dạng muốn truyền
                        echo date('d/m/Y',$ngay_bat_dau);
                    @endphp
                </li>
                <li>ngày kết thúc:
                    @php
                        $ngay_ket_thuc=strtotime($item->ngay_ket_thuc);
                        //in ngày tháng năm theo định dạng muốn truyền
                        echo date('d/m/Y',$ngay_ket_thuc);
                    @endphp
                </li>
                <br>
                <button><a href="{{route('admin.suaLopHoc',['id'=>$item->id])}}">sửa</a></button>
                <form action="{{route('admin.xoaLopHoc',['id'=>$item->id])}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">xóa</button>
                </form>
            </ul>
        </fieldset>
    @endforeach
@endsection
