@extends('layouts.app')
@section('content')
    <table border="1" style="text-align: center">
        <tr>
            <td>mã lớp</td>
            <td>tên lớp</td>
            <td></td>
        </tr>
        @foreach($lophoc as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->ten_lop}}</td>
                <td>
                    <button>
                        <a href="{{route('user.xemChiTietLop',['malop'=>$item->id])}}">chi tiết</a>
                    </button>

                </td>
            </tr>
        @endforeach
    </table>
    <button><a href="{{route('home')}}">trở về</a></button>
@endsection
