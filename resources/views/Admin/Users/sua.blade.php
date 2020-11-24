@extends('Admin.Layout.master')
@section('content')
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Forms</a></li>
                            <li class="active">Basic</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-sm-8">
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
                        <div class="card">
                            <div class="card-header">
                                <strong>Sửa thông tin User</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{asset('admin/users/sua/'.$users->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    {{csrf_field()}}
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên User</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="Name" placeholder="Nhập tên User" class="form-control" value="{{$users->name}}"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email</label></div>
                                        <div class="col-12 col-md-9"><input type="email" id="email-input" name="Email" placeholder="Nhập email" class="form-control" value="{{$users->email}}" readonly=""></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Đổi password</label></div>
                                        <div class="col col-md-9">
                                            <div class="form-check">
                                                <div class="checkbox">
                                                    <label for="checkbox1" class="form-check-label ">
                                                        <input type="checkbox" id="checkbox1" name="changePassword" value="option1" class="form-check-input">Đổi passwrod
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Password mới</label></div>
                                        <div class="col-12 col-md-9"><input type="password" id="Pass" name="Password" placeholder="Nhập password" class="form-control" disabled=""></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nhập lại Password</label></div>
                                        <div class="col-12 col-md-9"><input type="password" id="changePass" name="PasswordAgain" placeholder="Nhập password" class="form-control" disabled=""></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Quyền</label></div>
                                        <div class="col col-md-9">
                                            <div class="form-check">
                                                <div class="radio">
                                                    <label for="radio1" class="form-check-label ">
                                                        <input type="radio" id="radio1" name="Level" value="1" class="form-check-input" @if ($users->level == 1)
                                                            checked="" 
                                                        @endif>Admin
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label for="radio2" class="form-check-label ">
                                                        <input type="radio" id="radio2" name="Level" value="2" class="form-check-input" @if ($users->level == 2)
                                                            checked="" 
                                                        @endif>Bán hàng
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label for="radio3" class="form-check-label ">
                                                        <input type="radio" id="radio3" name="Level" value="3" class="form-check-input" @if ($users->level == 3)
                                                            checked="" 
                                                        @endif>Thủ kho
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label for="radio4" class="form-check-label ">
                                                        <input type="radio" id="radio4" name="Level" value="4" class="form-check-input" @if ($users->level > 3)
                                                            checked="" 
                                                        @endif>Khách hàng
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Điện thoại</label></div>
                                        <div class="col-12 col-md-9"><input type="number" id="text-input" name="DienThoai" placeholder="Nhập số điện thoại" class="form-control" value="{{$users->dienthoai}}"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Avatar</label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="HinhAnh" class="form-control-file">
                                            <br>
                                            <img width="200px" height="130px" src="{{asset('public/upload/'.$users->hinhanh)}}">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Sửa
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>

                </div>


            </div><!-- .animated -->
        </div><!-- .content -->

@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#checkbox1').change(function(event) {
                if($(this).is(':checked')){
                    $('#Pass').removeAttr('disabled');
                    $('#changePass').removeAttr('disabled');
                }
                else{
                    $('#Pass').attr('disabled', '');
                    $('#changePass').attr('disabled', '');
                }
            });
        });
    </script>
@endsection
