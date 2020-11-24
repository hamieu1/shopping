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
                                <strong>Sửa hóa đơn</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{asset('admin/hoadonban/sua/'.$hdban->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    {{csrf_field()}}
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên khách hàng</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="Name" class="form-control" value="{{$hdban->hoadonban_khachhang->Name}}" readonly=""></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Trạng thái</label></div>
                                        <div class="col col-md-9">
                                            <div class="form-check">
                                                <div class="radio">
                                                    <label for="radio1" class="form-check-label ">
                                                        <input type="radio" id="radio1" name="TrangThai" value="Khởi tạo" class="form-check-input" @if ($hdban->TrangThai=="Khởi tạo")
                                                            checked="" 
                                                        @endif>Khởi tạo
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label for="radio2" class="form-check-label ">
                                                        <input type="radio" id="radio2" name="TrangThai" value="Hoàn thành" class="form-check-input" @if ($hdban->TrangThai=="Hoàn Thành")
                                                            checked="" 
                                                        @endif>Hoàn thành
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label for="radio3" class="form-check-label ">
                                                        <input type="radio" id="radio3" name="TrangThai" value="Hủy" class="form-check-input" @if ($hdban->TrangThai == "Hủy")
                                                            checked="" 
                                                        @endif>Hủy
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tổng tiền</label></div>
                                        <div class="col-12 col-md-9"><input type="number" id="text-input" name="TongTien" readonly="" class="form-control" value="{{$hdban->TongTien}}"></div>
                                    </div>
                                    {{-- <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nội dung</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="NhaCungCap" readonly="" class="form-control" value="{{$hdban->NoiDung}}"></div>
                                    </div> --}}
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
