<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhMuc;
use App\LoaiSanPham;
use App\SanPham;
use App\User;
use App\Kho;
use App\Comments;
use App\KhachHang;
use App\DanhGia;
use App\HoaDonBan;
use App\CTHoaDonBan;
use Auth;
use Mail;
use DB;

class HomeController extends Controller
{
    public function getHome(){
    	$spnoibat = SanPham::take(6)->get();
    	$thoitrangnu = DanhMuc::find(2);
    	$thoitrangnam = DanhMuc::find(1);
    	$girlnew = $thoitrangnu->danhmuc_sanpham->sortByDesc('created_at')->take(7);
    	$boynew = $thoitrangnam->danhmuc_sanpham->sortByDesc('created_at')->take(7);
        $topsale = SanPham::orderBy('GiaKhuyenMai', 'asc')->take(3)->get();
        $saleday = SanPham::find(15);
    	return view('Frontend.Pages.trangchu', ['spnoibat' => $spnoibat, 'girlnew' => $girlnew, 'boynew' => $boynew, 'topsale' => $topsale, 'saleday' => $saleday]);
    }

    public function getDanhMuc($sort, $id){
    	$danhmuc = DanhMuc::find($id);
    	if($sort == 'sortnew'){
    		$sapxep = $sort;
    		return view('Frontend.Pages.danhmuc', ['danhmuc' => $danhmuc, 'sapxep' => $sapxep]);
    	}
    	elseif($sort == 'sortname'){
    		$sapxep = $sort;
    		return view('Frontend.Pages.danhmuc', ['danhmuc' => $danhmuc, 'sapxep' => $sapxep]);
    	}
    	else{
    		$sapxep = $sort;
    		return view('Frontend.Pages.danhmuc', ['danhmuc' => $danhmuc, 'sapxep' => $sapxep]);
    	}
    	return view('Frontend.Pages.danhmuc', ['danhmuc' => $danhmuc]);
    }

    public function getCategory($tenkhongdau, $id){
    	$loaisanpham = LoaiSanPham::find($id);
    	$sanpham = SanPham::where('id_LoaiSanPham', $id)->orderBy('id', 'desc')->paginate(16);
    	return view('Frontend.Pages.category', ['sanpham' => $sanpham, 'loaisanpham' => $loaisanpham]);
    }

    public function getProductsDetail($tenkhongdau, $id){
    	$sanpham = SanPham::find($id);
        $splienquan = SanPham::where('id_LoaiSanPham', $sanpham->id_LoaiSanPham)->where('id', '!=', $id)->get();
        $comments = Comments::where('id_SanPham', $id)->get();
        return view('Frontend.Pages.products-detail', ['sanpham' => $sanpham, 'splienquan' => $splienquan, 'comments' => $comments]);    
    }

    public function getDangNhap(){
        return view('Frontend.Pages.dangnhap');
    }

    public function postDangNhap(Request $request){
        $this->validate($request, ['email' => 'required|email', 'password' => 'required|'], ['email.required' => 'Email không được để trống', 'email.email' => 'Email không hợp lệ', 'password.required' => 'Password không được để trống']);
        if(Auth::attempt(['email'=>$request->email, 'password' => $request->password], $request->has('remember'))){
            return redirect('/');
        }
        else {
            return redirect('dangnhap')->with('thongbao', 'Email hoặc mật khẩu không đúng');
        }
    }

    public function getDangXuat(){
        Auth::logout();
        return redirect('/');
    }

    public function getDangKy(){
        return view('Frontend.Pages.dangky');
    }

    public function postDangKy(Request $request){
        $this->validate($request, ['Name' => 'required|unique:users,name|min:3|max:100', 'Email' => 'required|email|unique:users,email', 'Password' => 'required|min:6', 'PasswordAgain' => 'required|same:Password'],['Name.required' => 'Không được để trống tên user', 'Name.unique' => 'Tên user đã bị trùng', 'Name.min' => 'Tên user phải nhiều hơn 3 ký tự', 'Name.max' => 'Tên user không được quá 100 ký tự', 'Email.required' => 'Email không được để trống', 'Email.email' => 'email không hợp lệ', 'Email.unique' => 'Email đã có người sử dụng', 'Password.required' => 'Password không được để trống', 'Password.min' => 'Password phải lớn hơn 6 ký tự', 'PasswordAgain.required' => 'Phải nhập lại password', 'PasswordAgain.same' => 'Password phải trùng nhau']);
        $users = new User;
        $users->name = $request->Name;
        $users->email = $request->Email;
        $users->password = bcrypt($request->Password);
        $users->level = 4;
        $users->dienthoai = $request->DienThoai;
        $users->save();
        return redirect('dangky')->with('thongbao', 'Đăng ký thành công');
    }

    public function getQuenMK(){
        return view('Frontend.Pages.forgotpassword');
    }

    public function postLayMK(Request $request){
        $this->validate($request, ['Email' => 'required'], ['Email.required' => 'Email không được để trống']);
        $users = User::where('email', $request->Email)->get();
        if($users->count() > 0){
            foreach ($users as $items) {
                $items->password = bcrypt(123456);
                $items->save();

                $data = ['name' => $items->name, 'email' => $request->Email];
                Mail::send('Frontend.Pages.emailforgotpas', $data, function ($message) use ($data) {
                    $message->from('hamieu1@gmail.com', 'Đào Minh Hà');
                
                    $message->to($data['email'], $data['name']);
                
                    $message->cc('hamieu1@gmail.com', 'Đào Minh Hà');
                    
                    $message->subject('Nhận lại mật khẩu mới');
                
                });
                return redirect('forgotpassword')->with('thongbao', 'Mật khẩu mới đã được gửi vào Email của bạn');
            }
        }
        else{
            return redirect('forgotpassword')->with('loi', 'Email bạn nhập không có trong cơ sở dữ liệu');
        }
    }

    public function getLiveSearch(Request $request){
        if($request->ajax()){
            $query = $request->get('tukhoa');
            if(strlen($query) >= 2){
                $data = SanPham::where('Name', 'like', "%$query%")->get();
                if(count($data) > 0){
                    return view('Frontend.Pages.searchajax', ['data' => $data]);
                }               
            }     
        }
    }

    public function getSearch(Request $request){
        $search = $request->Search;
        if($search == ""){
            $spSearch = SanPham::orderBy('created_at', 'desc')->paginate(12);
            return view('Frontend.Pages.search', ['spSearch' => $spSearch, 'search' => $search]);
        }
        else{
            $spSearch = SanPham::where('Name', 'like', "%$search%")->paginate(12);
            $spSearch->appends(['Search' => $search]);
            return view('Frontend.Pages.search', ['spSearch' => $spSearch, 'search' => $search]);
        }       
    }

    public function postComments(Request $request, $id){
        $sanpham = SanPham::find($id);
        if($request->DanhGia != null){
            $danhgia = new DanhGia;
            $danhgia->Stars = $request->DanhGia;
            $danhgia->id_SanPham = $id;
            $danhgia->save();
        }
        if(Auth::check()){
            $comment = new Comments;
            $comment->NoiDung = $request->NoiDung;
            $comment->id_SanPham = $id;
            $comment->id_users = Auth::user()->id;
            $comment->save();
            return redirect('products-detail/'.$sanpham->TenKhongDau.'/'.$sanpham->id.'.html');
        }
        else{
            $khachhang = new KhachHang;
            $khachhang->Name = $request->Name;
            $khachhang->Email = $request->Email;
            $khachhang->save();
            $comment = new Comments;
            $comment->NoiDung = $request->NoiDung;
            $comment->id_SanPham = $id;
            $comment->id_KhachHang = $khachhang->id;
            $comment->save();
            return redirect('products-detail/'.$sanpham->TenKhongDau.'/'.$sanpham->id.'.html');
        }       
    }

    public function getMyAccount(){
        return view('Frontend.Pages.myaccount');
    }

    public function getMyOrders(){
        $hdban = HoaDonBan::where('id_Users', Auth::user()->id)->get();
        return view('Frontend.Pages.myorders', ['hdban' => $hdban]);
    }

    public function getViewOrders($id){
        $hoadon = HoaDonBan::find($id);
        $cthdban = CTHoaDonBan::where('id_HoaDonBan', $id)->get();
        return view('Frontend.Pages.vieworders', ['cthdban' => $cthdban, 'hoadon' => $hoadon]);
    }

    public function getMyInfor(){
        return view('Frontend.Pages.myinfor');
    }

    public function postDoiMatKhau(Request $request){
        if(Auth::attempt(['email'=>$request->Email, 'password' => $request->PasswordCurrent])){
            $users = User::find(Auth::user()->id);
            $this->validate($request, ['NewPassword' => 'required|min:6', 'PasswordAgain' => 'required|same:NewPassword'], ['NewPassword.required' => 'Password không được để trống', 'Password.min' => 'Password phải lớn hơn 6 ký tự', 'PasswordAgain.required' => 'Phải nhập lại password', 'PasswordAgain.same' => 'Password phải trùng nhau']);
            $users->password = bcrypt($request->NewPassword);
            $users->save();
            return redirect('myaccount/myinfor')->with('thongbao', 'Đổi mật khẩu thành công');
        }
        else{
            return redirect('myaccount/myinfor')->with('loi', 'Bạn không nhập đúng mật khẩu');
        }
    }

    public function getInHoaDon($id){
        $hoadon = HoaDonBan::find($id);
        return view('Frontend.Pages.hoadon', ['hoadon' => $hoadon]);
    }
}
