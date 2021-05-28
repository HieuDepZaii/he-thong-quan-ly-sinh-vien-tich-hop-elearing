@extends('layouts.app')
@section('content')
    @include('layouts.navigationbar')

    {{-- <form action="{{route('giangvien.saveZoomClass')}}" method="post">
        @csrf
        <label for="link_zoom">link zoom adress: </label>
        <textarea type="text" name="link_zoom" rows="4" cols="50"></textarea>
        <input type="hidden" name="ma_lop" value="{{$lopHoc->id}}">
        <button type="submit">Thêm</button>
    </form> --}}
    <div class="container" style="margin-top: 50px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm Zoom Class</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('giangvien.saveZoomClass') }}">
                            @csrf
                            <div class="form-group row">
                                {{ session('msg') }}
                            </div>
                            <div class="form-group row">
                                <input type="hidden" name="ma_lop" value="{{$lopHoc->id}}">
                            </div>
                            <div class="form-group row">
                                <label for="link_zoom" class="col-md-4 col-form-label text-md-right">link zoom
                                    adress:</label>

                                <div class="col-md-6">
                                    <textarea type="text" name="link_zoom" rows="4" cols="50"></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Thêm
                                    </button>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.title = "tạo zoom class";

    </script>
@endsection
