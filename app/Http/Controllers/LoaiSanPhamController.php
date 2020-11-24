<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiSanPham;
use App\DanhMuc;

class LoaiSanPhamController extends Controller
{
    public function getDanhSach(){
    	$loaisanpham = LoaiSanPham::all();
    	return view('Admin.LoaiSanPham.danhsach', ['loaisanpham' => $loaisanpham]);
    }

    public function getThem(){
    	$danhmuc = DanhMuc::all();
    	return view('Admin.LoaiSanPham.them', ['danhmuc' => $danhmuc]);
    }

    public function postThem(Request $request){
    	$this->validate($request, ['Name' => 'required|unique:LoaiSanPham,Name|min:3|max:100'],['Name.required' => 'Không được để trống tên loại sản phẩm', 'Name.unique' => 'Tên loại sản phẩm đã bị trùng', 'Name.min' => 'Tên loại sản phẩm phải nhiều hơn 3 ký tự', 'Name.max' => 'Tên loại sản phẩm không được quá 100 ký tự']);
    	$loaisanpham = new LoaiSanPham;
    	$loaisanpham->Name = $request->Name;
    	$loaisanpham->TenKhongDau = str_slug($request->Name);
    	$loaisanpham->id_DanhMuc = $request->DanhMuc;
    	$loaisanpham->save();
    	return redirect('admin/loaisanpham/danhsach')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id){
    	$danhmuc = DanhMuc::all();
    	$loaisanpham = LoaiSanPham::find($id);
    	return view('Admin.LoaiSanPham.sua', ['loaisanpham' => $loaisanpham, 'danhmuc' => $danhmuc]);
    }

    public function postSua(Request $request, $id){
    	$this->validate($request, ['Name' => 'required|unique:LoaiSanPham,Name,'.$id.',id|min:3|max:100'],['Name.required' => 'Không được để trống tên loại sản phẩm', 'Name.unique' => 'Tên loại sản phẩm đã bị trùng', 'Name.min' => 'Tên loại sản phẩm phải nhiều hơn 3 ký tự', 'Name.max' => 'Tên loại sản phẩm không được quá 100 ký tự']);
    	$loaisanpham = LoaiSanPham::find($id);
    	$loaisanpham->Name = $request->Name;
    	$loaisanpham->TenKhongDau = str_slug($request->Name);
    	$loaisanpham->id_DanhMuc = $request->DanhMuc;
    	$loaisanpham->save();
    	return redirect('admin/loaisanpham/sua/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id){
    	$loaisanpham = LoaiSanPham::find($id);
    	if(count($loaisanpham->loaisanpham_sanpham) > 0)
        {
            return redirect('admin/loaisanpham/danhsach')->with('loi', 'Danh mục này đang có sản phẩm bạn phải xóa hết các sản phẩm trước đã');
        }
        else{
            $loaisanpham->delete();
            return redirect('admin/loaisanpham/danhsach')->with('thongbao', 'Xóa thành công');
        }   	
    }
}
