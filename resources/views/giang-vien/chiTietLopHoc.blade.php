@extends('layouts.app')
@section('content')
    <table border="1" style="text-align: center">
        <tr>
            <td>Ảnh đại diện</td>
            <td>mã sinh viên</td>
            <td>tên sinh viên</td>
            <td>điểm chuyên cần</td>
            <td></td>
        </tr>
        @foreach($dssv as $item)
                <tr>
                    <td><img src="{{asset($item->anh)}}" alt="" style="width: 50px; height: auto"></td>
                    <td>{{$item->masv}}</td>
                    <td>{{$item->name}}</td>
{{--                    <td><input type="text" name="diemcc" value="{{$item->diemcc}}"></td>--}}
                    <td>{{$item->diemcc}}</td>
                    <td>
{{--                        <button><a href="{{route('user.FormChinhSua',['malop'=>$item->ma_lop,'masv'=>$item->masv])}}">sửa</a>--}}
                        <button><a href="{{route('user.formCapNhapDiemCC',['malop'=>$item->ma_lop,'masv'=>$item->masv])}}">sửa</a></button>
                    </td>
                </tr>
        @endforeach
    </table>
@endsection
