<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\HoaDonBan;
use App\CTHoaDonBan;
use App\LoaiSanPham;
use App\Kho;

class ThongKeController extends Controller
{
    public function getLoiNhuan(){
    	$ngay = date('Y-m-d');
    	$data = CTHoaDonBan::where('created_at', 'like', "%$ngay%")->get();

    	$tongsovon = 0;
    	$tongtienban = 0;
    	foreach ($data as $items) {    		
    		$tongsovon = $tongsovon + ($items->cthoadonban_sanpham->GiaNhap * $items->SoLuong);
    		$tongtienban = $tongtienban + ($items->SoLuong * $items->cthoadonban_sanpham->GiaKhuyenMai);
    	}
    	$tongloinhuan = $tongtienban - $tongsovon;

    	$sanphambanduoc = $data->sum('SoLuong');

    	$hdban = HoaDonBan::where('created_at', 'like', "%$ngay%")->get();
    	$tongkhachhang = $hdban->count();
    	$tonghd = $hdban->count();

    	return view('Admin.ThongKe.loinhuan', ['data' => $data, 'ngay' => $ngay, 'tongloinhuan' => $tongloinhuan, 'sanphambanduoc' => $sanphambanduoc, 'tongkhachhang' => $tongkhachhang, 'tonghd' => $tonghd]);
    }

    public function postLoiNhuanTheoNgay(Request $request){
    	$data = CTHoaDonBan::whereBetween('created_at', [$request->NgayDau, $request->NgayCuoi])->get();
    	$ngaydau = $request->NgayDau;
    	$ngaycuoi = $request->NgayCuoi;

    	$tongsovon = 0;
    	$tongtienban = 0;
    	foreach ($data as $items) {    		
    		$tongsovon = $tongsovon + ($items->cthoadonban_sanpham->GiaNhap * $items->SoLuong);
    		$tongtienban = $tongtienban + ($items->SoLuong * $items->cthoadonban_sanpham->GiaKhuyenMai);
    	}
    	$tongloinhuan = $tongtienban - $tongsovon;

    	$sanphambanduoc = $data->sum('SoLuong');

    	$hdban = HoaDonBan::whereBetween('created_at', [$request->NgayDau, $request->NgayCuoi])->get();
    	$tongkhachhang = $hdban->count();
    	$tonghd = $hdban->count();

        if($request->TaoBaoCao == 'on'){
            return view('Admin.ThongKe.baocao', ['data' => $data, 'ngaydau' => $ngaydau, 'ngaycuoi' => $ngaycuoi, 'tongloinhuan' => $tongloinhuan, 'sanphambanduoc' => $sanphambanduoc, 'tongkhachhang' => $tongkhachhang, 'tonghd' => $tonghd]);
        }
        else{
            return view('Admin.ThongKe.loinhuan', ['data' => $data, 'ngaydau' => $ngaydau, 'ngaycuoi' => $ngaycuoi, 'tongloinhuan' => $tongloinhuan, 'sanphambanduoc' => $sanphambanduoc, 'tongkhachhang' => $tongkhachhang, 'tonghd' => $tonghd]);
        }   	
    }

    public function getLoiNhuanAll(){
        $data = CTHoaDonBan::all();
        $tongsovon = 0;
        $tongtienban = 0;
        foreach ($data as $items) {         
            $tongsovon = $tongsovon + ($items->cthoadonban_sanpham->GiaNhap * $items->SoLuong);
            $tongtienban = $tongtienban + ($items->SoLuong * $items->cthoadonban_sanpham->GiaKhuyenMai);
        }
        $tongloinhuan = $tongtienban - $tongsovon;

        $sanphambanduoc = $data->sum('SoLuong');

        $hdban = HoaDonBan::all();
        $tongkhachhang = $hdban->count();
        $tonghd = $hdban->count();
        return view('Admin.ThongKe.loinhuan', ['data' => $data, 'tongloinhuan' => $tongloinhuan, 'sanphambanduoc' => $sanphambanduoc, 'tongkhachhang' => $tongkhachhang, 'tonghd' => $tonghd]);
    }

    public function getSanphamBanChay(){
    	$spbanchay = SanPham::orderBy('SoLuongDaBan', 'desc')->get();
    	return view('Admin.ThongKe.sanphamtk', ['spbanchay' => $spbanchay]);
    }

    public function postSanPhamThongKe(Request $request){
		if($request->Loai == "banchay"){
			$spbanchay = SanPham::orderBy('SoLuongDaBan', 'desc')->get();
    		return view('Admin.ThongKe.sanphamtk', ['spbanchay' => $spbanchay]);
		}
		else if($request->Loai == "tonkho") {
			$sptonkho = SanPham::orderBy('SoLuongDaBan', 'asc')->get();
			return view('Admin.ThongKe.sanphamtk', ['sptonkho' => $sptonkho]);
		}	
    	else if($request->Loai == "danhgia"){
            $spdanhgia = SanPham::all();
            $data = [];
            foreach ($spdanhgia as $items) {
                $data[$items->id] = ['tongsao' => $items->sanpham_danhgia->count()];
            }
            return view('Admin.ThongKe.sanphamtk', ['data' => $data, 'spdanhgia' => $spdanhgia]);
        }
    }

    public function getHoaDonTK(){
        $ngay = date('Y-m-d');

        $hdban = HoaDonBan::where('created_at', 'like', "%$ngay%")->get();
        return view('Admin.ThongKe.hoadontk', ['hdban' => $hdban, 'ngay' => $ngay]);
    }

    public function getHoaDonTheoNgay(Request $request){
        $hdban = HoaDonBan::whereBetween('created_at', [$request->NgayDau, $request->NgayCuoi])->get();
        $ngaydau = $request->NgayDau;
        $ngaycuoi = $request->NgayCuoi;

        if($request->TaoBaoCao == 'on'){
            return view('Admin.ThongKe.baocaohd', ['hdban' => $hdban, 'ngaydau' => $ngaydau, 'ngaycuoi' => $ngaycuoi]);
        }
        else{
            return view('Admin.ThongKe.hoadontk', ['hdban' => $hdban, 'ngaydau' => $ngaydau, 'ngaycuoi' => $ngaycuoi]);
        }        
    }

    public function getHoaDonAll(){
        $hdban = HoaDonBan::all();
        return view('Admin.ThongKe.hoadontk', ['hdban' => $hdban]);
    }
}
