@extends('Frontend.Layout.master')
@section('content')
  <!-- end header --> 
  
  <!-- Navigation -->
  
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="account-login">
        <div class="page-title">
          <h2>Quên mật khẩu</h2>
        </div>
        <fieldset>
          <form action="{{asset('forgotpassword')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="registered-users">
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
              <div class="content">
                <p>Nhập địa chỉ Email của bạn</p>
                <ul class="form-list">
                  
                  <li>
                    <label for="pass">Email <span class="required">*</span></label>
                    <input type="email" title="Email" id="pass" class="input-text required-entry validate-password" name="Email" placeholder="Nhập Email của bạn">
                  </li>
                </ul>
                
                <div class="buttons-set">
                  <button id="send2" name="send" type="submit" class="button login"><span>Reset my Password</span></button>
                   </div>
              </div>
            </div>
          </form>
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
  