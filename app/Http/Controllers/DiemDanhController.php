<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;
use App\Models\SinhVien;
use App\Models\SubjectClass;
use Illuminate\Http\Request;

class DiemDanhController extends Controller
{
    public function kTraDiemDanh($masv, $dssv)
    {

//    print_r($dssv);
        foreach ($dssv as $item) {
            $sinhvien = explode("-", $item);
            if ($masv == $sinhvien[1]) {
                $kiemtra = 0;
                break;
            } else {
                $kiemtra = 1;
            }
        }
        return $kiemtra;
    }

    public function ghiThongTinDiemDanh($malop)
    {
        $file = "Cap/diemdanhsv.txt";
        $handle = fopen($file, 'r');
//        fclose($handle);
        $masv = fread($handle, filesize($file));
        $sinhvien = SinhVien::where('id', (int)$masv)->first();
        $lophoc = SubjectClass::where('id', (int)$malop)->first();
        $fileName = 'dsdiemdanh/' . $lophoc->ten_lop . ' ' . date("d-m-Y") . '.txt';
        $file = fopen($fileName, 'a');
//        if ($this->kTraDiemDanh($masv, $fileName) == 1) {
        fwrite($file,(string)$sinhvien->id . '-' . (string)$sinhvien->name . '-' .(string)$lophoc->ten_lop.'-'. date("d/m/Y-h:i:sa") . "\n");
        fclose($file);
        fclose($handle);
//        }
        return view('thongTinDiemDanh', ['sinhvien' => $sinhvien]);

    }

    public function createFormDiemDanh($malop)
    {
        $lophoc=LopHoc::where('id',$malop)->first();
        return view('diemdanh2',['lophoc' => $lophoc]);
    }

    public function xemKQDiemDanh($malop)
    {
        $lophoc = SubjectClass::where('id', (int)$malop)->first();
        $fileName = 'dsdiemdanh/' . $lophoc->ten_lop . ' ' . date("d-m-Y") . '.txt';
        $dssv = [];
        $mssv=[];
        $handle = fopen($fileName, 'r');
        $content = fread($handle, filesize($fileName));
        fclose($handle);
        $dssv = explode("\n", $content);
        $dssv_diem_danh=[];
        // $n=(int)count($dssv);
        // print_r($dssv);
        foreach($dssv as $item){
            $sinhvien=explode("-",$item);
            if(!in_array($sinhvien[0],$mssv)){
                array_push($mssv,$sinhvien[0]);
                array_push($dssv_diem_danh,$item);
            }
        }
        // print_r($dssv_diem_danh);
        // echo $dssv[0];
        // $sinhvien=explode("-",$dssv[3]);
        // echo $sinhvien[1];
            return view('ketQuaDiemDanh',['dssv'=>$dssv_diem_danh]);

    }

}
