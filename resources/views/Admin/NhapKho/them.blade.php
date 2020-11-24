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
                            <li><a href="#">Tạo phiếu nhập</a></li>
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
                                <strong>Tạo phiếu nhập</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-12">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-primary">
                                                        <i class="fa fa-search"></i> Search
                                                    </button>
                                                </div>
                                                <input type="text" id="thanh-search" name="input1-group2" placeholder="Nhập tên sản phẩm" class="form-control"> 
                                            </div>
                                            <div id="search-data">
                                                {{-- <div class="show-search">
                                                    <ul>
                                                        <li>
                                                            <img src="upload/9SBM_AK190007-1.jpg" width="60px" height="80px">
                                                            <p>asdasdasdasdas</p>
                                                            <a href=""><button type="button" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Thêm</button></a>
                                                            <div style="clear: both;"></div>
                                                        </li>                                                                                                                                                      
                                                    </ul>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>                                   
                                </form>
                            </div>                       
                        </div>
                    @if (isset($phieunhap))                      
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Chi tiết phiếu nhập</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Giá nhập</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Thành tiền</th>
                                            <th scope="col">Xử lý</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($phieunhap->items as $k => $data)                                       
                                        <tr>
                                            <th scope="row">{{$k}}</th>
                                            <td>{{$data['name']}}</td>
                                            <td>{{number_format($data['price'])}} đ</td>
                                            <td><input type="number" style="text-align: center; width: 80px; height: 40px; border: 1px #e5e5e5 solid;" name="qty" value="{{$data['qty']}}" onchange="updateCart(this.value, '{{$data['id']}}')"></td>
                                            <td>{{number_format($data['qty'] * $data['price'], 0, ',', '.')}} đ</td>
                                            <td>                                
                                                <a href="{{asset('admin/nhapkho/delete/'.$data['id'])}}" onclick="return xoa()"><button type="button" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;Xóa</button></a>
                                            </td>
                                        </tr> 
                                    @endforeach                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                    </div>                  
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Tổng tiền</div>
                                        <div class="stat-digit">@if (isset($phieunhap))
                                        {{number_format($phieunhap->total_amout, 0, ',', '.')}} đ @else 0 đ@endif</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Tổng số lượng</div>
                                        <div class="stat-digit">@if (isset($phieunhap))
                                        {{$phieunhap->total_quantity}} @else 0 @endif sản phẩm </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{asset('admin/nhapkho/save')}}"><button type="button" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;Nhập hàng</button></a>


            </div><!-- .animated -->
        </div><!-- .content -->
        <style type="text/css">
            .show-search {
                height: 500px;
                margin-left: 92px;
                margin-top: 5px;
                border-radius: 5px;
                overflow: auto;
                /*display: none;*/
            }
            .show-search ul li{
                list-style: none;
                padding: 5px 0 5px 5px;
                border-top: 1px solid #000;
            }
            .show-search ul li img{
                float: left;
            }
            .show-search ul li p{
                float: left;
                padding-left: 60px;
                line-height: 60px;
            }
            .show-search ul li a{
                float: right;
            }
            .show-search ul li a button{
                margin-top: 12px;
                margin-right: 30px;
            }
        </style>

@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#thanh-search').keyup(function(event) {
                var tukhoa = $(this).val();
                $.ajax({
                    url:"{{URL::to("admin/nhapkho/livesearch")}}",
                    method:'GET',
                    data:{tukhoa:tukhoa},
                    dataType:'html',
                    success:function(data){
                        $('#search-data').html(data);                       
                    }
                })
            });

            function xoa(){
                var test = confirm('Bạn có chắc chắn muốn xóa');
                if(test){
                    return true;
                }
                else{
                    return false;
                }
            } 
        });

        function updateCart(qty, id){
            $.get(
                '{{asset('admin/nhapkho/update')}}',
                {qty:qty, id:id},
                function(){
                    location.reload();
                }
            );
        }
    </script>
@endsection
