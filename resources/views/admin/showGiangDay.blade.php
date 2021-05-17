@extends('layouts.app')
@section('content')

<h3 class="error">{{session('msg_error')}}</h3>
<h1>điều phối giảng dạy</h1>
<form action="{{route('admin.saveGiangDay')}}" method="post">
    @csrf
    <ul>
        <li>mã sinh viên: <input type="text" name="masv" ></li>
        <li>tên lớp:
            <select name="ma_lop" >
                @foreach($lophoc as $item)
                    <option value="{{$item->id}}">{{$item->ten_lop}}</option>
                @endforeach
            </select>
        </li>
        <button type="submit">thêm</button>
    </ul>
</form>
<button><a href="{{route('admin.home')}}">Admin Home</a></button>
<table style="text-align: center">
    <tr>
        <td>tên lớp</td>
        <td>mã sv</td>
        <td>tên sv</td>
        <td></td>
    </tr>
    @foreach($giangday as $item)
        <tr>
            <td>{{$item->ten_lop}}</td>
            <td>{{$item->masv}}</td>
            <td>{{$item->name}}</td>
            <td>
                <form action="{{route('admin.xoaGiangDay',['id'=>$item->id])}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">xóa</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection
