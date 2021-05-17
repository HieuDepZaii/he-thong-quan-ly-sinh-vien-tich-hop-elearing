@extends('layouts.app')
@section('content')
@include('layouts.navigartionbarMain')
{{-- <br>
<br>
    danh sách lớp học
    @foreach ($dsLopHoc as $item)
        <ul>
            <li><a href="{{route('user.chiTietLopHoc',['malop'=>$item->id])}}">{{$item->ten_lop}}</a> </li>
        </ul>

    @endforeach --}}
    <div class="container" style="margin-top: 50px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Danh sách lớp học</div>

                    <div class="card-body">

                        @foreach ($dsLopHoc as $lopHoc)
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-left">
                                    {{-- <a href="{{ route('user.chiTietLopHoc', [$lopHoc->malop]) }}">{{ $lopHoc->ten_lop }}</a> --}}
                                    <a href="{{route('hocvien.diemdanh',['malop'=>$lopHoc->id])}}">{{ $lopHoc->ten_lop }}</a>
                                </label>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.title='danh sách lớp học';
    </script>
@endsection
