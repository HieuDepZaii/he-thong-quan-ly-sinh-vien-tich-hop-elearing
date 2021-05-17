<?php

namespace App\Http\Controllers;


use App\Models\GiangVien;
use App\Models\SubjectClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function showLopHoc()
    {
        $lophoc = DB::table('lop_hoc')
            ->join('users','lop_hoc.magv','=','users.id')
            ->select('lop_hoc.*','users.name')->get();
        error_log($lophoc);
        return view('admin.showLopHoc', ['lophoc' => $lophoc]);
    }

    public function createLopHoc()
    {
        $giangvien=GiangVien::all();
        return view('admin.themLopHoc',['giangvien'=>$giangvien]);
    }

    public function saveLopHoc()
    {
        try {
            $lophoc = new SubjectClass();
            $lophoc->ten_lop = \request('ten_lop');
            $lophoc->magv=\request('magv');
//            $time1=strtotime(\request('ngay_bat_dau'));
//            $ngay_bat_dau=date('Y-m-d',$time1);
//            $time2=strtotime(\request('ngay_ket_thuc'));
//            $ngay_ket_thuc=date('Y-m-d',$time2);
            $time1=explode("/",\request('ngay_bat_dau'));
            $ngay_bat_dau=$time1[2].'-'.$time1[1].'-'.$time1[0];
            $lophoc->ngay_bat_dau=$ngay_bat_dau;
            $time2=explode("/",\request('ngay_ket_thuc'));
            $ngay_ket_thuc=$time2[2].'-'.$time2[1].'-'.$time2[0];
            $lophoc->ngay_ket_thuc=$ngay_ket_thuc;
            $lophoc->save();
            $msg = "thêm thành công";
        } catch (\Exception $e) {
            $msg = "có lỗi xảy ra vui lòng thử lại";
        }
        return redirect('admin/them-lop-hoc')->with('msg', $msg);
    }

    public function suaLopHoc($id)
    {
        $lophoc = SubjectClass::where('id', $id)->first();
        $giangvien=GiangVien::all();
        return view('admin.suaLopHoc', ['lophoc' => $lophoc,'giangvien'=>$giangvien]);
    }

    public function editLopHoc($id)
    {
        try {
            $lophoc = SubjectClass::where('id', $id)->first();
            $lophoc->ten_lop = \request('ten_lop');
            $lophoc->magv=\request('magv');
            $time1=explode("/",\request('ngay_bat_dau'));
            $ngay_bat_dau=$time1[2].'-'.$time1[1].'-'.$time1[0];
            $lophoc->ngay_bat_dau=$ngay_bat_dau;
            $time2=explode("/",\request('ngay_ket_thuc'));
            $ngay_ket_thuc=$time2[2].'-'.$time2[1].'-'.$time2[0];
            $lophoc->ngay_ket_thuc=$ngay_ket_thuc;
            $lophoc->save();
            $msg_edit = "chỉnh sửa thành công";
        } catch (\Exception $e) {
            $msg_edit = "chỉnh sửa thất bại";
        }
        return redirect('admin/sua-lop-hoc/' . $id)->with('msg_edit', $msg_edit);
    }

    public function xoaLopHoc($id)
    {
        try {
            $lophoc = SubjectClass::findOrFail($id);
            $lophoc->delete();
            $msg_delete = "đã xóa 1 item";
        } catch (\Exception $e) {
            $msg_delete = "có lỗi vui lòng thử lại";
        }
        return redirect('/admin/show-lop-hoc')->with('msg_delete', $msg_delete);
    }
}
