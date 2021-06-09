@extends('layouts.app')
@section('content')
    @include('layouts.navigationbar')
    <h3>Tên lớp: {{ $lopHoc->ten_lop }}</h3>
    <ul>
        <li>Mã môn học: {{ $lopHoc->mamh }}</li>
        <li>Tên môn học: {{ $lopHoc->tenmh }}</li>
        <li>Mô tả: {{ $lopHoc->mota }}</li>
    </ul>
    @php
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $url = 'https://';
    } else {
        $url = 'http://';
    }
    // Append the host(domain name, ip) to the URL.
    $url .= $_SERVER['HTTP_HOST'];

    // Append the requested resource location to the URL
    $url .= $_SERVER['REQUEST_URI'];
    $malop = $lopHoc->id;
    // echo Auth::user()->id;

    function getUserID($url)
    {
        $strArray = explode('/', $url);
        $userID = $strArray[6];
        return $userID;
    }

    function checkUserID($userID, $malop)
    {
        if (Auth::user()->id == (int) $userID) {
            echo "<script>
                        var d = new Date();
                        var h = d.getHours();
                        var m = d.getMinutes();
                        setTimeout(() => {
                            alert('".Auth::user()->name." đã vào lớp lúc ' + h + ':' + m);

                            }, 2000);
                        </script>";
        } else {
            echo "<script>
                            alert('không khớp mã user');
                            alert('bạn sẽ được chuyển hướng về lại trang điểm danh')
                            window.location.replace('http://127.0.0.1:8000/diemdanh/".$malop."');
                        </script>";

        }
    }
    $userID = getUserID($url);
    // echo $userID;
    checkUserID($userID, $malop);
    @endphp
    <script>
        document.title = "chi tiết lớp học";
    </script>
@endsection
