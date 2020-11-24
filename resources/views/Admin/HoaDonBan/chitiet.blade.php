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
                    <div class="col-sm-12">
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
                            <strong class="card-title">Chi tiết hóa đơn</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">
                                    <form action="" method="post" novalidate="novalidate">                                
                                        <div class="form-group">
                                              <label for="cc-payment" class="control-label mb-1">Khách hàng</label>
                                              <input id="cc-pament" name="Name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$hdban->hoadonban_khachhang->Name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Email</label>
                                            <input id="cc-pament" name="Email" type="email" class="form-control" aria-required="true" aria-invalid="false" value="{{$hdban->hoadonban_khachhang->Email}}" readonly="">
                                        </div>                                                                  
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="cc-exp" class="control-label mb-1">Điện thoại</label>
                                                    <input id="cc-exp" name="DienThoai" type="number" class="form-control cc-exp" value="{{$hdban->hoadonban_khachhang->DienThoai}}" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" autocomplete="cc-exp">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="cc-exp" class="control-label mb-1">Địa chỉ</label>
                                                    <input id="cc-exp" name="DiaChi" type="text" class="form-control cc-exp" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" autocomplete="cc-exp" value="{{$hdban->hoadonban_khachhang->DiaChi}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="cc-exp" class="control-label mb-1">Mã hóa đơn</label>
                                                    <input id="cc-exp" name="MaHoaDon" type="text" class="form-control cc-exp" value="{{$hdban->id}}" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" autocomplete="cc-exp" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="cc-exp" class="control-label mb-1">Tình trạng đơn hàng</label>
                                                    <select name="TinhTrang" id="select" class="form-control">
                                                        <option value="Khởi tạo" @if ($hdban->TinhTrang == "Khởi tạo")
                                                            selected="" 
                                                        @endif>Khởi tạo</option>
                                                        <option value="Hoàn thành" @if ($hdban->TinhTrang == "Hoàn thành")
                                                            selected="" 
                                                        @endif>Hoàn thành</option>
                                                        <option value="Hủy" @if ($hdban->TinhTrang == "Hủy")
                                                            selected="" 
                                                        @endif>Hủy</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Hình thứ thanh toán</label>
                                            <input id="cc-pament" name="Payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$hdban->Payment}}">
                                        </div> 
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="cc-exp" class="control-label mb-1">Tổng số sản phẩm</label>
                                                    <input id="cc-exp" name="TongSoLuong" type="number" class="form-control cc-exp" value="{{$hdban->TongSoLuong}}" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" autocomplete="cc-exp">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="cc-exp" class="control-label mb-1">Ngày tạo</label>
                                                    <input id="cc-exp" name="NgayTao" type="text" class="form-control cc-exp" value="{{date('d-m-Y', strtotime($hdban->created_at))}}" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" autocomplete="cc-exp">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Danh sách sản phẩm</strong>
                        </div>
                        <div class="card-body">
                          <table id="bootstrap-data-table" class="table table-striped table-bordered" style="text-align: center;">
                            <thead>
                              <tr>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($hdban->hoadonban_cthoadonban as $items)          
                                <td>{{$items->cthoadonban_sanpham->Name}}</td>
                                <td><img width="70px" height="90px" src="{{asset('public/upload/'.$items->cthoadonban_sanpham->AnhChinh)}}"></td>
                                <td>{{$items->SoLuong}}</td>
                                <td>{{$items->DonGia}}</td>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                    </div> <!-- .card -->
                    </div>

                </div>


            </div><!-- .animated -->
        </div><!-- .content -->

@endsection
