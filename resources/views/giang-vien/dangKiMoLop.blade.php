@extends('layouts.app')
@section('content')
    đăng kí mở lớp
    <h2 style="color:red">{{session('msg')}}</h2>
    <form action="{{route('giangvien.saveLopHoc')}}" method="post" enctype="multipart/form-data">
        @csrf
        <ul>
            <li><label for="ten_lop">tên lớp:</label>
            <input type="text" name="ten_lop" ></li>

                {{-- <label for="magv">mã giáo viên:</label> --}}
                <input type="hidden" name="magv" value="{{Auth::user()->id}}" >
            
            <li>
                <label for="monhoc_id">Môn học:</label>
                <select name="monhoc_id" id="">
                    @foreach ($mon_hoc as $item)
                        <option value="{{$item->id}}">{{$item->tenmh}}</option>
                    @endforeach
                </select>
            </li>
            <li>ngày bắt đầu: <input type="text" name="ngay_bat_dau"></li>
            <li>ngày kết thúc: <input type="text" name="ngay_ket_thuc"></li>
        </ul>
        <button type="submit">Thêm</button>
    </form>
@endsection
