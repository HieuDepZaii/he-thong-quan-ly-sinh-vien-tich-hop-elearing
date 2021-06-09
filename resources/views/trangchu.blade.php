@extends('layouts.app')
@section('content')
    @include('layouts.navigartionbarMain')
    {{-- content --}}
    @guest
        @if (Route::has('login'))
            <h1 class="d-flex justify-content-center" style="font-family: Verdana, Geneva, Tahoma, sans-serif;
                                            font-weight: bold">Chào mừng đến với hệ thống </h1>
            <h2 class="text-danger d-flex justify-content-center" style="font-family: Verdana, Geneva, Tahoma, sans-serif;
                                            font-weight: bold">Bạn chưa đăng nhập</h2>
            <div class="d-flex justify-content-center" style="font-size: 250px; margin: 30px">
                {{-- <i class="far fa-smile "></i> --}}
                {{-- <i class="far fa-grin-squint-tears" ></i> --}}
                {{-- <i class="fas fa-poo"></i> --}}
                <i class="far fa-laugh-squint"></i>
                {{-- <i class="far fa-smile"></i> --}}
            </div>


        @endif
    @else
        <div class="container">
            <div class="row">
                <div style="border: 1px solid black; height:500px" class="col-sm">
                    <button class="btn btn-success" style="width:100%;margin-top:10px">
                        @if (Auth::user()->level == 1)
                            <i class="fas fa-pen"></i> <a style="color:white"
                                href="{{ route('hocvien.viewDangKiLopHoc') }}">Đăng kí lớp học</a>
                        @elseif(Auth::user()->level==2)
                            <i class="fas fa-pen"></i> <a style="color:white"
                                href="{{ route('giangvien.viewDangKiMoLop') }}">Đăng kí mở lớp</a>
                        @else
                            <a href="" style="color: white">=))</a>
                        @endif

                    </button>
                </div>
                <div class="col-sm" style="border: 1px solid black; height: 500px;">

                    <h3 style="text-align: center"><i class="fa fa-bell"></i> Thông báo</h3>
                    <div>
                        <ul class="list-group ">
                            @foreach ($infomation as $item)
                            <li class="list-group-item">{{ $item->content }}</li>
                            @endforeach
                        </ul>

                    </div>

                </div>
                <div class="col-sm" style="border: 1px solid black;height: 500px">
                    <img src="{{ asset('img/cloudlibrary-logo.jpg') }}" alt="cloudlibraty-logo" style="width: 100%">
                </div>
            </div>
        </div>

    @endguest

    <script>
        document.title = "Trang chủ";

    </script>
@endsection
