<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;
use App\Models\MonHoc;
use App\Models\SinhVienLopHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LopHocController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ViewDangKiMoLop()
    {
        $mon_hoc = MonHoc::all();
        return view('giang-vien.dangKiMoLop', ['mon_hoc' => $mon_hoc]);
    }

    public function kiemTraTenLop($tenlop)
    {
        $DSTenLop = DB::select('select * from lop_hoc where ten_lop = ?', [$tenlop]);
        if ($DSTenLop) {
            return false;
        } else {
            return true;
        }
    }
    public function danhSachLopHoc($magv)
    {
        $dsLopHoc = DB::table('lop_hoc')
            ->where('magv', '=', $magv)
            ->get();
        return view('giang-vien.danhSachLopHoc', ['dsLopHoc' => $dsLopHoc]);
    }
    public function danhSachLopHocHocVien($masv)
    {
        $dsLopHoc = DB::table('dssv_lop_hoc')
            ->join('lop_hoc', 'lop_hoc.id', '=', 'dssv_lop_hoc.malop')
            ->select('dssv_lop_hoc.*', 'lop_hoc.ten_lop')
            ->where('dssv_lop_hoc.masv', '=', $masv)
            ->get();
        return view('hoc-vien.dsLopHoc', ['dsLopHoc' => $dsLopHoc]);
    }

    public function saveLopHoc(Request $request)
    {
        try {
            $ten_lop = \request('ten_lop');
            $lophoc = new LopHoc();
            if ($this->kiemTraTenLop($ten_lop)) {
                $lophoc->ten_lop = \request('ten_lop');
                $lophoc->magv = \request('magv');
                $lophoc->monhoc_id = \request('monhoc_id');
                $time1 = explode("/", \request('ngay_bat_dau'));
                $ngay_bat_dau = $time1[2] . '-' . $time1[1] . '-' . $time1[0];
                $lophoc->ngay_bat_dau = $ngay_bat_dau;
                $time2 = explode("/", \request('ngay_ket_thuc'));
                $ngay_ket_thuc = $time2[2] . '-' . $time2[1] . '-' . $time2[0];
                $lophoc->ngay_ket_thuc = $ngay_ket_thuc;
                $lophoc->save();
                $msg = "thêm thành công";
            } else {
                $msg = 'tên lớp bị trùng';
            }
        } catch (\Exception $e) {
            $msg = "có lỗi xảy ra vui lòng thử lại";
        }
        return redirect('giangvien/dang-ki-mo-lop')->with('msg', $msg);
    }
    public function viewChiTietLopHoc($malop)
    {
        $lopHoc = DB::table('lop_hoc')
            ->join('mon_hoc', 'lop_hoc.monhoc_id', '=', 'mon_hoc.id')
            ->where('lop_hoc.id', '=', $malop)
            ->select('lop_hoc.*', 'mon_hoc.mamh', 'mon_hoc.tenmh', 'mon_hoc.mota')
            ->first();

        return view('chiTietLopHoc', ['lopHoc' => $lopHoc]);
    }
    public function viewDangKiLopHoc()
    {
        $dsLopHoc = LopHoc::all();
        return view('hoc-vien.dangKiLopHoc', ['dsLopHoc' => $dsLopHoc]);
    }
    public function dangKiLopHoc(Request $request)
    {

            $masv = $request->masv;
            $malop = $request->malop;
            if ($this->kiemTraDKLopHoc($masv, $malop)) {
                $hocVienDaDK = new SinhVienLopHoc();
                $hocVienDaDK->masv = $request->masv;
                $hocVienDaDK->malop = $request->malop;
                $hocVienDaDK->save();
                $msg = "đăng kí lớp thành công";
            } else {
                $msg = "Bạn đã đăng kí lớp này rồi";
            }

        return redirect(route('hocvien.viewDangKiLopHoc'))->with('msg', $msg);
    }
    public function kiemTraDKLopHoc($masv, $malop)
    {
        // $result=DB::table('dssv_lop_hoc')
        // ->where('masv','=',$masv)
        // ->where('malop','=',$malop)
        // ->get();
        // lưu ý: không dùng được BD:table vì nó trả về kiểu dữ liệu k phải mảng nên k thể xét đc result rỗng hay k
        $result = DB::select('select * from dssv_lop_hoc where masv = ? and malop = ?', [$masv, $malop]);
        print_r($result);
        if ($result) {
            return 0;
        } else {
            return 1;
        }
    }
    public function dshvLopHoc($malop)
    {
        $lopHoc = DB::table('lop_hoc')
            ->where('id', $malop)
            ->first();
        $dshv = DB::table('dssv_lop_hoc')
            ->join('users', 'users.id', '=', 'dssv_lop_hoc.masv')
            ->select('dssv_lop_hoc.*', 'users.name')
            ->where('malop', $malop)
            ->get();
        return view('giang-vien.danhSachHocVien', ['dshv' => $dshv, 'lopHoc' => $lopHoc]);
    }
}
