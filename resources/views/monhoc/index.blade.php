@extends('layouts.app')
@section('content')
    @include('layouts.navigartionbarMain')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header " style="font-weight:bold">Danh sách môn học</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-2 col-form-label text-md-right" style="color:#FF4136">
                                {{ session('msg')}}
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 col-form-label text-md-right">
                                <a href="{{ route('admin.formThemMonHoc') }}" class="btn btn-primary" role="button">Thêm
                                    môn
                                    học</a>
                            </div>
                        </div>
                        @foreach ($monhoc as $item)
                            <div class="border border-light "
                                style="margin-bottom: 5px; background: #34568B;color:white;border-radius: 5px">
                                <div class="form-group row">
                                    <label for="mamh" class="col-md-4 col-form-label text-md-right">Mã môn học :</label>
                                    <div class="col-md-6 col-form-label">
                                        {{ $item->mamh }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tenmh" class="col-md-4 col-form-label text-md-right">tên môn học :</label>
                                    <div class="col-md-6 col-form-label">
                                        {{ $item->tenmh }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mota" class="col-md-4 col-form-label text-md-right">mô tả :</label>
                                    <div class="col-md-6 col-form-label">
                                        {{ $item->mota }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-4">


                                        <form action="{{ route('admin.deleteMonHoc', ['id' => $item->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('admin.formupdateMonHoc', ['mamh' => $item->id]) }}"
                                                class="btn btn-primary" role="button">sửa</a>
                                            <button class="btn btn-danger">xóa</button>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.title = "quản lý môn học";

    </script>
@endsection
