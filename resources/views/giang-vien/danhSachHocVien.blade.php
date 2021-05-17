@extends('layouts.app')
@section('content')
    @include('layouts.navigationbar')
    danh sách học viên:
    <table class="table">
        <tr>
            {{-- <th>mã học viên</th> --}}
            <th>Tên học viên</th>
        </tr>
        @foreach ($dshv as $item)
        <tr>
            {{-- <td></td> --}}
            <td>{{ $item->name }}</td>
        </tr>

        @endforeach
    </table>

@endsection
