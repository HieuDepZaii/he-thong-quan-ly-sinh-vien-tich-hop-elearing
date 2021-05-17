@extends('layouts.app')
@section('content')
@include('layouts.navigartionbarMain')

    {{-- <form action="{{route('hocvien.saveDangKiLopHoc')}}" method="post">
        @csrf
        <ul>
            <li>chọn lớp học </li>
            <input type="hidden" name="masv" value="{{Auth::user()->id}}">
            <li>
                <select name="malop" id="">
                    @foreach ($dsLopHoc as $item)
                        <option value="{{ $item->id }}">{{ $item->ten_lop }}</option>
                    @endforeach
                </select>
            </li>
            <button type="submit">Đăng kí lớp học</button>
        </ul>
    </form> --}}
    <div class="container" style="margin-top:20px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Đăng kí lớp học</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <h3 style="color:red;
                            margin-left: 30%">
                            {{session('msg')}}</h3>
                        </div>
                        <form method="POST" action="{{route('hocvien.saveDangKiLopHoc')}}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Chọn lớp học: </label>

                                <div class="col-md-6" style="margin-top: 5px">
                                    <select name="malop" >
                                        @foreach ($dsLopHoc as $item)
                                            <option value="{{ $item->id }}">{{ $item->ten_lop }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="masv" value="{{Auth::user()->id}}">
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Đăng kí
                                    </button>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
