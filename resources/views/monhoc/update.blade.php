@extends('layouts.app')
@section('content')
    @include('layouts.navigartionbarMain')

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
                        <form method="POST" action="{{route('admin.updateMonHoc')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$monhoc->id}}">
                            <div class="form-group row">
                                <label for="mamh" class="col-md-4 col-form-label text-md-right">Mã môn học: </label>

                                <div class="col-md-6">
                                    <input type="text" name="mamh" value="{{$monhoc->mamh}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tenmh" class="col-md-4 col-form-label text-md-right">Tên môn học: </label>

                                <div class="col-md-6">
                                    <input type="text" name="tenmh" value="{{$monhoc->tenmh}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mota" class="col-md-4 col-form-label text-md-right">Mô tả: </label>

                                <div class="col-md-6">
                                    <textarea name="mota" id="" cols="22" rows="3">{{$monhoc->mota}}</textarea>

                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 col-form-label text-md-right">
                                    <button class="btn btn-primary" type="submit">Sửa</button>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
