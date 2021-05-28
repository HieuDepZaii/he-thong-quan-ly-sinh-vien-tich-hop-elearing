@extends('layouts.app')
@section('content')
    @include('layouts.navigationbar')

 
    <div class="container" style="margin-top: 50px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sửa Zoom Class</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('giangvien.editZoomClass')}}">
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
                                    <textarea type="text" name="link_zoom" rows="4" cols="50">{{$zoomClass->link_zoom}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Sửa
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
        document.title="sửa zoom class";
    </script>
@endsection
