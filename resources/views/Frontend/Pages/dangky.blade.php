@extends('Frontend.Layout.master')
@section('content')
  <!-- end header --> 
  
  <!-- Navigation -->
  
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="account-login">
        <div class="page-title">
          <h2>Tạo tài khoản</h2>
        </div>
        <fieldset>
          @if (session('thongbao'))
              <div class="alert alert-success">
                  {{session('thongbao')}}
              </div>
          @endif
          @if (count($errors) > 0)
              <div class="alert alert-danger">
                  @foreach ($errors->all() as $err)
                      {{$err}}<br>
                  @endforeach
              </div>  
          @endif
          <div class="registered-users"><strong>Đăng ký tài khoản</strong>
            <form action="{{asset('dangky')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="content">
                <p>Nếu bạn chưa có tài khoản hãy đăng ký</p>
                <ul class="form-list">
                  <li>
                    <label for="name">Tên <span class="required">*</span></label>
                    <input type="text" title="Name" class="input-text required-entry" id="name" name="Name" placeholder="Nhập tên của bạn">
                  </li>
                  <li>
                    <label for="email">Email <span class="required">*</span></label>
                    <input type="email" title="Email Address" class="input-text required-entry" id="email" name="Email" placeholder="Nhập email">
                  </li>
                  <li>
                    <label for="pass">Password <span class="required">*</span></label>
                    <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" name="Password" placeholder="Nhập password">
                  </li>
                  <li>
                    <label for="pass">Nhập lại Password <span class="required">*</span></label>
                    <input type="password" title="PasswordAgain" id="pass" class="input-text required-entry validate-password" name="PasswordAgain" placeholder="Nhập lại password">
                  </li>
                  <li>
                    <label for="dienthoai">Điện thoai <span class="required">*</span></label>
                    <input type="number" title="Email Address" class="input-text required-entry" id="email" name="DienThoai" placeholder="Nhập số điện thoại">
                  </li>
                </ul>
                <p class="required">* Phần bắt buộc</p>
                <div class="buttons-set">
                  <button id="send2" name="send" type="submit" class="button login"><span>Tạo tài khoản</span></button>                
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