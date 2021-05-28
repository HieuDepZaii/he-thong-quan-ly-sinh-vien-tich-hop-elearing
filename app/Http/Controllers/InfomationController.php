<?php

namespace App\Http\Controllers;

use App\Models\ThongBao;
use Illuminate\Http\Request;

class InfomationController extends Controller
{
    public function index(){
        $infomation=ThongBao::all();
        return view('thong-bao.index',['information'=>$infomation]);
    }
    public function createView(){
        return view('thong-bao.themThongBao');
    }
    public function create(Request $request){
        $infomation =new ThongBao();
        $infomation->content=$request->content;
        $infomation->user_id=$request->user_id;
        $infomation->save();
        $msg="thêm thành công";
        return redirect(route('admin.viewAddThongBao'))->with('msg', $msg);
    }
    public function delete($id){
        $infomations=
        $infomation=ThongBao::findOrFail($id);
        $infomation->delete();
        return redirect(route('admin.xemDSThongBao'));
    }
}
