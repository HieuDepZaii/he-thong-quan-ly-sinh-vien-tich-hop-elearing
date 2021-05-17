@extends('layouts.app')
@section('content')
    @include('layouts.navigationbar')
    {{session('msg')}}
    <form action="{{route('giangvien.saveZoomClass')}}" method="post">
        @csrf
        <label for="link_zoom">link zoom adress: </label>
        <textarea type="text" name="link_zoom" rows="4" cols="50"></textarea>
        <input type="hidden" name="ma_lop" value="{{$lopHoc->id}}">
        <button type="submit">Thêm</button>
    </form>
    <script>
        document.title="tạo zoom class";
    </script>
@endsection
