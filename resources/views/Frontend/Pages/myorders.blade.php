@extends('Frontend.Layout.master')
@section('content')
  <!-- end header --> 
  
  <!-- main-container -->
  <div class="main-container col2-right-layout">
    <div class="main container">
      <div class="row">
        <section class="col-sm-12 col-xs-12">
          @if (session('thongbao'))
              <div class="alert alert-success">
                  {{session('thongbao')}}
              </div>
          @endif
          @if (session('loi'))
              <div class="alert alert-danger">
                  {{session('loi')}}
              </div>
          @endif
          @if (count($errors) > 0)
              <div class="alert alert-danger">
                  @foreach ($errors->all() as $err)
                      {{$err}}<br>
                  @endforeach
              </div>  
          @endif
          <div class="col-main">
            <div class="my-account">
              <div class="page-title">
                <h2>My Orders</h2>
              </div>
              <div class="dashboard">
                <div class="recent-orders">
                  <div class="table-responsive">
                    <table class="table table-striped table-responsive table-bordered text-left my-orders-table">
                      <thead>
                        <tr class="first last">
                          <th>Id</th>
                          <th>Ngày tạo</th>
                          <th>Người nhận</th>
                          <th>Số lượng</th>
                          <th>Tổng tiền</th>
                          <th>Trạng thái</th>
                          <th class="text-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($hdban as $items)                     
                        <tr>
                          <td>{{$items->id}}</td>
                          <td>{{date('d-m-Y', strtotime($items->created_at))}}</td>
                          <td>{{$items->hoadonban_users->name}}</td>
                          <td>{{$items->TongSoLuong}}</td>
                          <td><span class="price">{{number_format($items->TongTien, 0, ',', '.')}} đ</span></td>
                          <td>{{$items->TrangThai}}</td>
                          <td class="text-center last"><div class="btn-group"> <a href="{{asset('myaccount/vieworders/'.$items->id)}}" class="btn btn-view-order">View Order</a></div></td>
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