@extends('Admin.Layout.master')
@section('content')
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Danh sách hóa đơn bán</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Danh sách hóa đơn bán</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
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
                                <th>Xử lý</th>
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
                                <td>
                                  <a href="{{asset('admin/hoadonban/sua/'.$hd->id)}}"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Sửa</button></a>
                                  <a href="{{asset('admin/hoadonban/xoa/'.$hd->id)}}" onclick="return xoa()"><button type="button" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;Xóa</button></a>
                                </td>
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
@section('script')
  <script type="text/javascript">
    function xoa(){
      var test = confirm('Bạn có chắc chắn muốn xóa');
      if(test){
        return true;
      }
      else{
        return false;
      }
    }
  </script>
@endsection
