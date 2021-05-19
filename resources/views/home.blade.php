@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        {{-- @if (Auth::user()->level == 1)
                            học viên
                        @elseif(Auth::user()->level ==2)
                            giảng viên
                        @else
                            Admin
                        @endif --}}
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <br>
                        <img style="max-width: 200px;height: auto"
                            src="{{ asset(\Illuminate\Support\Facades\Auth::user()->anh) }}" alt="and-dai-dien">
                        <br>
                        mã username: {{ \Illuminate\Support\Facades\Auth::user()->id }}
                        <br>
                        tên: {{ \Illuminate\Support\Facades\Auth::user()->name }}<br>
                        ngày sinh: <?php
                        $ngaysinh = strtotime(\Illuminate\Support\Facades\Auth::user()->ngay_sinh);
                        //in ngày tháng năm theo định dạng muốn truyền
                        echo date('d/m/Y', $ngaysinh);
                        ?> <br>
                        You are logged in!
                        <br>


                    </div>

                    <div class="card-body">
                        <div class="panel-body">
                            Check admin view:
                            <a href="{{ route('admin.view') }}">Admin View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
