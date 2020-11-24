<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhMuc;
use App\SanPham;
use App\LoaiSanPham;

class SanPhamController extends Controller
{
    public function getDanhSach(){
    	$sanpham = SanPham::all();
    	return view('Admin.SanPham.danhsach', ['sanpham' => $sanpham]);
    }

    public function getThem(){
    	$danhmuc = DanhMuc::all();
    	$loaisanpham = LoaiSanPham::all();
    	return view('Admin.SanPham.them', ['danhmuc' => $danhmuc, 'loaisanpham' => $loaisanpham]);
    }

    public function postThem(Request $request){
    	$this->validate($request, ['Name' => 'required|unique:SanPham,Name|min:3|max:200', 'GiaBan' => 'required', 'GiaNhap' => 'required', 'GiaKhuyenMai' => 'required', 'AnhChinh' => 'image', 'AnhPhu1' => 'image', 'AnhPhu2' => 'image', 'AnhPhu3' => 'image', 'AnhPhu4' => 'image', 'MoTa' => 'required'],['Name.required' => 'Tên sản phẩm không được để trống', 'Name.unique' => 'Tên sản phẩm đã bị trùng', 'Name.min' => 'Tên sản phẩm phải nhiều hơn 3 ký tự', 'Name.max' => 'Tên sản phẩm phải ít hơn 200 ký tự','GiaBan.required' => 'Giá sản phẩm không được để trống', 'GiaNhap.required' => 'Giá nhập không được để trống', 'GiaKhuyenMai.required' => 'Giá khuyến mại không được để trống', 'MoTa.required' => 'Mô tả không được để trống', 'AnhChinh.image' => 'Ảnh chính phải là file ảnh', 'AnhPhu1.image' => 'Ảnh phụ 1 phải là file ảnh', 'AnhPhu2.image' => 'Ảnh phụ 2 phải là file ảnh', 'AnhPhu3.image' => 'Ảnh phụ 3 phải là file ảnh', 'AnhPhu4.image' => 'Ảnh phụ 4 phải là file ảnh']);
    	$sanpham = new SanPham;
    	$sanpham->Name = $request->Name;
    	$sanpham->TenKhongDau = str_slug($request->Name);
    	$sanpham->GiaBan = $request->GiaBan;
    	$sanpham->GiaNhap = $request->GiaNhap;
    	$sanpham->GiaKhuyenMai = $request->GiaKhuyenMai;
    	$sanpham->MoTa = $request->MoTa;
    	$sanpham->TinhTrang = $request->TinhTrang;
    	$sanpham->id_LoaiSanPham = $request->LoaiSanPham;

    	if($request->hasFile('AnhChinh')){
    		$file = $request->file('AnhChinh');
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
    			return redirect("admin/sanpham/them")->with('loi','Bạn chỉ được upload file là hình ảnh');
    		}
    		// Lấy ra tên của file ảnh
    		$name = $file->getClientOriginalName();
    		// Đặt điều kiện để tên ảnh không trùng nhau
    		$hinh = str_random(4)."_".$name;
    		while(file_exists("public/upload/".$hinh)){
    			$hinh = str_random(4)."_".$name;
    		}
    		// Chuyển file ảnh vào thư mục upload
    		$file->move('public/upload',$hinh);
    		$sanpham->AnhChinh = $hinh;
    	}
    	else{
    		// Nếu người dùng không up file ảnh lên thì chuyển thành rỗng
    		$sanpham->AnhChinh = "";
    	}

    	if($request->hasFile('AnhPhu1')){
    		$file = $request->file('AnhPhu1');
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
    			return redirect("admin/sanpham/them")->with('loi','Bạn chỉ được upload file là hình ảnh');
    		}
    		// Lấy ra tên của file ảnh
    		$name = $file->getClientOriginalName();
    		// Đặt điều kiện để tên ảnh không trùng nhau
    		$hinh = str_random(4)."_".$name;
    		while(file_exists("public/upload/".$hinh)){
    			$hinh = str_random(4)."_".$name;
    		}
    		// Chuyển file ảnh vào thư mục upload
    		$file->move('public/upload',$hinh);
    		$sanpham->AnhPhu1 = $hinh;
    	}
    	else{
    		// Nếu người dùng không up file ảnh lên thì chuyển thành rỗng
    		$sanpham->AnhPhu1 = "";
    	}

    	if($request->hasFile('AnhPhu2')){
    		$file = $request->file('AnhPhu2');
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
    			return redirect("admin/sanpham/them")->with('loi','Bạn chỉ được upload file là hình ảnh');
    		}
    		// Lấy ra tên của file ảnh
    		$name = $file->getClientOriginalName();
    		// Đặt điều kiện để tên ảnh không trùng nhau
    		$hinh = str_random(4)."_".$name;
    		while(file_exists("public/upload/".$hinh)){
    			$hinh = str_random(4)."_".$name;
    		}
    		// Chuyển file ảnh vào thư mục upload
    		$file->move('public/upload',$hinh);
    		$sanpham->AnhPhu2 = $hinh;
    	}
    	else{
    		// Nếu người dùng không up file ảnh lên thì chuyển thành rỗng
    		$sanpham->AnhPhu2 = "";
    	}

    	if($request->hasFile('AnhPhu3')){
    		$file = $request->file('AnhPhu3');
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
    			return redirect("admin/sanpham/them")->with('loi','Bạn chỉ được upload file là hình ảnh');
    		}
    		// Lấy ra tên của file ảnh
    		$name = $file->getClientOriginalName();
    		// Đặt điều kiện để tên ảnh không trùng nhau
    		$hinh = str_random(4)."_".$name;
    		while(file_exists("public/upload/".$hinh)){
    			$hinh = str_random(4)."_".$name;
    		}
    		// Chuyển file ảnh vào thư mục upload
    		$file->move('public/upload',$hinh);
    		$sanpham->AnhPhu3 = $hinh;
    	}
    	else{
    		// Nếu người dùng không up file ảnh lên thì chuyển thành rỗng
    		$sanpham->AnhPhu3 = "";
    	}

    	if($request->hasFile('AnhPhu4')){
    		$file = $request->file('AnhPhu4');
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
    			return redirect("admin/sanpham/them")->with('loi','Bạn chỉ được upload file là hình ảnh');
    		}
    		// Lấy ra tên của file ảnh
    		$name = $file->getClientOriginalName();
    		// Đặt điều kiện để tên ảnh không trùng nhau
    		$hinh = str_random(4)."_".$name;
    		while(file_exists("public/upload/".$hinh)){
    			$hinh = str_random(4)."_".$name;
    		}
    		// Chuyển file ảnh vào thư mục upload
    		$file->move('public/upload',$hinh);
    		$sanpham->AnhPhu4 = $hinh;
    	}
    	else{
    		// Nếu người dùng không up file ảnh lên thì chuyển thành rỗng
    		$sanpham->AnhPhu4 = "";
    	}

    	$sanpham->save();
    	return redirect('admin/sanpham/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id){
    	$danhmuc = DanhMuc::all();
    	$loaisanpham = LoaiSanPham::all();
    	$sanpham = SanPham::find($id);
    	return view('Admin.SanPham.sua', ['sanpham' => $sanpham, 'loaisanpham' => $loaisanpham, 'danhmuc' => $danhmuc]);
    }

    public function postSua(Request $request, $id){
    	$this->validate($request, ['Name' => 'required|unique:SanPham,Name,'.$id.',id|min:3|max:200', 'GiaBan' => 'required', 'GiaNhap' => 'required', 'GiaKhuyenMai' => 'required', 'AnhChinh' => 'image', 'AnhPhu1' => 'image', 'AnhPhu2' => 'image', 'AnhPhu3' => 'image', 'AnhPhu4' => 'image', 'MoTa' => 'required'],['Name.required' => 'Tên sản phẩm không được để trống', 'Name.unique' => 'Tên sản phẩm đã bị trùng', 'Name.min' => 'Tên sản phẩm phải nhiều hơn 3 ký tự', 'Name.max' => 'Tên sản phẩm phải ít hơn 200 ký tự','GiaBan.required' => 'Giá sản phẩm không được để trống', 'GiaNhap.required' => 'Giá nhập không được để trống', 'GiaKhuyenMai.required' => 'Giá khuyến mại không được để trống', 'MoTa.required' => 'Mô tả không được để trống', 'AnhChinh.image' => 'Ảnh chính phải là file ảnh', 'AnhPhu1.image' => 'Ảnh phụ 1 phải là file ảnh', 'AnhPhu2.image' => 'Ảnh phụ 2 phải là file ảnh', 'AnhPhu3.image' => 'Ảnh phụ 3 phải là file ảnh', 'AnhPhu4.image' => 'Ảnh phụ 4 phải là file ảnh']);
    	$sanpham = SanPham::find($id);
    	$sanpham->Name = $request->Name;
    	$sanpham->TenKhongDau = str_slug($request->Name);
    	$sanpham->GiaBan = $request->GiaBan;
    	$sanpham->GiaNhap = $request->GiaNhap;
    	$sanpham->GiaKhuyenMai = $request->GiaKhuyenMai;
    	$sanpham->MoTa = $request->MoTa;
    	$sanpham->TinhTrang = $request->TinhTrang;
    	$sanpham->id_LoaiSanPham = $request->LoaiSanPham;

    	if($request->hasFile('AnhChinh')){
    		$file = $request->file('AnhChinh');
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
    			return redirect("admin/sanpham/them")->with('loi','Bạn chỉ được upload file là hình ảnh');
    		}
    		// Lấy ra tên của file ảnh
    		$name = $file->getClientOriginalName();
    		// Đặt điều kiện để tên ảnh không trùng nhau
    		$hinh = str_random(4)."_".$name;
    		while(file_exists("public/upload/".$hinh)){
    			$hinh = str_random(4)."_".$name;
    		}
    		// Chuyển file ảnh vào thư mục upload
    		$file->move('public/upload',$hinh);
    		$sanpham->AnhChinh = $hinh;
    	}

    	if($request->hasFile('AnhPhu1')){
    		$file = $request->file('AnhPhu1');
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
    			return redirect("admin/sanpham/them")->with('loi','Bạn chỉ được upload file là hình ảnh');
    		}
    		// Lấy ra tên của file ảnh
    		$name = $file->getClientOriginalName();
    		// Đặt điều kiện để tên ảnh không trùng nhau
    		$hinh = str_random(4)."_".$name;
    		while(file_exists("public/upload/".$hinh)){
    			$hinh = str_random(4)."_".$name;
    		}
    		// Chuyển file ảnh vào thư mục upload
    		$file->move('public/upload',$hinh);
    		$sanpham->AnhPhu1 = $hinh;
    	}

    	if($request->hasFile('AnhPhu2')){
    		$file = $request->file('AnhPhu2');
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
    			return redirect("admin/sanpham/them")->with('loi','Bạn chỉ được upload file là hình ảnh');
    		}
    		// Lấy ra tên của file ảnh
    		$name = $file->getClientOriginalName();
    		// Đặt điều kiện để tên ảnh không trùng nhau
    		$hinh = str_random(4)."_".$name;
    		while(file_exists("public/upload/".$hinh)){
    			$hinh = str_random(4)."_".$name;
    		}
    		// Chuyển file ảnh vào thư mục upload
    		$file->move('public/upload',$hinh);
    		$sanpham->AnhPhu2 = $hinh;
    	}

    	if($request->hasFile('AnhPhu3')){
    		$file = $request->file('AnhPhu3');
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
    			return redirect("admin/sanpham/them")->with('loi','Bạn chỉ được upload file là hình ảnh');
    		}
    		// Lấy ra tên của file ảnh
    		$name = $file->getClientOriginalName();
    		// Đặt điều kiện để tên ảnh không trùng nhau
    		$hinh = str_random(4)."_".$name;
    		while(file_exists("public/upload/".$hinh)){
    			$hinh = str_random(4)."_".$name;
    		}
    		// Chuyển file ảnh vào thư mục upload
    		$file->move('public/upload',$hinh);
    		$sanpham->AnhPhu3 = $hinh;
    	}

    	if($request->hasFile('AnhPhu4')){
    		$file = $request->file('AnhPhu4');
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
    			return redirect("admin/sanpham/them")->with('loi','Bạn chỉ được upload file là hình ảnh');
    		}
    		// Lấy ra tên của file ảnh
    		$name = $file->getClientOriginalName();
    		// Đặt điều kiện để tên ảnh không trùng nhau
    		$hinh = str_random(4)."_".$name;
    		while(file_exists("public/upload/".$hinh)){
    			$hinh = str_random(4)."_".$name;
    		}
    		// Chuyển file ảnh vào thư mục upload
    		$file->move('public/upload',$hinh);
    		$sanpham->AnhPhu4 = $hinh;
    	}

    	$sanpham->save();
    	return redirect('admin/sanpham/sua/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id){
    	$sanpham = SanPham::find($id);
    	$sanpham->delete();
    	return redirect('admin/sanpham/danhsach')->with('thongbao', 'Xóa thành công');
    }
}
