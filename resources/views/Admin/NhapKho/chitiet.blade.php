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
                            <strong class="card-title">Chi tiết hóa đơn nhập</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">
                                    <form action="" method="post" novalidate="novalidate">                                
                                        <div class="form-group">
                                              <label for="cc-payment" class="control-label mb-1">Tên User</label>
                                              <input id="cc-pament" name="Name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$hdnhap->hoadonnhap_users->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Email</label>
                                            <input id="cc-pament" name="Email" type="email" class="form-control" aria-required="true" aria-invalid="false" value="{{$hdnhap->hoadonnhap_users->email}}" readonly="">
                                        </div>                                                                  
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="cc-exp" class="control-label mb-1">Tổng số sản phẩm</label>
                                                    <input id="cc-exp" name="TongSoLuong" type="number" class="form-control cc-exp" value="{{$hdnhap->TongSoLuong}}" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" autocomplete="cc-exp">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="cc-exp" class="control-label mb-1">Ngày tạo</label>
                                                    <input id="cc-exp" name="NgayTao" type="text" class="form-control cc-exp" value="{{date('d-m-Y', strtotime($hdnhap->created_at))}}" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" autocomplete="cc-exp">
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
                            @foreach ($hdnhap->hoadonnhap_cthoadonnhap as $items)          
                                <td>{{$items->cthoadonnhap_sanpham->Name}}</td>
                                <td><img width="70px" height="90px" src="{{asset('public/upload/'.$items->cthoadonnhap_sanpham->AnhChinh)}}"></td>
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
