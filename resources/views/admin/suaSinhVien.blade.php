<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>sửa sinh viên</title>
    <style>
        .anh-dai-dien {
            max-height: 200px;
            max-width: 200px;
        }
    </style>
    <script>
        {{--        function get_gioi_tinh() {--}}
        {{--            document.getElementById('listbox_gioi_tinh').selectedIndex ="1";--}}
        {{--<!--            --><?php--}}
        {{--//            if ($sinhvien->gioi_tinh) {--}}
        {{--//                echo "0";--}}
        {{--//            } else {--}}
        {{--//                echo "1";--}}
        {{--//            }--}}
        {{--//            ?>//;--}}
        {{--        }--}}
        function myFunction() {
            document.getElementById("mySelect").selectedIndex = "2";
        }

        myFunction();
    </script>
</head>
<body>
{{session('msg_edit')}}
<form action="/admin/edit-sinh-vien/{{$sinhvien->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <img class="anh-dai-dien" src="{{asset($sinhvien->anh)}}" alt="id {{$sinhvien->id}}">
    <br>
    <label for="anh">Ảnh đại diện</label>
    <input type="file" name="anh">
    <br>
    <label for="name">tên sinh viên:</label>
    <input type="text" name="name" required value="{{$sinhvien->name}}">
    <br>
    <label for="gioi_tinh">Giới tính: </label>
    <select name="gioi_tinh" id="listbox_gioi_tinh">
        <option value="1">Nam</option>
        <option value="0">Nữ</option>
    </select>
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
    <button type="submit">Sửa</button>
</form>
<button><a href="{{route('admin.home')}}">HOME</a></button>
<button><a href="{{route('admin.showSinhVien')}}">DS sinh viên</a></button>

<script>
    {{--        function get_gioi_tinh() {--}}
    {{--            document.getElementById('listbox_gioi_tinh').selectedIndex ="1";--}}
    {{--<!--            --><?php--}}
    {{--//            if ($sinhvien->gioi_tinh) {--}}
    {{--//                echo "0";--}}
    {{--//            } else {--}}
    {{--//                echo "1";--}}
    {{--//            }--}}
    {{--//            ?>//;--}}
    {{--        }--}}
    function myFunction() {
        document.getElementById("listbox_gioi_tinh").selectedIndex = <?php
            if($sinhvien->gioi_tinh ==1){
                echo "0";
            }else{
                echo "1";
            }
        ?>;
    }

    {{--function get_day() {--}}
    {{--    document.getElementById("ngay").selectedIndex=<?php--}}
    {{--    $date=date_create($sinhvien->ngay_sinh);--}}
    {{--    echo date_format($date,"d");--}}
    {{--    ?>--}}
    {{--}--}}
    {{--function get_month() {--}}
    {{--    document.getElementById("thang").selectedIndex=<?php--}}
    {{--    $date=date_create($sinhvien->ngay_sinh);--}}
    {{--    echo date_format($date,"m");--}}
    {{--    ?>--}}
    {{--}--}}
    myFunction();
</script>
</body>
</html>
