@extends('layouts.app')
@section('content')
    <form action="{{route('user.capNhapDiemcc',['malop'=>$sinhvien->ma_lop,'masv'=>$sinhvien->masv])}}" method="post">
        @csrf
        <table border="1" style="text-align: center">
            <tr>
                <td>ảnh đại diện</td>
                <td>mã sinh viên</td>
                <td>tên sinh viên</td>
                <td>mã lớp</td>
                <td>điểm cc</td>
                <td></td>
            </tr>
            <tr>
                <td><img style="max-width: 100px" src="{{asset($sinhvien->anh)}}" alt=""></td>
                <td>{{$sinhvien->masv}}</td>
                <td>{{$sinhvien->name}}</td>
                <td>{{$sinhvien->ma_lop}}</td>
                <td><input type="text" value="{{$sinhvien->diemcc}}" name="diemcc"></td>
                <td>
                    <button type="submit">sửa</button>
                </td>
            </tr>
        </table>
    </form>
@endsection
