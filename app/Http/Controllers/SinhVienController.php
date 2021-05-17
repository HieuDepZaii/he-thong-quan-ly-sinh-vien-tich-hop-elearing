<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
use Illuminate\Http\Request;

class SinhVienController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function showSinhVien()
    {
        $sinhvien = SinhVien::all();
        return view('admin.showSinhVien', ['sinhvien' => $sinhvien]);
    }

    public function createSinhVien()
    {
        return view('admin.themSinhVien');
    }

    public function saveSinhVien(Request $request)
    {
        try {
            $sinhVien = new SinhVien();
            $sinhVien->name = \request('name');
            $date = \request('ngay');
            $month = \request('thang');
            $year = \request('nam');
            $ngaysinh = $year . '-' . $month . '-' . $date;
            $sinhVien->ngay_sinh = $ngaysinh;
            $sinhVien->gioi_tinh=\request('gioi_tinh');
            //upload anh dai dien
            $get_image=$request->file('anh');
            if($get_image){
                $new_image=\request('name').'-'.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('upload/sinhVien',$new_image);
                $sinhVien->anh="upload/sinhVien/$new_image";
            }
            $sinhVien->save();
            $msg = "thêm thành công";
        } catch (\Exception $e) {
            $msg = "có lỗi xảy ra vui lòng thử lại";
        }
        return redirect('admin/them-sinh-vien')->with('msg', $msg);
    }

    public function suaSinhVien($id)
    {
        $sinhvien = SinhVien::where('id', $id)->first();

        return view('admin.suaSinhVien', ['sinhvien' => $sinhvien]);
    }

    public function editSinhVien(Request $request,$id)
    {
        try {
            $sinhVien = SinhVien::where('id', $id)->first();
            $sinhVien->name = \request('name');
            $date = \request('ngay');
            $month = \request('thang');
            $year = \request('nam');
            $ngaysinh = $year . '-' . $month . '-' . $date;
            $sinhVien->ngay_sinh = $ngaysinh;
            $sinhVien->gioi_tinh=\request('gioi_tinh');
            $get_image=$request->file('anh');
            if($get_image){
                $new_image=\request('name').'-'.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('upload/sinhVien',$new_image);
                $sinhVien->anh="upload/sinhVien/$new_image";
            }else{
                if(!$sinhVien->anh){
                    $sinhVien->anh='';
                }
            }
//            luu ket qua
            $sinhVien->save();
            $msg_edit = "chỉnh sửa thành công";
        } catch (\Exception $e) {
            $msg_edit = "chỉnh sửa thất bại";
        }
        return redirect('admin/sua-sinh-vien/' . $id)->with('msg_edit', $msg_edit);
    }

    public function xoaSinhVien($id)
    {
        // try {
            $sinhvien = SinhVien::findOrFail($id);
            $sinhvien->delete();
            $msg_delete = "đã xóa 1 item";
        // } catch (\Exception $e) {
        //     $msg_delete = "có lỗi vui lòng thử lại";
        // }
        return redirect('/admin/show-sinh-vien')->with('msg_delete', $msg_delete);
    }
}
