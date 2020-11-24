<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhachHang;

class KhachHangController extends Controller
{
    public function getDanhSach(){
    	$khachhang = KhachHang::all();
    	return view('Admin.KhachHang.danhsach',['khachhang' => $khachhang]);
    }

    public function getThem(){
    	return view('Admin.KhachHang.them');
    }

    public function postThem(Request $request){
    	$this->validate($request, ['Name' => 'required|unique:KhachHang,Name|min:3|max:100', 'Email' => 'required|email', 'SDT' => 'required|min:10|max:11', 'DiaChi' => 'required'],['Name.required' => 'Không được để trống tên danh mục', 'Name.unique' => 'Tên danh mục đã bị trùng', 'Name.min' => 'Tên danh mục phải nhiều hơn 3 ký tự', 'Name.max' => 'Tên danh mục không được quá 100 ký tự', 'Email.required' => 'Email không được để trống', 'Email.email' => 'Email không hợp lệ', 'SDT.required' => 'Số điện thoại không được để trống', 'SDT.min' => 'Số điện thoại phải từ 10 đến 11 số', 'SDT.max' => 'Số điện thoại phải từ 10 đến 11 số', 'DiaChi.required' => 'Địa chỉ không được để trống']);
    	$khachhang = new KhachHang;
    	$khachhang->Name = $request->Name;
    	$khachhang->Email = $request->Email;
		$khachhang->DienThoai = $request->SDT;
		$khachhang->DiaChi = $request->DiaChi;
    	$khachhang->save();
    	return redirect('admin/khachhang/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id){
    	$khachhang = KhachHang::find($id);
    	return view('Admin.KhachHang.sua', ['khachhang' => $khachhang]);
    }

    public function postSua(Request $request, $id){
    	$this->validate($request, ['Name' => 'required|min:3|max:100', 'Email' => 'required|email', 'SDT' => 'required|min:10|max:11', 'DiaChi' => 'required'],['Name.required' => 'Không được để trống tên danh mục', 'Name.min' => 'Tên danh mục phải nhiều hơn 3 ký tự', 'Name.max' => 'Tên danh mục không được quá 100 ký tự', 'Email.required' => 'Email không được để trống', 'Email.email' => 'Email không hợp lệ', 'SDT.required' => 'Số điện thoại không được để trống', 'SDT.min' => 'Số điện thoại phải từ 10 đến 11 số', 'SDT.max' => 'Số điện thoại phải từ 10 đến 11 số', 'DiaChi.required' => 'Địa chỉ không được để trống']);
    	$khachhang = KhachHang::find($id);
    	$khachhang->Name = $request->Name;
    	$khachhang->Email = $request->Email;
		$khachhang->DienThoai = $request->SDT;
		$khachhang->DiaChi = $request->DiaChi;
    	$khachhang->save();
    	return redirect('admin/khachhang/sua/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id){
    	$khachhang = KhachHang::find($id);
    	$khachhang->delete();
    	return redirect('admin/khachhang/danhsach')->with('thongbao', 'Xóa thành công');
    }
}
