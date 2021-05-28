@extends('layouts.app')
@section('content')
    @include('layouts.navigationbar')
    {{-- @if (Auth::user()->level == 2)
        <button><a href="{{ route('giangvien.taoZoomClass', ['malop' => $lopHoc->id]) }}">thêm zoom class</a></button>
        <button><a href="{{ route('giangvien.editZoomClassForm', ['malop' => $lopHoc->id]) }}">sủa zoom class</a></button>
    @endif
    @if ($zoomClass)
        @if (Auth::user()->level == 2)
            <form action="{{ route('giangvien.deleteZoomClass', ['id' => $zoomClass->id]) }}" method="post">
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
    @endif --}}


    <div class="container" style="margin-top: 50px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Online Class</div>

                    <div class="card-body">

                        <div class="form-group row">
                            @if (Auth::user()->level == 2)
                                <div class="col-md-6 col-form-label text-md-right">
                                    <a class="btn btn-primary" role="button"
                                        href="{{ route('giangvien.taoZoomClass', ['malop' => $lopHoc->id]) }}">thêm
                                        zoom class</a>

                                </div>
                                <div class="col-md-2 col-form-label text-md-right">
                                    <a class="btn btn-primary" role="button"
                                        href="{{ route('giangvien.editZoomClassForm', ['malop' => $lopHoc->id]) }}">sủa
                                        zoom class</a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div style="margin-left:200px">
                            @if ($zoomClass)
                                @if (Auth::user()->level == 2)
                                    <form action="{{ route('giangvien.deleteZoomClass', ['id' => $zoomClass->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-primary" role="button" href="{{ $zoomClass->link_zoom }}" target="_blank">vào lớp :
                                                {{ $lopHoc->ten_lop }}</a>
                                        <button class="btn btn-danger"type="submit">Xóa </button>
                                    </form>
                                @else
                                    <a class="btn btn-primary" role="button" href="{{ $zoomClass->link_zoom }}" target="_blank">vào lớp :
                                            {{ $lopHoc->ten_lop }}</a>
                                @endif
                            @else
                                <h3>Hiện tại chưa có lớp học online</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        document.title = "Online class"

    </script>
@endsection
