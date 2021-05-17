@extends('layouts.app')
@section('content')
    @include('layouts.navigartionbarMain')

    <div class="container" style="margin-top:50px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">

                        <form method="POST" action="{{ route('user.editThongTin', ['id' => $nguoidung->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div>
                                <div style="color:rgb(28, 212, 28);
                                    font-family: tahoma;
                                    font-size: 20px;
                                    font-weight: bold;
                                    margin-left:50px" class="form-group row">
                                    {{ session('msg_edit') }}
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label text-md-right" style="margin-top: 200px">Ảnh đại diện :</label>
                                    <div class="col-md-6">
                                        <img style="max-width: 200px;border-radius: 5px;
                                        margin-left: 50px;
                                        margin-top: 20px" src="{{ asset($nguoidung->anh) }}"
                                        alt="{{ $nguoidung->id }}">
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Họ tên:</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $nguoidung->name }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Email:</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="email"
                                            value="{{ $nguoidung->email }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="ngay_sinh" class="col-md-4 col-form-label text-md-right">Ngày Sinh:</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="ngay_sinh" value="<?php
                                            $ngaysinh = strtotime($nguoidung->ngay_sinh);
                                            //in ngày tháng năm theo định dạng muốn truyền
                                            echo date('d/m/Y', $ngaysinh);
                                            ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="anh" class="col-md-4 col-form-label text-md-right">Upload ảnh đại
                                        diện:</label>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control" name="anh">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Thay đổi mật
                                        khẩu:</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>



                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Sửa
                                        </button>
                                        <button class="btn btn-primary">
                                            <a href="{{ route('user.xemThongTin', ['id' => Auth::user()->id]) }}"
                                                style="color: white; text-decoration: none">hủy</a>
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.title="Sửa thông tin người dùng";
    </script>
@endsection
