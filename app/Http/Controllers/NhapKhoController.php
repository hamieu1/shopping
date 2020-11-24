<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\PhieuNhap\PhieuNhap;
use Session;
use App\HoaDonNhap;
use App\CTHoaDonNhap;
use App\Kho;
use Auth;

class NhapKhoController extends Controller
{
    public function getThemPhieuNhap(){
    	if(session()->has('phieunhap')){
    		$phieunhap = new PhieuNhap;
    		return view('Admin.NhapKho.them', ['phieunhap' => $phieunhap]);
    	}
    	else{
	    	return view('Admin.NhapKho.them');
    	}
    }

    public function getLiveSearch(Request $request){
    	if($request->ajax()){
            $query = $request->get('tukhoa');
            if(strlen($query) >= 2){
                $data = SanPham::where('Name', 'like', "%$query%")->get();
                if(count($data) > 0){
                    return view('Admin.NhapKho.searchajax', ['data' => $data]);
                }               
            }     
        }
    }

    public function addPhieuNhap($id, PhieuNhap $phieunhap){
    	$sanpham = SanPham::find($id);
    	//Thêm vào session
    	$phieunhap->add($sanpham);
    	return redirect('admin/nhapkho/them')->with('thongbao', 'Thêm thành công');
    }

    public function xoaPhieuNhap($id, PhieuNhap $phieunhap){
    	$phieunhap->delete($id);
    	return redirect('admin/nhapkho/them')->with('thongbao', 'Xóa thành công');
    }

    public function savePhieuNhap(PhieuNhap $phieunhap){
    	$hdnhap = new HoaDonNhap;
    	$hdnhap->TongTien = $phieunhap->total_amout;
        $hdnhap->TongSoLuong = $phieunhap->total_quantity;
    	$hdnhap->id_users = Auth::User()->id;
    	$hdnhap->save();
    	foreach ($phieunhap->items as $data) {
    		$cthoadonnhap = new CTHoaDonNhap;
    		$cthoadonnhap->SoLuong = $data['qty'];
    		$cthoadonnhap->DonGia = $data['qty'] * $data['price'];
    		$cthoadonnhap->id_HoaDonNhap = $hdnhap->id;
    		$cthoadonnhap->id_SanPham = $data['id'];
    		$cthoadonnhap->save();

            $sanpham = SanPham::find($data['id']);
            $sanpham->SoLuong = $sanpham->SoLuong + $data['qty'];
            if($sanpham->SoLuong > 0){
                $sanpham->TinhTrang = "Còn hàng";
            }
            else{
                $sanpham->TinhTrang = "Hết hàng";
            }
            $sanpham->save();

    		$checkkho = Kho::where('Name', '=', $data['name'])->get();
    		if($checkkho->count() > 0){
    			foreach ($checkkho as $items) {
    				$kho = Kho::find($items->id);
    				$kho->SoLuong = $kho->SoLuong + $data['qty'];
    				$kho->GiaTriTon = $kho->SoLuong * $data['price'];
    				$kho->save();
    			}
    		}
    		else{
    			$kho = new Kho;
	    		$kho->Name = $data['name'];
	    		$kho->SoLuong = $data['qty'];
	    		$kho->GiaTriTon = $data['qty'] * $data['price'];
	    		$kho->save();
    		}    		
    	}
    	session()->forget('phieunhap');
    	return redirect('admin/nhapkho/them')->with('thongbao', 'Tạo thành công');
    }

    public function updatePhieuNhap(Request $request, PhieuNhap $phieunhap){
    	$phieunhap->update($request->id, $request->qty);
    }

    public function getDanhSach(){
        $hdnhap = HoaDonNhap::all();
        return view('Admin.NhapKho.danhsach', ['hdnhap' => $hdnhap]);
    }

    public function getChiTiet($id){
        $hdnhap = HoaDonNhap::find($id);
        return view('Admin.NhapKho.chitiet', ['hdnhap' => $hdnhap]);
    }
}
