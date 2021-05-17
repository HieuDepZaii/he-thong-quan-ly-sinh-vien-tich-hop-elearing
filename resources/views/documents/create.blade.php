
@extends('layouts.app')

@section('content')
@include('layouts.navigationbar')
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <p> Tên lớp: {{$lopHoc->ten_lop}}</p>
                <p> Môn học: {{$lopHoc->tenmh}}</p> --}}
            <div class="card">

                <div class="card-header">Thêm tài liệu</div>

                <div class="card-body">

                    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        Title:
                        <br>
                        <input type="text" name="title" class="form-control">
                        <input type="hidden" name="malop" value="{{$lopHoc->id}}">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <br>
                        <input type="hidden" name>

                        Cover File:
                        <br>
                        <input type="file" name="cover">

                        <br><br>

                        <input type="submit" value=" Upload document " class="btn btn-primary">

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.title='tài nguyên (upload)'
</script>
@endsection
