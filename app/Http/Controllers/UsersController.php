<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UsersController extends Controller
{
    public function getDanhSach(){
    	$users = User::all();
    	return view('Admin.Users.danhsach', ['users' => $users]);
    }

    public function getThem(){
    	return view('Admin.Users.them');
    }

    public function postThem(Request $request){
    	$this->validate($request, ['Name' => 'required|unique:users,name|min:3|max:100', 'Email' => 'required|email|unique:users,email', 'Password' => 'required|min:6', 'PasswordAgain' => 'required|same:Password', 'HinhAnh' => 'image', 'DienThoai' => 'required'],['Name.required' => 'Không được để trống tên user', 'Name.unique' => 'Tên user đã bị trùng', 'Name.min' => 'Tên user phải nhiều hơn 3 ký tự', 'Name.max' => 'Tên user không được quá 100 ký tự', 'Email.required' => 'Email không được để trống', 'Email.email' => 'email không hợp lệ', 'Email.unique' => 'Email đã có người sử dụng', 'Password.required' => 'Password không được để trống', 'Password.min' => 'Password phải lớn hơn 6 ký tự', 'PasswordAgain.required' => 'Phải nhập lại password', 'PasswordAgain.same' => 'Password phải trùng nhau', 'HinhAnh.image' => 'Hình ảnh phải là file ảnh', 'DienThoai.required' => 'Số điện thoại không được để trống']);
    	$users = new User;
    	$users->name = $request->Name;
    	$users->email = $request->Email;
    	$users->password = bcrypt($request->Password);
    	$users->level = $request->Level;
    	$users->dienthoai = $request->DienThoai;

    	if($request->hasFile('HinhAnh')){
    		$file = $request->file('HinhAnh');
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
    			return redirect("admin/users/them")->with('loi','Bạn chỉ được upload file là hình ảnh');
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
    		$users->hinhanh = $hinh;
    	}
    	else{
    		// Nếu người dùng không up file ảnh lên thì chuyển thành rỗng
    		$users->hinhanh = "";
    	}

    	$users->save();
    	return redirect('admin/users/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id){
    	$users = User::find($id);
    	return view('Admin.Users.sua', ['users' => $users]);
    }

    public function postSua(Request $request, $id){
    	$this->validate($request, ['Name' => 'required|min:3|max:100', 'HinhAnh' => 'image', 'DienThoai' => 'required'],['Name.required' => 'Không được để trống tên user', 'Name.min' => 'Tên user phải nhiều hơn 3 ký tự', 'Name.max' => 'Tên user không được quá 100 ký tự', 'HinhAnh.image' => 'Hình ảnh phải là file ảnh', 'DienThoai.required' => 'Số điện thoại không được để trống']);
    	$users = User::find($id);
    	$users->name = $request->Name;
    	$users->email = $request->Email;
    	$users->dienthoai = $request->DienThoai;
    	if($request->changePassword == 'on'){
    		$this->validate($request, ['Password' => 'required|min:6', 'PasswordAgain' => 'required|same:Password'], ['Password.required' => 'Password không được để trống', 'Password.min' => 'Password phải lớn hơn 6 ký tự', 'PasswordAgain.required' => 'Phải nhập lại password', 'PasswordAgain.same' => 'Password phải trùng nhau']);
    		$users->password = bcrypt($request->Password);
    	}	
    	$users->level = $request->Level;

    	if($request->hasFile('HinhAnh')){
    		$file = $request->file('HinhAnh');
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
    			return redirect("admin/users/them")->with('loi','Bạn chỉ được upload file là hình ảnh');
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
    		unlink("public/upload/".$users->hinhanh);
    		$users->hinhanh = $hinh;
    	}

    	$users->save();
    	return redirect('admin/users/sua/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id){
    	$users = User::find($id);
    	$users->delete();
    	return redirect('admin/users/danhsach')->with('thongbao', 'Xóa thành công');
    }

    public function getLoginAdmin(){
    	return view('Admin.login');
    }

    public function postLoginAdmin(Request $request){
    	$this->validate($request, ['email' => 'required|email', 'password' => 'required|'], ['email.required' => 'Email không được để trống', 'email.email' => 'Email không hợp lệ', 'password.required' => 'Password không được để trống']);
    	if(Auth::attempt(['email'=>$request->email, 'password' => $request->password], $request->has('remember'))){
            if(Auth::user()->level == 4){
                Auth::logout();
                return redirect('admin/login')->with('thongbao', 'Bạn không đủ quyền để đăng nhập vào trang quản trị');
            }
            else{
                return redirect('admin');
            }  		
    	}
    	else {
    		return redirect('admin/login')->with('thongbao', 'Email hoặc mật khẩu không đúng');
    	}
    }

    public function getLogoutAdmin(){
    	Auth::logout();
    	return redirect('admin/login');
    }

    public function getInfo(){
    	$users = Auth::user();
    	return view('Admin.Users.info', ['users' => $users]);
    }
}
