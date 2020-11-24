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
          @elseif(session('loi'))
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
                <h2>Chỉnh sửa thông tin tài khoản</h2>
              </div>
            <form action="{{asset('myaccount/doimatkhau')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="row">
                <div class="col-sm-6 col-md-6 col-xs-12">
                  <div class="title-box">
                    <h3>Thông tin tài khoản</h3>
                  </div>
                  <ul class="list-unstyled">
                    <li>
                      <div class="form-group">
                        <label for="fname">Tên <span class="required">*</span></label>
                        <input type="text" name="Name" id="fname" class="form-control" value="{{Auth::user()->name}}">
                      </div>
                      <div class="form-group">
                        <label for="emailAddress">Email <span class="required">*</span></label>
                        <input type="email" name="Email" id="emailAddress" class="form-control" value="{{Auth::user()->email}}">
                      </div>
                    </li>
                    <li>
                      <div class="form-group">
                        <label for="fname">Số điện thoại <span class="required">*</span></label>
                        <input type="text" name="SDT" id="fname" class="form-control" value="{{Auth::user()->dienthoai}}">
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                  <div class="title-box">
                    <h3>Đổi mật khẩu</h3>
                  </div>
                  <ul class="list-unstyled">
                    <li>
                      <div class="form-group">
                        <label for="cpassword">Mật khẩu hiện tại <span class="required">*</span></label>
                        <input type="password" name="PasswordCurrent" id="cpassword" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="npassword">Mật khẩu mới <span class="required">*</span></label>
                        <input type="password" name="NewPassword" id="npassword" class="form-control">
                      </div>
                    </li>
                    <li>
                      <div class="form-group">
                        <label for="cnewpassword">Nhập lại mật khẩu mới <span class="required">*</span></label>
                        <input type="password" name="PasswordAgain" id="cnewpassword" class="form-control">
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="buttons-set">
                <button id="send2" name="send" type="submit" class="button login"><span>Save</span></button>
                <span class="required pull-right"><b>*</b> Required Field</span> </div>
            </form>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!--End main-container --> 
  
@endsection