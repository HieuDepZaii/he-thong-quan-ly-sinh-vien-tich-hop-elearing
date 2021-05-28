<div class="topnav">
    <a class="active" href="{{ route('trangchu') }}"><i class="fas fa-home"></i> Trang chủ</a>

    <a href="#contact"><i class="fas fa-book"></i> Hướng dẫn sử dụng</a>
    @guest
        @if (Route::has('login'))

        @endif
    @else
        <a href="{{ route('user.xemThongTin', ['id' => Auth::user()->id]) }}"><i class="fas fa-user"></i> Trang cá
            nhân</a>
        @if (Auth::user()->level == 2)
            <a href="{{ route('giangvien.dsLopHoc', ['magv' => Auth::user()->id]) }}">Danh sách lớp học</a>
        @elseif(Auth::user()->level==1)
            <a href="{{ route('hocvien.xemDsLopHoc', ['masv' => Auth::user()->id]) }}">Danh sách lớp học</a>
        @else
            @if (Auth::user()->level == 3)
                <a href="{{route('admin.xemDSMonHoc')}}">Quản lý môn học</a>
            @endif
        @endif
        <a href="http://127.0.0.1:3000/home/{{Auth::user()->id}}" target="_blank">Chat</a>
        <a href="{{route('admin.xemDSThongBao')}}">Quản lý thông báo</a>
    @endguest

    <div>
        <select name="" id="">
            <option value="">vietnamese</option>
            <option value="">english</option>
        </select>
    </div>
</div>
