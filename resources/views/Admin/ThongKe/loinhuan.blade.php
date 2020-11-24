@extends('Admin.Layout.master')
@section('content')
        <div class="breadcrumbs">
            <div class="col-sm-6">
                <div class="page-header float-left">
                    <div class="page-title">
                      @if (isset($ngay))
                        <h1>Thống kê sản phẩm đã bán đã bán trong ngày {{date("d-m-Y", strtotime($ngay))}}</h1>
                      @elseif(isset($ngaydau))
                      	<h1>Thống kê sản phẩm đã bán đã bán từ ngày {{date("d-m-Y", strtotime($ngaydau))}} đến {{date("d-m-Y", strtotime($ngaycuoi))}}</h1>
                      @else
                        <h1>Thống kê tất cả sản phẩm đã bán</h1>
                      @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Thống kê sản phẩm</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Danh sách</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
        	<div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Doanh thu</div>
                                <div class="stat-digit">{{number_format($tongloinhuan, 0, ',', '.')}} đ</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Sản phẩm bán được</div>
                                <div class="stat-digit">{{$sanphambanduoc}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Khách hàng</div>
                                <div class="stat-digit">{{$tongkhachhang}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-link text-danger border-danger"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Đơn hàng</div>
                                <div class="stat-digit">{{$tonghd}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin-bottom: 20px;">
              <form method="post" action="{{asset('admin/thongke/loinhuantheongay')}}">
                {{csrf_field()}}
                <span>Từ ngày: &nbsp;</span>
                <input style="border: 1px solid #ced4da; border-radius: .25rem; padding: .375rem .75rem; font-size: 1rem;" type="date" name="NgayDau" @if (isset($ngaydau))
                	value="{{$ngaydau}}" 
                @endif>
                <span>&nbsp;&nbsp;&nbsp;Đến ngày: &nbsp;</span>
                <input style="border: 1px solid #ced4da; border-radius: .25rem; padding: .375rem .75rem; font-size: 1rem;" type="date" name="NgayCuoi" @if (isset($ngaycuoi))
                	value="{{$ngaycuoi}}"
                @endif>
                <label for="checkbox1" class="form-check-label " style="margin-left: 30px;">
                    <input type="checkbox" id="checkbox1" name="TaoBaoCao" value="on" class="form-check-input">Tạo báo cáo
                </label>
                <button type="submit" class="btn btn-outline-primary" style="margin-bottom: 4px; margin-left: 20px;"><i class="fa fa-search"></i>&nbsp; Tìm kiếm</button>
                <button type="submit" class="btn btn-outline-primary" style="margin-bottom: 4px; margin-left: 20px;"><i class="fa fa-search"></i>&nbsp; Tạo báo cáo</button>
                <a href="{{asset('admin/thongke/loinhuanall')}}"><button type="button" class="btn btn-secondary" style="margin-bottom: 4px; margin-left: 20px;"><i class="fa fa-lightbulb-o"></i>&nbsp; Xem tất cả</button></a>
              </form>
            </div>
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    @if (session('thongbao'))
                      <div class="alert alert-success">
                          {{session('thongbao')}}
                      </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                        </div>
                        <div class="card-body">
                          <table id="bootstrap-data-table" class="table table-striped table-bordered" style="text-align: center;">
                            <thead>
                              <tr>
                                <th>Id</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Ngày bán</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th>Tiền lãi</th>
                                <th>Tồn kho</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $items)
                              <tr>
                                <td>{{$items->id}}</td>
                                <td>{{$items->cthoadonban_sanpham->Name}}</td>
                                <td><img width="100px" height="120px" src="{{asset('public/upload/'.$items->cthoadonban_sanpham->AnhChinh)}}"></td>
                                <td>{{date('d-m-Y', strtotime($items->created_at))}}</td>
                                <td>{{$items->SoLuong}}</td>
                                <td>{{number_format($items->DonGia, 0, ',' ,'.')}} đ</td>
                                <td>{{($items->cthoadonban_sanpham->GiaKhuyenMai * $items->SoLuong) - ($items->cthoadonban_sanpham->GiaNhap * $items->SoLuong)}} đ</td>
                                <td>{{$items->cthoadonban_sanpham->SoLuong}}</td>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
      
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
@endsection
