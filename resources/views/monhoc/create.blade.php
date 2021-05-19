@extends('layouts.app')
@section('content')
    @include('layouts.navigartionbarMain')
    {{-- <form action="{{ route('admin.themMonHoc') }}" method="post">
        @csrf
        <li>mã mh: <input type="text" name="mamh"> </li>
        <li>tên mh: <input type="text" name="tenmh"> </li>
        <li>mô tả: <input type="text" name="mota"> </li>
        <button type="submit">thêm</button>
    </form> --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm môn học</div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-5 col-form-label " style="color:red">
                                {{session('msg')}}
                            </div>
                        </div>
                        <form method="POST" action="{{ route('admin.themMonHoc') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="mamh" class="col-md-4 col-form-label text-md-right">Mã môn học: </label>

                                <div class="col-md-6">
                                    <input type="text" name="mamh" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tenmh" class="col-md-4 col-form-label text-md-right">Tên môn học: </label>

                                <div class="col-md-6">
                                    <input type="text" name="tenmh" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mota" class="col-md-4 col-form-label text-md-right">Mô tả: </label>

                                <div class="col-md-6">
                                    <textarea name="mota" id="" cols="22" rows="3"></textarea>

                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 col-form-label text-md-right">
                                    <button class="btn btn-primary" type="submit">thêm</button>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
