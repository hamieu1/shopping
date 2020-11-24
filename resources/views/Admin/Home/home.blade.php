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
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            {{-- <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div> --}}


            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Tổng doanh thu</div>
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
                                <div class="stat-digit">{{$spbanduoc}}</div>
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
                                <div class="stat-digit">{{$tonghoadon}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mb-4">
                <div class="card-group">
                    <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                        <div class="card-body bg-flat-color-1">
                            <div class="h1 text-light text-right mb-4">
                                <i class="fa fa-usd"></i>
                            </div>
                            <div class="h4 mb-0 text-light">{{number_format($tongloinhuantrongngay, 0, ',', '.')}} đ</div>
                            <small class="text-light text-uppercase font-weight-bold">Lợi nhuận trong ngày</small>
                            <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                        </div>
                    </div>
                    <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                        <div class="card-body bg-flat-color-3">
                            <div class="h1 text-right mb-4">
                                <i class="fa fa-archive text-light"></i>
                            </div>
                            <div class="h4 mb-0 text-light">
                                <span class="count">{{$sanphamtrongngay}}</span>
                            </div>
                            <small class="text-light text-uppercase font-weight-bold">Sản phẩm bán trong ngày</small>
                            <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                        </div>
                    </div>
                    <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                        <div class="card-body bg-flat-color-4">
                            <div class="h1 text-right mb-4">
                                <i class="fa fa-cart-plus text-light"></i>
                            </div>
                            <div class="h4 mb-0 text-light">
                                <span class="count">{{$donhangtrongngay->Count()}}</span>
                            </div>
                            <small class="text-light text-uppercase font-weight-bold">Đơn hàng hôm nay</small>
                            <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                        </div>
                    </div>
                    <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                        <div class="card-body bg-flat-color-5">
                            <div class="h1 text-right text-light mb-4">
                                <i class="fa fa-pie-chart"></i>
                            </div>
                            <div class="h4 mb-0 text-light">
                                <span class="count">{{$hdnhaptrongngay->count()}}</span>
                            </div>
                            <small class="text-uppercase font-weight-bold text-light">Phiếu nhập hôm nay</small>
                            <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                        </div>
                    </div>
                    <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                        <div class="card-body bg-flat-color-2">
                            <div class="h1 text-right text-light mb-4">
                                <i class="fa fa-truck"></i>
                            </div>
                            <div class="h4 mb-0 text-light">
                                <span class="count">{{$sanphamnhaptrongngay}}</span>
                            </div>
                            <small class="text-uppercase font-weight-bold text-light">Sản phẩm nhập trong ngày</small>
                            <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                        </div>
                    </div>
                    <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                        <div class="card-body bg-flat-color-1">
                            <div class="h1 text-light text-right mb-4">
                                <i class="fa fa-comments-o"></i>
                            </div>
                            <div class="h4 mb-0 text-light">
                                <span class="count">{{$binhluantrongngay->count()}}</span>
                            </div>
                            <small class="text-light text-uppercase font-weight-bold">Bình luận hôm nay</small>
                            <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                        </div>
                    </div>
                </div>

            </div>
            <!--/.col-->

            {{-- <div class="col-xl-3 col-lg-6">
                <section class="card">
                    <div class="twt-feed blue-bg">
                        <div class="corner-ribon black-ribon">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <div class="fa fa-twitter wtt-mark"></div>

                        <div class="media">
                            <a href="#">
                                <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="images/admin.jpg">
                            </a>
                            <div class="media-body">
                                <h2 class="text-white display-6">Jim Doe</h2>
                                <p class="text-light">Project Manager</p>
                            </div>
                        </div>
                    </div>
                    <div class="weather-category twt-category">
                        <ul>
                            <li class="active">
                                <h5>750</h5>
                                Tweets
                            </li>
                            <li>
                                <h5>865</h5>
                                Following
                            </li>
                            <li>
                                <h5>3645</h5>
                                Followers
                            </li>
                        </ul>
                    </div>
                    <div class="twt-write col-sm-12">
                        <textarea placeholder="Write your Tweet and Enter" rows="1" class="form-control t-text-area"></textarea>
                    </div>
                    <footer class="twt-footer">
                        <a href="#"><i class="fa fa-camera"></i></a>
                        <a href="#"><i class="fa fa-map-marker"></i></a>
                        New Castle, UK
                        <span class="pull-right">
                            32
                        </span>
                    </footer>
                </section>
            </div>


            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Total Profit</div>
                                <div class="stat-digit">1,012</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">New Customer</div>
                                <div class="stat-digit">961</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Active Projects</div>
                                <div class="stat-digit">770</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card" >
                    <div class="card-header">
                        <h4>World</h4>
                    </div>
                    <div class="Vector-map-js">
                        <div id="vmap" class="vmap" style="height: 265px;"></div>
                    </div>
                </div>
                <!-- /# card -->
            </div> --}}


        </div> <!-- .content -->
@endsection