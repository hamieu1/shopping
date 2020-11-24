<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\HoaDonBan;
use App\CTHoaDonBan;
use App\HoaDonNhap;
use App\CTHoaDonNhap;
use App\KhachHang;
use App\Comments;

class HomeAdminController extends Controller
{
    public function getHomeAdmin(){
    	$cthdban = CTHoaDonBan::all();
    	$tongsovon = 0;
    	$tongtienban = 0;
    	foreach ($cthdban as $items) {    		
    		$tongsovon = $tongsovon + ($items->cthoadonban_sanpham->GiaNhap * $items->SoLuong);
    		$tongtienban = $tongtienban + ($items->SoLuong * $items->cthoadonban_sanpham->GiaKhuyenMai);
    	}

    	$tongloinhuan = $tongtienban - $tongsovon;

    	$sanpham = SanPham::all();
    	$spbanduoc = $sanpham->sum('SoLuongDaBan');

    	$khachang = KhachHang::all();
    	$tongkhachhang = $khachang->count();

    	$hdban = HoaDonBan::all();
    	$tonghoadon = $hdban->count();
// ------------------------------------------------------------------------------------------------------------------------------
    	$ngay = date('Y-m-d');

    	$hdbantrongngay = CTHoaDonBan::where('created_at', 'like', "%$ngay%")->get();

    	$tongsovontrongngay = 0;
	    $tongtienbantrongngay = 0;
    	if($hdbantrongngay->count() > 0){
    		foreach ($hdbantrongngay as $items) {
	    		$tongsovontrongngay = $tongsovontrongngay + ($items->cthoadonban_sanpham->GiaNhap * $items->SoLuong);
	    		$tongtienbantrongngay = $tongtienbantrongngay + ($items->SoLuong * $items->cthoadonban_sanpham->GiaKhuyenMai);
    		}
    	}
    	else{
    		$tongsovontrongngay = 0;
    		$tongtienbantrongngay = 0;
    	}
    	$tongloinhuantrongngay = $tongtienbantrongngay - $tongsovontrongngay;
// ----------------------------------------------------------------------------------------------------------------------------------
    	$sanphamtrongngay = $hdbantrongngay->sum('SoLuong');

        $cthdnhaptrongngay = CTHoaDonNhap::where('created_at', 'like', "%$ngay%")->get();
        $sanphamnhaptrongngay = $cthdnhaptrongngay->sum('SoLuong');

        $donhangtrongngay = HoaDonBan::where('created_at', 'like', "%$ngay%")->get();

        $hdnhaptrongngay = HoaDonNhap::where('created_at', 'like', "%$ngay%")->get();

        $binhluantrongngay = Comments::where('created_at', 'like', "%$ngay%")->get();

  	 	 	
    	return view('Admin.Home.home', ['tongloinhuan' => $tongloinhuan, 'spbanduoc' => $spbanduoc, 'tongkhachhang' => $tongkhachhang, 'tonghoadon' => $tonghoadon, 'tongloinhuantrongngay' => $tongloinhuantrongngay, 'sanphamtrongngay' => $sanphamtrongngay, 'donhangtrongngay' => $donhangtrongngay, 'hdnhaptrongngay' => $hdnhaptrongngay, 'binhluantrongngay' => $binhluantrongngay, 'sanphamnhaptrongngay' => $sanphamnhaptrongngay]);
    }
}
