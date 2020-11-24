@extends('Admin.Layout.master')
@section('content')
        <div class="breadcrumbs">
            <div class="col-sm-6">
                <div class="page-header float-left">
                    <div class="page-title">
                      @if (isset($ngay))
                        <h1>Thống kê đơn hàng trong ngày {{date("d-m-Y", strtotime($ngay))}}</h1>
                      @elseif(isset($ngaydau))
                      	<h1>Thống kê đơn hàng từ ngày {{date("d-m-Y", strtotime($ngaydau))}} đến {{date("d-m-Y", strtotime($ngaycuoi))}}</h1>
                      @else
                        <h1>Thống kê tất cả các đơn hàng</h1>
                      @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Thống kê đơn hàng</a></li>
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
                                <div class="stat-text">Tổng đơn hàng</div>
                                <div class="stat-digit">{{$hdban->count()}}</div>
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
                                <div class="stat-text">Khởi tạo</div>
                                <div class="stat-digit">{{$hdban->where('TrangThai', '=', 'Khởi tạo')->count()}}</div>
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
                                <div class="stat-text">Đơn hủy</div>
                                <div class="stat-digit">{{$hdban->where('TrangThai', '=', 'Hủy')->count()}}</div>
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
                                <div class="stat-text">Hoàn thành</div>
                                <div class="stat-digit">{{$hdban->where('TrangThai', '=', 'Hoàn thành')->count()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin-bottom: 20px;">
              <form method="post" action="{{asset('admin/thongke/hoadontheongay')}}">
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
                <a href="{{asset('admin/thongke/hoadonall')}}"><button type="button" class="btn btn-secondary" style="margin-bottom: 4px; margin-left: 20px;"><i class="fa fa-lightbulb-o"></i>&nbsp; Xem tất cả</button></a>
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
                                <th>Mã đơn hàng</th>
                                <th>Ngày tạo</th>
                                <th>Khách hàng</th>
                                <th>Trạng thái</th>
                                <th>Tổng tiền</th>
                                <th>Hình thức thanh toán</th>
                                <th>Xem chi tiết</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($hdban as $hd)
                              <tr>
                                <td>{{$hd->id}}</td>
                                <td>{{date('d-m-Y', strtotime($hd->created_at))}}</td>
                                <td>{{$hd->hoadonban_khachhang->Name}}</td>
                              @if ($hd->TrangThai == "Khởi tạo")
                                <td><span class="badge badge-warning">{{$hd->TrangThai}}</span></td>
                              @elseif ($hd->TrangThai == "Hoàn thành")
                                <td><span class="badge badge-success">{{$hd->TrangThai}}</span></td>
                              @else 
                                <td><span class="badge badge-danger">{{$hd->TrangThai}}</span></td>
                              @endif            
                                <td>{{number_format($hd->TongTien, 0, ',', '.')}} đ</td>
                                <td>{{$hd->Payment}}</td>
                                <td><a href="{{asset('admin/hoadonban/chitiet/'.$hd->id)}}"><button type="button" class="btn btn-primary"><i class="fa fa-user-md"></i>&nbsp;Xem chi tiết</button></a></td>
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
