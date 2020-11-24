<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0053)https://www.hanoicomputer.vn/print/user.php?view=cart -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Báo giá sản phẩm Công ty thời trang Đào Minh Hà</title>
    
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="revisit-after" content="2 days">
    <meta name="ROBOTS" content="INDEX, FOLLOW">
    <meta name="author" content="CÔNG TY MÁY TÍNH HÀ NỘI">
    <meta name="distribution" content="global">
    <meta name="Copyright" content="www.hanoicomputer.vn">
  	<link rel="stylesheet" href="./Báo giá sản phẩm Công ty máy tính Hà Nội_files/style.css" type="text/css">
    <style>
        .list_table {
            border-collapse:collapse;
        }
        .list_table td{border:solid 1px #aaa; padding:5px; text-algin:center; vertical-align:middle;}
        .cart_first_tr {
            background-color:#cccccc;
        }
        BODY, FORM, TABLE, TD, SPAN, DIV {
            font-family: Arial, Helvetica, sans-serif;
            font-size:12px;
        }
        .title a {
            color:#0000FF;
            font-family:Arial, Helvetica, sans-serif;
            font-size:12px;
            text-decoration:none;
        }
        .title a:hover {
            color:#0000FF;
            text-decoration:underline;
        }
    </style>
  	<style>body{background:url(/template/default/images/bg_logo.png) center center no-repeat fixed #fff;}</style>
</head>
<body>
<div style="width: 700px;margin: 0 auto;">
<table width="700">
    <tbody><tr>
        <td colspan="3" valign="top">
            <img src="./Báo giá sản phẩm Công ty máy tính Hà Nội_files/logo_logo_logo hnc2.png" alt="">
        </td>
        <td colspan="5" align="right" style="line-height: 19px; text-align: center;">
            <b style="color: #e51f28;font-size: 20px;">CÔNG TY CỔ PHẦN THỜI TRANG ĐÀO MINH HÀ</b><br>
            Trụ sở chính: Long Biên, Hà Nội <br>
            Phường Đức Giang <br>
            Hotline: 0868928495 * Website: webkhoaluan.daominhha.com     
        </td>
    </tr>
    <tr><td colspan="8"></td></tr>
    <tr>
        <td colspan="8" style="border-top: 4px double #ccc;;font-size:21px; font-weight:bold; text-align:center; padding:15px 0;">BẢNG BÁO CÁO LỢI NHUẬN</td>
    </tr>
</tbody></table>
  <table><tbody><tr><td colspan="8">&nbsp;</td></tr></tbody></table>
  <table width="700">
    <tbody><tr>
      <td colspan="5" align="left"></td>
      <td colspan="3" align="right">
        Thời gian: @if (isset($ngay))
                        {{date("d-m-Y", strtotime($ngay))}}
                      @elseif(isset($ngaydau))
                        Từ {{date("d-m-Y", strtotime($ngaydau))}} đến {{date("d-m-Y", strtotime($ngaycuoi))}}</h1>
                      @else
                        Thống kê tất cả sản phẩm đã bán
                      @endif</span>
      </td>
    </tr>
    <tr>
      <td colspan="5" align="left"></td>
      <td colspan="3" align="right">
        <i>Đơn vị tính: VNĐ</i>
      </td>
    </tr>
  </tbody></table>  

    <div style="padding: 10px;"></div>
<table class="list_table" width="700">
    <tbody><tr style="color: #ffffff; background-color:#e00;">
        <td> <strong>Id</strong></td>
        <td> <strong>Hình ảnh </strong></td>
        <td colspan="2"> <strong>Tên sản phẩm </strong></td>
        <td> <strong>Ngày bán </strong></td>
        <td> <strong>Số lượng </strong></td>  
        <td> <strong>Thành tiền </strong></td>   
        <td> <strong>Tiền lãi </strong></td>  
        <td> <strong>Tồn kho </strong></td> 
        
    </tr>
    <!---->
    
        <!---->
      @foreach ($data as $items)
        <tr valign="middle">
            <td>{{$items->id}}</td>
            <td><img width="100px" height="120px" src="{{asset('public/upload/'.$items->cthoadonban_sanpham->AnhChinh)}}"></td>
            <td colspan="2">{{$items->cthoadonban_sanpham->Name}}</td>
            <td align="center">{{date('d-m-Y', strtotime($items->created_at))}}</td>
            <td align="center">{{$items->SoLuong}}</td>
            <td align="center">{{number_format($items->DonGia, 0, ',' ,'.')}} đ</td>
            <td align="center">{{($items->cthoadonban_sanpham->GiaKhuyenMai * $items->SoLuong) - ($items->cthoadonban_sanpham->GiaNhap * $items->SoLuong)}} đ</td>            
            <td align="center">{{$items->cthoadonban_sanpham->SoLuong}}</td>
        </tr>
      @endforeach
    
  {{-- <tr>
    <td colspan="7"></td>
    <td colspan="2" style="background:#b8cce4;">Phí vận chuyển</td>
    <td style="background:#b8cce4;">0</td>
  </tr>
  <tr>
    <td colspan="7"></td>
    <td colspan="2" style="background:#b8cce4;">Chi phí khác</td>
    <td style="background:#b8cce4;">0</td>
  </tr>
  <tr>
    <td colspan="7"></td>
    <td colspan="2" style="background:#b8cce4;">Tổng tiền đơn hàng</td>
    <td style="background:#b8cce4;"> đ</td>
  </tr> --}}
</tbody></table>

  
  
<div style="text-align: center;padding: 20px 0;">
    <a href="https://www.hanoicomputer.vn/gio-hang" class="btn_cyan" style="width:100px; display:inline-block;">trở về</a>
    <a href="javascript:window.print()" style="width:100px;display:inline-block;" class="btn_orange">In báo cáo</a>
</div>

  
<table><tbody><tr><td colspan="8">&nbsp;</td></tr></tbody></table>

</div>

</body></html>