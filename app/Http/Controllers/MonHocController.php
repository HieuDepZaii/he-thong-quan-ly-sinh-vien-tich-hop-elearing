<?php

namespace App\Http\Controllers;

use App\Models\MonHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonHocController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $monhoc = MonHoc::all();
        return view('monhoc.index', ['monhoc' => $monhoc]);
    }
    public function createMonHocView()
    {
        return view('monhoc.create');
    }
    public function themMonHoc(Request $request)
    {
        try {
            if ($this->kiemtraMaMH($request->mamh)) {
                $monhoc = new MonHoc();
                $monhoc->mamh = $request->mamh;
                $monhoc->tenmh = $request->tenmh;
                $monhoc->mota = $request->mota;
                $monhoc->save();
                $msg = "thêm môn học thành công";
            } else {
                $msg = "mã môn học bị trùng";
            }
        } catch (\Exception $e) {
            $msg = "something error";
        }
        return redirect(route('admin.formThemMonHoc'))->with('msg', $msg);
    }
    public function kiemtraMaMH($mamh)
    {
        $monhoc = DB::select('select * from mon_hoc where mamh = ?', [$mamh]);
        if ($monhoc) {
            return false;
        } else {
            return true;
        }
    }
    public function updateMonHocView($mamh)
    {
        $monhoc = MonHoc::find($mamh);
        return view('monhoc.update', ['monhoc' => $monhoc]);
    }
    public function update(Request $request)
    {
        try {
            $id = $request->id;
            $monhoc = MonHoc::find($id);
            $monhoc->mamh = $request->mamh;
            $monhoc->tenmh = $request->tenmh;
            $monhoc->mota = $request->mota;
            $monhoc->save();
            $msg = 'update thành công';
        } catch (\Exception $e) {
            $msg='có lỗi, vui lòng thử lại';
        }
        return redirect(route('admin.formupdateMonHoc', ['mamh' => $id]))->with('msg', $msg);
    }
    public function delete($id)
    {
        $monhoc = MonHoc::findOrFail($id);
        $monhoc->delete();
        $msg = "đã xóa 1 môn";
        return redirect(route('admin.xemDSMonHoc'))->with('msg', $msg);
    }
}
