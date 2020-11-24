<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('admin/login', 'UsersController@getLoginAdmin');
Route::post('admin/login', 'UsersController@postLoginAdmin');
Route::get('admin/logout', 'UsersController@getLogoutAdmin');

Route::get('/', 'HomeController@getHome');
Route::get('products-detail/{TenKhongDau}/{id}.html', 'HomeController@getProductsDetail');
Route::get('category/{TenKhongDau}/{id}.html', 'HomeController@getCategory');
Route::group(['prefix' => 'thoitrangnam'], function() {
    Route::get('{sortnew}/{id}.html', 'HomeController@getDanhMuc');
});
Route::group(['prefix' => 'thoitrangnu'], function() {
    Route::get('{sortnew}/{id}.html', 'HomeController@getDanhMuc');
});

Route::get('livesearch', 'HomeController@getLiveSearch');
Route::get('search', 'HomeController@getSearch');

Route::post('comments/{id}', 'HomeController@postComments');

Route::get('myaccount', 'HomeController@getMyAccount');
Route::group(['prefix' => 'myaccount'], function() {
    Route::get('myorders', 'HomeController@getMyOrders');
    Route::get('vieworders/{id}', 'HomeController@getViewOrders');
    Route::get('myinfor', 'HomeController@getMyInfor');
    Route::post('doimatkhau', 'HomeController@postDoiMatKhau');
    Route::get('inhoadon/{id}', 'HomeController@getInHoaDon');
});

Route::group(['prefix' => 'cart'], function() {
    Route::get('add/{id}', 'CartController@getAddCart');

    Route::get('show', 'CartController@getShowCart');

    Route::get('delete/{rowId}' ,'CartController@getDeleteCart');

    Route::get('update', 'CartController@getUpdateCart');

    Route::post('thanhtoan', 'CartController@postThanhToanCart');

    Route::get('thanhcong', 'CartController@getThanhCong');

    Route::post('email', 'CartController@getEmail');

    Route::get('destroy', 'CartController@getDestroyCart');

    Route::get('baogia', 'CartController@getBaoGia');
});

Route::get('dangnhap', 'HomeController@getDangNhap');
Route::post('dangnhap', 'HomeController@postDangNhap');

Route::get('dangky', 'HomeController@getDangKy');
Route::post('dangky', 'HomeController@postDangKy');

Route::get('dangxuat', 'HomeController@getDangXuat');

Route::get('forgotpassword', 'HomeController@getQuenMK');
Route::post('forgotpassword', 'HomeController@postLayMK');

Route::get('admin', 'HomeAdminController@getHomeAdmin');
Route::group(['prefix' => 'admin', 'middleware' => 'adminlogin'], function() {
    Route::group(['prefix' => 'loaisanpham'], function() {
        Route::get('danhsach', 'LoaiSanPhamController@getDanhSach');

        Route::get('them', 'LoaiSanPhamController@getThem');
        Route::post('them', 'LoaiSanPhamController@postThem');

        Route::get('sua/{id}', 'LoaiSanPhamController@getSua');
        Route::post('sua/{id}', 'LoaiSanPhamController@postSua');

        Route::get('xoa/{id}', 'LoaiSanPhamController@getXoa');
    });

    Route::group(['prefix' => 'sanpham'], function() {
        Route::get('danhsach', 'SanPhamController@getDanhSach');

        Route::get('them', 'SanPhamController@getThem');
        Route::post('them', 'SanPhamController@postThem');

        Route::get('sua/{id}', 'SanPhamController@getSua');
        Route::post('sua/{id}', 'SanPhamController@postSua');

        Route::get('xoa/{id}', 'SanPhamController@getXoa');
    });

    Route::group(['prefix' => 'kho'], function() {
        Route::get('danhsach', 'KhoController@getDanhSach');

        Route::get('them', 'KhoController@getThem');
        Route::post('them', 'KhoController@postThem');

        Route::get('sua/{id}', 'KhoController@getSua');
        Route::post('sua/{id}', 'KhoController@postSua');

        Route::get('xoa/{id}', 'KhoController@getXoa');
    });

    Route::group(['prefix' => 'hoadonban'], function() {
        Route::get('danhsach', 'HoaDonBanController@getDanhSach');

        Route::get('sua/{id}', 'HoaDonBanController@getSua');
        Route::post('sua/{id}', 'HoaDonBanController@postSua');

        Route::get('xoa/{id}', 'HoaDonBanController@getXoa');

        Route::get('chitiet/{id}', 'HoaDonBanController@getChiTiet');
    });

    Route::group(['prefix' => 'khachhang'], function() {
        Route::get('danhsach', 'KhachHangController@getDanhSach');

        Route::get('them', 'KhachHangController@getThem');
        Route::post('them', 'KhachHangController@postThem');

        Route::get('sua/{id}', 'KhachHangController@getSua');
        Route::post('sua/{id}', 'KhachHangController@postSua');

        Route::get('xoa/{id}', 'KhachHangController@getXoa');
    });

    Route::group(['prefix' => 'users'], function() {
        Route::get('danhsach', 'UsersController@getDanhSach');

        Route::get('them', 'UsersController@getThem');
        Route::post('them', 'UsersController@postThem');

        Route::get('sua/{id}', 'UsersController@getSua');
        Route::post('sua/{id}', 'UsersController@postSua');

        Route::get('xoa/{id}', 'UsersController@getXoa');

        Route::get('info', 'UsersController@getInfo');
    });

    Route::group(['prefix' => 'nhapkho'], function() {       
        Route::get('them', 'NhapKhoController@getThemPhieuNhap');
        Route::get('livesearch', 'NhapKhoController@getLiveSearch');

        Route::get('add/{id}', 'NhapKhoController@addPhieuNhap');

        Route::get('delete/{id}', 'NhapKhoController@xoaPhieuNhap');

        Route::get('save', 'NhapKhoController@savePhieuNhap');

        Route::get('update', 'NhapKhoController@updatePhieuNhap');

        Route::get('danhsach', 'NhapKhoController@getDanhSach');

        Route::get('chitiet/{id}', 'NhapKhoController@getChiTiet');
    });

    Route::group(['prefix' => 'kho'], function() {
        Route::get('danhsach', 'KhoController@getDanhSach');

        Route::get('them', 'KhoController@getThem');
        Route::post('them', 'KhoController@postThem');

        Route::get('sua/{id}', 'KhoController@getSua');
        Route::post('sua/{id}', 'KhoController@postSua');

        Route::get('xoa/{id}', 'KhoController@getXoa');
    });

    Route::group(['prefix' => 'ajax'], function() {
        Route::get('loaisanpham/{idDanhMuc}', 'AjaxController@getLoaiSanPham');     
    });

    Route::group(['prefix' => 'thongke'], function() {
        Route::get('loinhuan', 'ThongKeController@getLoiNhuan');
        Route::post('loinhuantheongay', 'ThongKeController@postLoiNhuanTheoNgay');
        Route::get('loinhuanall', 'ThongKeController@getLoiNhuanAll');

        Route::get('sanphambanchay', 'ThongKeController@getSanphamBanChay');

        Route::post('sanphamtk', 'ThongKeController@postSanPhamThongKe');

        Route::get('hoadon', 'ThongKeController@getHoaDonTK');
        Route::post('hoadontheongay', 'ThongKeController@getHoaDonTheoNgay');
        Route::get('hoadonall', 'ThongKeController@getHoaDonAll');
    });

    Route::group(['prefix' => 'test'], function() {
        Route::get('danhsach', 'TestController@getDanhSach');
        Route::get('pagination', 'TestController@fetch_data');
        Route::post('themajax', 'TestController@postThemAjax');
    });
});
