@extends('layouts.app')
@section('content')

    {{session('msg_edit')}}
    {{session('msg_delete')}}
    <br>
    <button><a href="{{route('admin.createSinhVien')}}">thêm sinh vien</a></button>
    <button><a href="{{route('admin.home')}}">Admin Home</a></button>
    @foreach($sinhvien as $item)
        <fieldset>
            <ul>
                <li>Ảnh đại diện:
                    <br>
                    <img style="max-width: 150px" class="anh-dai-dien" src="{{asset($item->anh)}}" alt="id {{$item->id}}">
                </li>
                <li>mã sinh viên: {{$item->id}}</li>
                <li>tên sinh viên: {{$item->name}}</li>
                <li>ngày sinh:
                    @php
                        $ngaysinh=strtotime($item->ngay_sinh);
                        //in ngày tháng năm theo định dạng muốn truyền
                        echo date('d/m/Y',$ngaysinh);
                    @endphp
                </li>
                <li>
                    giới tính:
                    @php
                        if($item->gioi_tinh){
                            echo "Nam";
                        }else{
                            echo "Nũ";
                        }
                    @endphp
                </li>
                <br>
                <button><a href="{{route('admin.suaSinhVien',['id'=>$item->id])}}">sửa</a></button>
                <form action="{{route('admin.xoaSinhVien',['id'=>$item->id])}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">xóa</button>
                </form>
            </ul>
        </fieldset>
    @endforeach

@endsection
