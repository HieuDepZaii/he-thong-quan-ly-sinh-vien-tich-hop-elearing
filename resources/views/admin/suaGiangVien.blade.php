<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>sửa giảng viên</title>
    <style>
        .anh-dai-dien{
            max-height: 200px;
            max-width: 200px;
        }
    </style>
</head>
<body>
{{session('msg_edit')}}
<form action="/admin/edit-giang-vien/{{$giangvien->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <img class="anh-dai-dien" src="{{asset($giangvien->anh)}}" alt="id {{$giangvien->id}}">
    <br>
    <label for="anh">Ảnh đại diện</label>
    <input type="file" name="anh">
    <br>
    <label for="name">tên giảng viên:</label>
    <input type="text" name="name" required value="{{$giangvien->name}}">
    <br>
    <label for="email">email:</label>
    <input type="email" name="email" value="{{$giangvien->email}}" required>
    <br>
    <label for="ngay_sinh">ngày sinh:</label>

    <select name="ngay" id="ngay">
        <?php
        for ($i = 1; $i <= 31; $i++) {
        ?>
        <option value="{{$i}}">{{$i}}</option>
        <?php
        }
        ?>
    </select>

    <select name="thang" id="thang">
        <?php
        for ($i = 1; $i <= 12; $i++) {
        ?>
        <option value="{{$i}}">{{$i}}</option>
        <?php
        }
        ?>
    </select>
    <select name="nam" id="nam">
        <?php
        for ($i = 1990; $i <= (int)date("Y"); $i++) {
        ?>
        <option value="{{$i}}">{{$i}}</option>
        <?php
        }
        ?>
    </select>
    <br>
    <label for="password">mật khẩu: <input type="password" name="password" ></label>
    <br>
    <button type="submit">Sửa</button>
</form>
<button><a href="{{route('admin.home')}}">HOME</a></button>
<button><a href="{{route('admin.showGiangVien')}}">DS giảng viên</a></button>
</body>
</html>
