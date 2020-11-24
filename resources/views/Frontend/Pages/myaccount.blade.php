@extends('Frontend.Layout.master')
@section('content')
  <!-- end header --> 
  
  <!-- Navigation -->
  
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="account-login">
        <div class="page-title">
          <h2>My Account</h2>
        </div>
        <div class="my-account-page">
          <div class="row">
            <div class="col-sm-4 col-md-4 col-xs-12"> <a href="{{asset('myaccount/myorders')}}">
              <div class="account-box">
                <div class="service-box">
                  <div class="service-icon"> <i class="fa fa-gift"></i> </div>
                  <div class="service-desc">
                    <h4>My Orders</h4>
                    <p>Thông tin lịch sử đơn hàng</p>
                  </div>
                </div>
              </div>
              </a> </div>
            <div class="col-sm-4 col-md-4 col-xs-12"> <a href="{{asset('myaccount/myinfor')}}">
              <div class="account-box">
                <div class="service-box">
                  <div class="service-icon"> <i class="fa fa-lock"></i> </div>
                  <div class="service-desc">
                    <h4>Tài khoản</h4>
                    <p>Chỉnh sửa thông tin tài khoản</p>
                  </div>
                </div>
              </div>
              </a> </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
@endsection