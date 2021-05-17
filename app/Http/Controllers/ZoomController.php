<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;
use App\Models\ZoomRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZoomController extends Controller
{
    //
    public function indexOnlineClass($malop){
        $lopHoc=LopHoc::find($malop);
        $zoomClass =DB::table('zoom_rooms')->where('ma_lop',$malop)->first();
        return view('onlineClass',['lopHoc'=>$lopHoc,'zoomClass'=>$zoomClass]);
    }
    public function createZoomCLassForm($malop){
        $lopHoc=LopHoc::find($malop);
        return view('giang-vien.formCreateZoom',['lopHoc'=>$lopHoc]);
    }
    public function createZoomClass(Request $request){
        $zoomClass=new ZoomRoom();
        $zoomClass->ma_lop=$request->ma_lop;
        $zoomClass->link_zoom=$request->link_zoom;
        $zoomClass->save();
        $msg ="thêm thành công";
        return redirect(route('giangvien.taoZoomClass',['malop'=>$request->ma_lop]))->with('msg',$msg);
    }
    public function editZoomClass(Request $request){
        $zoomClass=ZoomRoom::where('ma_lop',$request->ma_lop)->first();
        $zoomClass->ma_lop=$request->ma_lop;
        $zoomClass->link_zoom=$request->link_zoom;
        $zoomClass->save();
        $msg ="sửa thành công";
        return redirect(route('giangvien.editZoomClassForm',['malop'=>$request->ma_lop]))->with('msg',$msg);
    }
    public function editZoomClassForm($malop){
        $lopHoc=LopHoc::find($malop);
        $zoomClass=DB::table('zoom_rooms')->where('ma_lop',$malop)->first();
        return view('giang-vien.formEditZoom',['lopHoc'=>$lopHoc,'zoomClass'=>$zoomClass]);
    }
    public function deleteZoomClass($id){
        $zoomClass=ZoomRoom::findOrFail($id);
        $malop=$zoomClass->ma_lop;
        $zoomClass->delete();
        return redirect(route('user.viewOnlineClass',['malop'=>$malop]));
    }
}
