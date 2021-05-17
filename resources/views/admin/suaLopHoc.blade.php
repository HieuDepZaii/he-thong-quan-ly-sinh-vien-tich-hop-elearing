<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>sửa lớp học</title>
</head>
<body>
{{session('msg_edit')}}

<form action="{{route('admin.editLopHoc',['id'=>$lophoc->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <ul>
        <li><label for="ten_lop">tên lớp:</label>
            <input type="text" name="ten_lop" value="{{$lophoc->ten_lop}}" ></li>
        <li>
            <label for="magv">chọn giảng viên:</label>
            <select name="magv" >
                @foreach($giangvien as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </li>
        <li>ngày bắt đầu: <input type="text" name="ngay_bat_dau" value="<?php
                $ngay_bat_dau=strtotime($lophoc->ngay_bat_dau);
                //in ngày tháng năm theo định dạng muốn truyền
                echo date('d/m/Y',$ngay_bat_dau);
            ?>"
        </li>
        <li>ngày kết thúc: <input type="text" name="ngay_ket_thuc" value="<?php
            $ngay_ket_thuc=strtotime($lophoc->ngay_ket_thuc);
                //in ngày tháng năm theo định dạng muốn truyền
                echo date('d/m/Y',$ngay_ket_thuc);
        ?>" </li>
    </ul>
    <button type="submit">sửa</button>
</form>
<button><a href="{{route('admin.home')}}">HOME</a></button>
<button><a href="{{route('admin.showLopHoc')}}">DS lớp học</a></button>
</body>
</html>
