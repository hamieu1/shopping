<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HoaDonBan;
use App\CTHoaDonBan;
use Carbon\Carbon;

class HoaDonBanController extends Controller
{
    public function getDanhSach(){
    	$hdban = HoaDonBan::all();
    	return view('Admin.HoaDonBan.danhsach', ['hdban' => $hdban]);
    }

    public function getSua($id){
    	$hdban = HoaDonBan::find($id);
        $date = new Carbon();
    	return view('Admin.HoaDonBan.sua', ['hdban' => $hdban]);
        // return date("Y-m-d");
    }

    public function postSua(Request $request, $id){
    	$hdban = HoaDonBan::find($id);
    	$hdban->TrangThai = $request->TrangThai;
    	$hdban->save();
    	return redirect('admin/hoadonban/sua/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function getChiTiet($id){
    	$hdban = HoaDonBan::find($id);
    	return view('Admin.HoaDonBan.chitiet', ['hdban' => $hdban]);
    }
}
