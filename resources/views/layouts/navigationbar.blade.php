<div class="topnav">
    <a class="active" href="{{route('trangchu')}}">Trang chủ</a>
    <a href="#news">Giáo trình</a>
    <a href="#contact">Thông báo</a>
    <a href="{{ route('documents.index', ['malop' => $lopHoc->id]) }}">Tài nguyên</a>
    <a href="">Bài tập</a>
    @if (Auth::user()->level == 2)
        <a href="{{route('giangvien.xemDSHocVien',[$lopHoc->id])}}">Danh sách học viên</a>
    @endif
    <a href="{{route('user.viewOnlineClass',['malop'=>$lopHoc->id])}}">online class</a>
    <a href="">Lessons</a>
    <a href="">Trợ giúp</a>
    <a href="" style="text-decoration: none">Lớp: {{$lopHoc->ten_lop}}</a>

</div>
