@extends('layouts.app')
@section('content')
    @include('layouts.navigartionbarMain')

    <div class="container" style="margin-top: 50px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="GET" action="{{route('user.InfomationEditForm',['id'=>Auth::user()->id])}}">
                            @csrf
                            <div style="margin: 50px">

                                <div class="form-group row">
                                    <img style="max-width: 200px;border-radius: 5px" src="{{ asset($nguoidung->anh) }}"
                                        alt="{{ $nguoidung->id }}">
                                </div>
                                <div class="form-group row">
                                    <label for="">Họ tên:</label>
                                    <div class="col-md-6">
                                        {{ $nguoidung->name }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="">Email:</label>
                                    <div class="col-md-6">
                                        {{ $nguoidung->email }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="">Ngày sinh:</label>
                                    <div class="col-md-6">
                                        <?php
                                        $ngaysinh = strtotime($nguoidung->ngay_sinh);
                                        //in ngày tháng năm theo định dạng muốn truyền
                                        echo date('d/m/Y', $ngaysinh);
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="">Loại tài khoản</label>
                                    <div class="col-md-6">
                                        @if (Auth::user()->level == 1)
                                            học viên
                                        @elseif (Auth::user()->level==2)
                                            giảng viên
                                        @else
                                            admin
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                           sửa thông tin
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
        document.title="thông tin người dùng";
    </script>
@endsection
