<?php

use App\Http\Controllers\DiemDanhController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\InfomationController;
use App\Http\Controllers\LopHocController;
use App\Http\Controllers\MonHocController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\ZoomController;
use App\Models\ThongBao;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    $infomation=ThongBao::all();
   return view('trangchu',['infomation' => $infomation]);
})->name('trangchu');
//Admin route
Route::get('/admin/home', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.home')->middleware('admin');
//admin-Giang Vien
Route::get('admin/show-giang-vien', [\App\Http\Controllers\GiangVienController::class, 'showGiangVien'])->name('admin.showGiangVien');
Route::post('admin/save-giang-vien', [\App\Http\Controllers\GiangVienController::class, 'saveGiangVien'])->name('admin.saveGiangVien');
Route::get('admin/them-giang-vien', [\App\Http\Controllers\GiangVienController::class, 'createGiangVien'])->name('admin.createGiangVien');
Route::get('/admin/sua-giang-vien/{id}', [\App\Http\Controllers\GiangVienController::class, 'suaGiangVien'])->name('admin.suaGiangVien');
Route::post('/admin/edit-giang-vien/{id}', [\App\Http\Controllers\GiangVienController::class, 'editGiangVien'])->name('admin.editGiangVien');
Route::delete('/admin/xoa-giang-vien/{id}', [\App\Http\Controllers\GiangVienController::class, 'xoaGiangVien'])->name('admin.xoaGiangVien');
//admin Sinh Vien
Route::get('admin/show-sinh-vien', [\App\Http\Controllers\SinhVienController::class, 'showSinhVien'])->name('admin.showSinhVien');
Route::post('admin/save-sinh-vien', [\App\Http\Controllers\SinhVienController::class, 'saveSinhVien'])->name('admin.saveSinhVien');
Route::get('admin/them-sinh-vien', [\App\Http\Controllers\SinhVienController::class, 'createSinhVien'])->name('admin.createSinhVien');
Route::get('/admin/sua-sinh-vien/{id}', [\App\Http\Controllers\SinhVienController::class, 'suaSinhVien'])->name('admin.suaSinhVien');
Route::post('/admin/edit-sinh-vien/{id}', [\App\Http\Controllers\SinhVienController::class, 'editSinhVien'])->name('admin.editSinhVien');
Route::delete('/admin/xoa-sinh-vien/{id}', [\App\Http\Controllers\SinhVienController::class, 'xoaSinhVien'])->name('admin.xoaSinhVien');
//admin L???p H???c
Route::get('admin/show-lop-hoc', [\App\Http\Controllers\SubjectClassController::class, 'showLopHoc'])->name('admin.showLopHoc');
Route::post('admin/save-lop-hoc', [\App\Http\Controllers\SubjectClassController::class, 'saveLopHoc'])->name('admin.saveLopHoc');
Route::get('admin/them-lop-hoc', [\App\Http\Controllers\SubjectClassController::class, 'createLopHoc'])->name('admin.createLopHoc');
Route::get('/admin/sua-lop-hoc/{id}', [\App\Http\Controllers\SubjectClassController::class, 'suaLopHoc'])->name('admin.suaLopHoc');
Route::post('/admin/edit-lop-hoc/{id}', [\App\Http\Controllers\SubjectClassController::class, 'editLopHoc'])->name('admin.editLopHoc');
Route::delete('/admin/xoa-lop-hoc/{id}', [\App\Http\Controllers\SubjectClassController::class, 'xoaLopHoc'])->name('admin.xoaLopHoc');
//admin gi???ng d???y
Route::get('admin/show-giang-day', [\App\Http\Controllers\GiangDayController::class, 'showGiangDay'])->name('admin.showGiangDay');
Route::post('admin/save-giang-day', [\App\Http\Controllers\GiangDayController::class, 'saveGiangDay'])->name('admin.saveGiangDay');
Route::delete('/admin/xoa-giang-day/{id}', [\App\Http\Controllers\GiangDayController::class, 'xoaGiangDay'])->name('admin.xoaGiangDay');

//user ch???nh s???a th??ng tin c?? nh??n
Route::get('user/sua-thong-tin/{id}', [\App\Http\Controllers\NguoiDungController::class, 'createFormSuaThongTin'])->name('user.InfomationEditForm');
Route::post('user/edit-thong-tin/{id}', [\App\Http\Controllers\NguoiDungController::class, 'suaThongTinCaNhan'])->name('user.editThongTin');
Route::get('users/xem-thong-tin-nguoi-dung/{id}', [NguoiDungController::class,'xemThongTinNguoiDung'])->name('user.xemThongTin');
// Route::get('user/xem-ds-lop/{id}', [\App\Http\Controllers\NguoiDungController::class, 'xemDSLopHoc'])->name('user.xemDsLop');
// Route::get('user/xem-chi-tiet-lop-hoc/{malop}', [\App\Http\Controllers\NguoiDungController::class, 'xemChiTietlop'])->name('user.xemChiTietLop');
// Route::get('user/form-cap-nhap-diem-cc/{malop}/{masv}', [\App\Http\Controllers\NguoiDungController::class, 'formCapNhapDiemCC'])->name('user.formCapNhapDiemCC');
// Route::post('user/cap-nhap-diemcc/{malop}/{masv}',[\App\Http\Controllers\NguoiDungController::class,'capNhapDiemCC'])->name('user.capNhapDiemcc');


//Gi???ng vi??n
Route::get('giangvien/dang-ki-mo-lop', [LopHocController::class,'ViewDangKiMoLop'])->name('giangvien.viewDangKiMoLop')->middleware('giang-vien');
Route::post('giangvien/save-lop-hoc', [LopHocController::class, 'saveLopHoc'])->name('giangvien.saveLopHoc')->middleware('giang-vien');
Route::get('giangvien/xem-ds-lop-hoc/{magv}',[LopHocController::class,'danhSachLopHoc'])->name('giangvien.dsLopHoc')->middleware('giang-vien');
Route::get('giangvien/ds-hoc-vien/{malop}',[LopHocController::class,'dshvLopHoc'])->name('giangvien.xemDSHocVien')->middleware('giang-vien');
Route::get('giangvien/tao-zoom-room/{malop}',[ZoomController::class,'createZoomCLassForm'])->name('giangvien.taoZoomClass')->middleware('giang-vien');
Route::post('giangvien/tao-zoom-room',[ZoomController::class,'createZoomClass'])->name('giangvien.saveZoomClass')->middleware('giang-vien');
Route::get('giangvien/sua-zoom-room/{malop}',[ZoomController::class,'editZoomClassForm'])->name('giangvien.editZoomClassForm')->middleware('giang-vien');
Route::post('giangvien/edit-zoom-room',[ZoomController::class,'editZoomClass'])->name('giangvien.editZoomClass')->middleware('giang-vien');
Route::delete('giangvien/delete-zoom-room/{id}',[ZoomController::class,'deleteZoomClass'] )->name('giangvien.deleteZoomClass')->middleware('giang-vien');
//xem l???p h???c
Route::get('user/chi-tiet-lop-hoc/{malop}/{userid}',[LopHocController::class,'viewChiTietLopHoc'])->name('user.chiTietLopHoc');

//online class
Route::get('user/online-class/{malop}',[ZoomController::class,'indexOnlineClass'])->name('user.viewOnlineClass');


// m??n h???c
Route::get('admin/xem-ds-mon-hoc',[MonHocController::class,'index'])->name('admin.xemDSMonHoc');
Route::get('admin/them-mon-hoc',[MonHocController::class,'createMonHocView'])->name('admin.formThemMonHoc');
Route::post('admin/them-mon-hoc',[MonHocController::class,'themMonHoc'])->name('admin.themMonHoc');
Route::get('admin/update-mon-hoc/{mamh}',[MonHocController::class,'updateMonHocView'])->name('admin.formupdateMonHoc');
Route::post('admin/update-mon-hoc',[MonHocController::class,'update'])->name('admin.updateMonHoc');
Route::delete('admin/delete-mon-hoc/{id}',[MonHocController::class,'delete'])->name('admin.deleteMonHoc');
//H???c vi??n
Route::get('hocvien/dang-ki-lop-hoc',[LopHocController::class,'ViewDangKiLopHoc'])->name('hocvien.viewDangKiLopHoc');
Route::post('hocvien/save-dang-ki-lop-hoc',[LopHocController::class,'dangKiLopHoc'])->name('hocvien.saveDangKiLopHoc');
Route::get('hocvien/ds-lop-hoc/{masv}',[LopHocController::class,'danhSachLopHocHocVien'])->name('hocvien.xemDsLopHoc');

//Th??ng b??o
Route::get('admin/xem-ds-thong-bao',[InfomationController::class,'index'])->name('admin.xemDSThongBao');
Route::get('admin/them-thong-bao',[InfomationController::class,'createView'])->name('admin.viewAddThongBao');
Route::post('admin/them-thong-bao',[InfomationController::class,'create'])->name('admin.themThongBao');
Route::delete('admin/xoa-thong-bao/{id}',[InfomationController::class,'delete'])->name('admin.xoaThongBao');
//??i???m danh
// Route::get('/xu-ly-diem-danh', [\App\Http\Controllers\DiemDanhController::class, 'diemDanh'])->name('diemdanh');
// Route::get('ghi-thong-tin-diem-danh/{malop}', [\App\Http\Controllers\DiemDanhController::class, 'ghiThongTinDiemDanh'])->name('ghiThongTinDiemDanh');
// Route::get('xem-ds-diem-danh/{malop}', [\App\Http\Controllers\DiemDanhController::class, 'xemKQDiemDanh'])->name('xemKQDiemDanh');
// Route::get('huy-diem-danh', function () {
//     return view('huyDiemDanh');
// })->name('huyDiemDanh');
Route::get('/diemdanh/{malop}',[DiemDanhController::class,'createFormDiemDanh'])->name('hocvien.diemdanh');

Route::get('/ket-qua-diem-danh/{id}', function ($id){
    return view('ketQuaDiemDanh',['userid'=>$id]);
});



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('admin-view', [\App\Http\Controllers\HomeController::class, 'adminView'])->name('admin.view');
});


// File upload & download
// Route::resource('documents', 'DocumentController');
Route::get('documents/{uuid}/download', [DocumentController::class,'download'])->name('documents.download');
Route::get('documents/index/{malop}',[DocumentController::class,'index'])->name('documents.index');
Route::get('documents/create/{malop}',[DocumentController::class,'create'])->name('documents.create');
Route::post('documents/store',[DocumentController::class,'store'])->name('documents.store');
