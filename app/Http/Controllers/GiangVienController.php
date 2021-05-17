<?php

namespace App\Http\Controllers;

use App\Models\GiangVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GiangVienController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function showGiangVien()
    {
        $giangvien = GiangVien::all();
        return view('admin.showGiangVien', ['giangvien' => $giangvien]);
    }

    public function createGiangVien()
    {
        return view('admin.themGiangVien');
    }

    public function saveGiangVien(Request $request)
    {
        try {
            $giangVien = new GiangVien;
            $giangVien->name = \request('name');
            $giangVien->email = \request('email');
            $date = \request('ngay');
            $month = \request('thang');
            $year = \request('nam');
            $ngaysinh = $year . '-' . $month . '-' . $date;
            $giangVien->ngay_sinh = $ngaysinh;
            $giangVien->password=Hash::make(\request('password'));
            //upload anh dai dien
            $get_image=$request->file('anh');
            if($get_image){
                $new_image=\request('name').'-'.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('upload/giangVien',$new_image);
                $giangVien->anh="upload/giangVien/$new_image";
            }
            $giangVien->save();
            $msg = "thêm thành công";
        } catch (\Exception $e) {
            $msg = "có lỗi xảy ra vui lòng thử lại";
        }
        return redirect('admin/them-giang-vien')->with('msg', $msg);
    }

    public function suaGiangVien($id)
    {
        $giangvien = GiangVien::where('id', $id)->first();

        return view('admin.suaGiangVien', ['giangvien' => $giangvien]);
    }

    public function editGiangVien(Request $request,$id)
    {
        try {
            $giangVien = GiangVien::where('id', $id)->first();
            $giangVien->name = \request('name');
            $giangVien->email = \request('email');
            $date = \request('ngay');
            $month = \request('thang');
            $year = \request('nam');
            $ngaysinh = $year . '-' . $month . '-' . $date;
            $giangVien->ngay_sinh = $ngaysinh;
            $giangVien->password=Hash::make(\request('password'));
            $get_image=$request->file('anh');
            if($get_image){
                $new_image=\request('name').'-'.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('upload/giangVien',$new_image);
                $giangVien->anh="upload/giangVien/$new_image";
            }else{
                if(!$giangVien->anh){
                    $giangVien->anh='';
                }
            }
//            luu ket qua
            $giangVien->save();
            $msg_edit = "chỉnh sửa thành công";
        } catch (\Exception $e) {
            $msg_edit = "chỉnh sửa thất bại";
        }
        return redirect('admin/sua-giang-vien/' . $id)->with('msg_edit', $msg_edit);
    }

    public function xoaGiangVien($id)
    {
        try {
            $giangvien = GiangVien::findOrFail($id);
            $giangvien->delete();
            $msg_delete = "đã xóa 1 item";
        } catch (\Exception $e) {
            $msg_delete = "có lỗi vui lòng thử lại";
        }
        return redirect('/admin/show-giang-vien')->with('msg_delete', $msg_delete);
    }
}
