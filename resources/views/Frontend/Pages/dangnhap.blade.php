@extends('Frontend.Layout.master')
@section('content')
  <!-- end header --> 
  
  <!-- Navigation -->
  
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="account-login">
        <div class="page-title">
          <h2>Đăng nhập tài khoản</h2>
        </div>
        <fieldset>
          <div class="registered-users"><strong>Tài khoản khách hàng</strong>
            <form action="{{asset('dangnhap')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="content">
                <p>Nếu bạn đã có tài khoản của chúng tôi, vui lòng đăng nhập</p>
                <ul class="form-list">
                  <li>
                    <label for="email">Email <span class="required">*</span></label>
                    <input type="email" title="Email Address" class="input-text required-entry" id="email" name="email" placeholder="Nhập email">
                  </li>
                  <li>
                    <label for="pass">Password <span class="required">*</span></label>
                    <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" name="password" placeholder="Nhập password">
                  </li>
                </ul>
                <p class="required">* Phần bắt buộc</p>
                <div class="buttons-set">
                  <button id="send2" name="send" type="submit" class="button login"><span>Login</span></button>
                  <a class="forgot-word" href="{{asset('forgotpassword')}}">Quên mật khẩu?</a> </div>
              </div>
            </form>
          </div>
        </fieldset>
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
    </div>
  </section>
  
@endsection