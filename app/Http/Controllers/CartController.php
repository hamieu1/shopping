<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\SanPham;
use App\KhachHang;
use App\HoaDonBan;
use App\CTHoaDonBan;
use App\Kho;
use Auth;
use Mail;

class CartController extends Controller
{
    public function getAddCart($id){
    	$sanpham = SanPham::find($id);
    	Cart::add(['id' => $id, 'name' => $sanpham->Name, 'qty' => 1, 'price' => $sanpham->GiaKhuyenMai, 'options' => ['img' => $sanpham->AnhChinh, 'tenkhongdau' => $sanpham->TenKhongDau]]);
    	return redirect('cart/show');
    }

    public function getShowCart(){
    	$total = Cart::total();
    	$cartcontent = Cart::content();
    	// Lấy random sản phẩm
    	$productsrandom = SanPham::inRandomOrder()->take(4)->get();   	
    	return view('Frontend.Pages.cart', ['cartcontent' => $cartcontent, 'total' => $total, 'productsrandom' => $productsrandom]);
    }

    public function getDeleteCart($rowId){
    	if($rowId == "all"){
    		Cart::destroy();
    	}
    	else{
    		Cart::remove($rowId);
    	}
    	return back();
    }

    public function getUpdateCart(Request $request){
        $sanpham = SanPham::find($request->idSanPham);
        if($sanpham->SoLuong < $request->qty){
            return "ok";
        }
        else{
            Cart::update($request->rowId,$request->qty);
        }        
    }

    public function postThanhToanCart(Request $request){ 
        $data = ['name' => $request->Name, 'email' => $request->Email, 'diachi' => $request->DiaChi, 'sdt' => $request->DienThoai];
        $data['cart'] = Cart::content();
        Mail::send('Frontend.Pages.email', $data, function ($message) use ($data) {
            $message->from('hamieu1@gmail.com', 'Đào Minh Hà');
        
            $message->to($data['email'], $data['name']);
        
            $message->cc('hamieu1@gmail.com', 'Đào Minh Hà');
            
            $message->subject('Xác nhận đơn hàng');
        
        });

    	$khachhang = new KhachHang;
    	$khachhang->Name = $request->Name;
    	$khachhang->Email = $request->Email;
    	$khachhang->DiaChi = $request->DiaChi;
    	$khachhang->DienThoai = $request->DienThoai;
    	$khachhang->save();

    	$hoadon = new HoaDonBan;
    	$hoadon->TongTien = Cart::total();
        $hoadon->TongSoLuong = Cart::count();
        if(Auth::check()){
            $hoadon->id_Users = Auth::user()->id;
        }
        $hoadon->TrangThai = "Khởi tạo";
        $hoadon->Payment = "Trực tiếp";
    	$hoadon->id_KhachHang = $khachhang->id;
    	$hoadon->save();

    	$data = Cart::content();
    	foreach ($data as $key => $value) {
            $sanpham = SanPham::find($value->id);
            $sanpham->SoLuongDaBan = $sanpham->SoLuongDaBan + $value->qty;
            $sanpham->SoLuong = $sanpham->SoLuong - $value->qty;
            if($sanpham->SoLuong == 0){
                $sanpham->TinhTrang == "Hết hàng";
            }
            $sanpham->save();

            $kho = Kho::where('Name', '=', $sanpham->Name)->get();
            if($kho->count() > 0){
                foreach ($kho as $items) {
                    $items->SoLuong = $sanpham->SoLuong;
                    $items->GiaTriTon = $items->SoLuong * $sanpham->GiaNhap;
                    $items->save();
                }
            }

    		$cthoadon = new CTHoaDonBan;
    		$cthoadon->SoLuong = $value->qty;
    		$cthoadon->DonGia = $value->price * $value->qty;
    		$cthoadon->id_HoaDonBan = $hoadon->id;
    		$cthoadon->id_SanPham = $value->id;
            $cthoadon->save();
    	}

    	Cart::destroy();
        if(Auth::check()){
            return redirect('myaccount/myorders')->with('thongbao', 'Tạo đơn hàng thành công hãy kiểm tra Email của bạn');
        }  
        else{
            return redirect('cart/show')->with('thongbao', 'Tạo đơn hàng thành công hãy kiểm tra Email của bạn');;
        }	
    }

    public function getBaoGia(){
        $total = Cart::total();
        $cartcontent = Cart::content();    
        return view('Frontend.Pages.baogia', ['cartcontent' => $cartcontent, 'total' => $total]);
    }

}
