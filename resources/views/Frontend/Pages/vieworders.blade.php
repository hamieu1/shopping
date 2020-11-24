@extends('Frontend.Layout.master')
@section('content')
  <!-- end header --> 
  
  <!-- main-container -->
  <div class="main-container col2-right-layout">
    <div class="main container">
      <div class="row">
        <section class="col-sm-12 col-xs-12">
          <div class="col-main">
            <div class="my-account">
              <div class="page-title">
                <h2>Orders detail</h2>
              </div>
              <div class="dashboard">
                <div class="recent-orders">
                  <div class="table-responsive">
                    <table class="table table-striped table-responsive table-bordered text-left my-orders-table">
                      <thead>
                        <tr class="first last">
                          <th>Id</th>
                          <th>Sản phẩm</th>
                          <th>Ảnh</th>
                          <th>Đơn giá</th>
                          <th>Số lượng</th>
                          <th>Thành tiền</th>
                          <th class="text-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($cthdban as $items)                     
                        <tr>
                          <td class="text-center last">{{$items->id}}</td>
                          <td class="text-center last">{{$items->cthoadonban_sanpham->Name}}</td>
                          <td class="text-center last"><img width="100px" height="120px" src="{{asset('public/upload/'.$items->cthoadonban_sanpham->AnhChinh)}}"></td>
                          <td class="text-center last">{{number_format($items->cthoadonban_sanpham->GiaKhuyenMai, 0, ',', '.')}} đ</td>
                          <td class="text-center last">{{$items->SoLuong}}</td>
                          <td class="text-center last"><span class="price">{{number_format($items->DonGia, 0, ',', '.')}} đ</span></td>                        
                          <td class="text-center last"><div class="btn-group"> <a href="{{asset('myaccount/inhoadon/'.$hoadon->id)}}" class="btn btn-view-order">In hóa đơn</a></div></td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!--End main-container --> 
  
  <!-- Footer -->
@endsection