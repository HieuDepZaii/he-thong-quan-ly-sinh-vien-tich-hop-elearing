@extends('layouts.app')
@section('content')
    @include('layouts.navigartionbarMain')
    <form action="{{route('admin.themThongBao')}}" method="post">
        @csrf
        {{session('msg')}}
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <li>nội dung: <textarea style="margin-top:20px" name="content" rows="5" cols="30"></textarea></li>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
    <script>
        document.title='thêm thông báo';
    </script>
@endsection
