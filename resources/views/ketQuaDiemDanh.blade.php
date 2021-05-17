{{-- @foreach ($dssv as $item)
    <tr>
        <td>mã sinh viên</td>
        <td>tên sinh viên</td>
        <td>giờ vào lớp</td>
    </tr>
    {{$item}}<br>
    @endforeach --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <span>{{$userid}}</span><h1 id="demo" style="font-family: Verdana, Geneva, Tahoma, sans-serif"> đã vào lớp lúc</h1>

    <script>

        function showResulft() {
                var d=new Date();
                var h=d.getHours();
                var m=d.getMinutes();
                document.getElementById("demo").innerHTML = "đã vào lớp lúc "+h+":"+m;
        }
        showResulft()
    </script>
</body>

</html>
