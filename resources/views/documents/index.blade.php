
@extends('layouts.app')

@section('content')
@include('layouts.navigationbar')
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <h3>Tên lớp: {{$lopHoc->ten_lop}}</h3>
            <h3>Môn: {{$lopHoc->tenmh}}</h3> --}}
            <div class="card">
                <div class="card-header">documents list</div>

                <div class="card-body">

                    <a href="{{ route('documents.create',['malop'=>$lopHoc->id]) }}" class="btn btn-primary">Add new document</a>
                    <br /><br />

                    <table class="table">
                        <tr>
                            <th>Title</th>
                            <th>Download file</th>
                            <th>Upload by</th>
                        </tr>
                        @forelse ($documents as $document)
                            <tr>
                                <td>{{ $document->title }}</td>
                                <td><a href="{{ route('documents.download', $document->uuid) }}">{{ $document->cover }}</a></td>
                                <td style='font-weight:bold;color:dimgray'>{{$document->name}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">No documents found.</td>
                            </tr>
                        @endforelse
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.title='Tài nguyên';
</script>
@endsection
