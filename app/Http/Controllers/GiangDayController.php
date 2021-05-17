<?php

namespace App\Http\Controllers;

use App\Models\GiangDay;
use App\Models\SubjectClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GiangDayController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function showGiangDay(){
        $giangday=DB::table('diem_danh')
        ->join('sinh_vien','diem_danh.masv','=','sinh_vien.id')
        ->join('lop_hoc','diem_danh.ma_lop','=','lop_hoc.id')
        ->select('diem_danh.*','sinh_vien.name','lop_hoc.ten_lop')
        ->get();
        error_log($giangday);
        $lophoc=SubjectClass::all();
        return view('admin.showGiangDay',['giangday'=>$giangday,'lophoc'=>$lophoc]);
    }
    public function saveGiangDay(){
        try{
            $giangday=new GiangDay();
            $giangday->masv=\request('masv');
            $giangday->ma_lop=\request('ma_lop');
            $giangday->save();
            $msg_error='';
        }catch (\Exception $e){
            $msg_error="có lỗi xảy ra, vui lòng thử lại";
        }

        return redirect('admin/show-giang-day')->with('msg_error',$msg_error);
    }
    public function xoaGiangDay($id){
        try {
            $giangday = GiangDay::findOrFail($id);
            $giangday->delete();
            $msg_delete = "đã xóa 1 item";
        } catch (\Exception $e) {
            $msg_delete = "có lỗi vui lòng thử lại";
        }
        return redirect('/admin/show-giang-day')->with('msg_delete', $msg_delete);
    }
}
