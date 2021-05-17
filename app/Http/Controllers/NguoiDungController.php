<?php

namespace App\Http\Controllers;

use App\Models\GiangDay;
use App\Models\GiangVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NguoiDungController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function xemThongTinNguoiDung($id)
    {
        $nguoidung = GiangVien::where('id', $id)->first();
        return view('user.thongTinNguoiDung', ['nguoidung' => $nguoidung]);
    }

    public function createFormSuaThongTin($id)
    {
        $nguoidung = GiangVien::where('id', $id)->first();
        return view('user.suaThongTin', ['nguoidung' => $nguoidung]);
    }

    public function suaThongTinCaNhan(Request $request, $id)
    {
        try {
            $nguoidung = GiangVien::where('id', $id)->first();
            $nguoidung->name = \request('name');
            $nguoidung->email = \request('email');
            $time1 = explode("/", \request('ngay_sinh'));
            $ngaysinh = $time1[2] . '-' . $time1[1] . '-' . $time1[0];
            $nguoidung->ngay_sinh = $ngaysinh;
            $get_image = $request->file('anh');
            if ($get_image) {
                $new_image = \request('name') . '-' . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move('upload/giangVien', $new_image);
                $nguoidung->anh = "upload/giangVien/$new_image";
            } else {
                if (!$nguoidung->anh) {
                    $nguoidung->anh = 'img/user-alt-512.png';
                }
            }
            if (\request('password')) {

                $nguoidung->password = Hash::make(\request('password'));
            }
//            luu ket qua
            $nguoidung->save();
            $msg_edit = "chỉnh sửa thành công";
        } catch (\Exception $e) {
            $msg_edit = "chỉnh sửa thất bại";
        }
        return redirect('user/sua-thong-tin/' . $id)->with('msg_edit', $msg_edit);
    }

    public function xemDSLopHoc($id)
    {
        $lophoc=DB::table('lop_hoc')->where('magv',$id)->get();
        return view('giang-vien.xemDSLop',['lophoc'=>$lophoc]);
    }
    public function xemChiTietlop($malop){
        $dssv=DB::table('diem_danh')->join('sinh_vien','diem_danh.masv','=','sinh_vien.id')
            ->where('ma_lop',$malop)
            ->select('diem_danh.*','sinh_vien.anh','sinh_vien.name')
            ->get();
        return view('giang-vien.chiTietLopHoc',['dssv'=>$dssv]);
    }
    public function formCapNhapDiemCC($malop,$masv){
        $sinhvien=DB::table('diem_danh')->join('sinh_vien','diem_danh.masv','=','sinh_vien.id')
            ->where('ma_lop',$malop)
            ->where('masv',$masv)
            ->select('diem_danh.*','sinh_vien.anh','sinh_vien.name')
            ->first();

        return view('giang-vien.suadiemccSV',['sinhvien'=>$sinhvien]);
    }
    public function capNhapDiemCC($malop,$masv){
        $giangday=GiangDay::where('masv',$masv)
            ->where('ma_lop',$malop)
            ->first();
        $giangday->diemcc=\request('diemcc');
        $giangday->save();
//        $dssv=DB::table('diem_danh')->join('sinh_vien','diem_danh.masv','=','sinh_vien.id')
//            ->where('ma_lop',$malop)
//            ->select('diem_danh.*','sinh_vien.anh','sinh_vien.name')
//            ->get();
        return redirect('user/xem-chi-tiet-lop-hoc/'.$malop);


    }
    public function formChinhSuaDiemCC($masv){
        $sinhvien= GiangDay::where('masv',$masv)->first();
        return view('giang-vien.chinhSuaDiemSV',['sinhvien'=>$sinhvien]);

    }
}
