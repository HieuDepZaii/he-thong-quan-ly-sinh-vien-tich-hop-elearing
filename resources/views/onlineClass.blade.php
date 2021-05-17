@extends('layouts.app')
@section('content')
    @include('layouts.navigationbar')
    @if (Auth::user()->level == 2)
        <button><a href="{{ route('giangvien.taoZoomClass', ['malop' => $lopHoc->id]) }}">thêm zoom class</a></button>
        <button><a href="{{ route('giangvien.editZoomClassForm', ['malop' => $lopHoc->id]) }}">sủa zoom class</a></button>
    @endif
    @if ($zoomClass)
        @if (Auth::user()->level == 2)
            <form action="{{route('giangvien.deleteZoomClass',['id'=>$zoomClass->id])}}" method="post">
                @csrf
                @method('DELETE')
                <li><a href="{{ $zoomClass->link_zoom }}" target="_blank">vào lớp : {{ $lopHoc->ten_lop }}</a></li>
                <button type="submit">Xóa </button>
            </form>
        @else
        <li><a href="{{ $zoomClass->link_zoom }}" target="_blank">vào lớp : {{ $lopHoc->ten_lop }}</a></li>
        @endif
    @else
        <h3>Hiện tại chưa có lớp học online</h3>
    @endif
    <script>
        document.title = "Online class"

    </script>
@endsection
