@extends('layouts.app')
@section('content')
    <form action="" method="post">
        <ul>
            <li>
                mã sv: {{$sinhvien->masv}}
            </li>
            <li>
                tên sv:
            </li>
            <li>
                điểm chuyên cần:{{$sinhvien->diemcc}}
                <input type="text">
            </li>
            <button type="submit">cập nhập</button>
        </ul>
    </form>
@endsection
