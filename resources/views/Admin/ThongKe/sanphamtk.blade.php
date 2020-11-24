@extends('Admin.Layout.master')
@section('content')
        <div class="breadcrumbs">
            <div class="col-sm-6">
                <div class="page-header float-left">
                    <div class="page-title">
                      <h1>Sản phẩm bán chạy nhất</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Thống kê sản phẩm bán chạy nhất</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Danh sách</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
        	{{-- <div class="col-xl-3 col-lg-6">
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
            </div> --}}
            <div style="margin-bottom: 20px;">
              <form method="post" action="{{asset('admin/thongke/sanphamtk')}}">
                {{csrf_field()}}
                <span>Chọn loại cần xem: &nbsp;</span>
                <select style="border: 1px solid #ced4da; border-radius: .25rem; padding: .375rem .75rem; font-size: 1rem;" name="Loai">
                    <option value="banchay" @if (isset($spbanchay))
                        selected="" 
                    @endif>Sản phẩm bán chạy nhất</option>
                    <option value="tonkho" @if (isset($sptonkho))
                        selected="" 
                    @endif>Sản phẩm tồn kho</option>
                    {{-- <option value="3">Sản phẩm đánh giá cao nhất</option> --}}
                </select>
                <button type="submit" class="btn btn-outline-primary" style="margin-bottom: 4px; margin-left: 20px;"><i class="fa fa-search"></i>&nbsp; Xem</button>
                <a href="{{asset('admin/thongke/danhsachall')}}"><button type="button" class="btn btn-secondary" style="margin-bottom: 4px; margin-left: 20px;"><i class="fa fa-lightbulb-o"></i>&nbsp; Xem tất cả</button></a>
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
                            <strong class="card-title">Stripped Table</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Số lượng đã bán</th>
                                    <th scope="col">Lợi nhuận thu được</th>
                                    <th scope="col">Tồn kho</th>
                                </tr>
                              </thead>
                              <tbody>
                        @if (isset($spbanchay))                         
                            @foreach ($spbanchay as $items)                             
                                <tr>
                                    <th scope="row">{{$items->id}}</th>
                                    <td>{{$items->Name}}</td>
                                    <td><img width="100px" height="120px" src="{{asset('public/upload/'.$items->AnhChinh)}}"></td>
                                    <td>{{$items->SoLuongDaBan}}</td>
                                    <td>{{number_format($items->SoLuongDaBan * $items->GiaKhuyenMai - $items->SoLuongDaBan * $items->GiaNhap, 0, ',', '.')}} đ</td>
                                    <td>{{$items->SoLuong}}</td>
                                </tr>
                            @endforeach
                        @elseif(isset($sptonkho))
                            @foreach ($sptonkho as $items)                             
                                <tr>
                                    <th scope="row">{{$items->id}}</th>
                                    <td>{{$items->Name}}</td>
                                    <td><img width="100px" height="120px" src="{{asset('public/upload/'.$items->AnhChinh)}}"></td>
                                    <td>{{$items->SoLuongDaBan}}</td>
                                    <td>{{number_format($items->SoLuongDaBan * $items->GiaKhuyenMai - $items->SoLuongDaBan * $items->GiaNhap, 0, ',', '.')}} đ</td>
                                    <td>{{$items->SoLuong}}</td>
                                </tr>
                            @endforeach
                        @endif
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
      
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
@endsection
