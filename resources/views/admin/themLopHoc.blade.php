@extends('layouts.app')
@section('content')
{{session('msg')}}

<form action="{{route('admin.saveLopHoc')}}" method="post" enctype="multipart/form-data">
    @csrf
    <ul>
        <li><label for="ten_lop">tên lớp:</label>
        <input type="text" name="ten_lop" ></li>
        <li>
            <label for="magv">chọn giảng viên:</label>
            <select name="magv" >
                @foreach($giangvien as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </li>
        <li>ngày bắt đầu: <input type="text" name="ngay_bat_dau"></li>
        <li>ngày kết thúc: <input type="text" name="ngay_ket_thuc"></li>
    </ul>
    <button type="submit">Thêm</button>
</form>
<button><a href="{{route('admin.home')}}">HOME</a></button>
<button><a href="{{route('admin.showLopHoc')}}">DS lớp học</a></button>
@endsection
