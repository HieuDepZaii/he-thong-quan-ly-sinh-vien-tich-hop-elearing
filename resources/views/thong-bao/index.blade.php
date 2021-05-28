
@extends('layouts.app')
@section('content')
    @include('layouts.navigartionbarMain')
    <ul >
        @foreach ($information as $item)
        <li  >
            {{$item->content}}
            <form action="{{route('admin.xoaThongBao',['id'=>$item->id])}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">xóa</button>
            </form>
        </li>
    @endforeach
    </ul>
    <a href="{{route('admin.viewAddThongBao')}}" role="button" class="btn btn-primary" style="margin-left:40px ">Thêm thông báo</a>
    <script>
        document.title="quản lý thông báo";
    </script>
@endsection
