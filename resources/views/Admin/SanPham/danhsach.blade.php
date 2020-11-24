@extends('Admin.Layout.master')
@section('content')
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Danh sách sản phẩm</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Danh sách sản phẩm</a></li>
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
                                <th>id</th>
                                <th>Tên sản phẩm</th>
                                <th>Loại</th>
                                <th>Giá bán</th>
                                <th>Giá khuyến mại</th>
                                <th>Ảnh</th>
                                <th>Tình trạng</th>
                                <th>Số lượng đã bán</th>
                                <th>Xử lý</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($sanpham as $items)
                              <tr>
                                <td>{{$items->id}}</td>
                                <td>{{$items->Name}}</td>
                                <td>{{$items->sanpham_loaisanpham->Name}}</td>
                                <td>{{number_format($items->GiaBan,0,',','.')}} đ</td>
                                <td>{{number_format($items->GiaKhuyenMai,0,',','.')}} đ</td>
                                <td><img width="100px" height="120px" src="{{asset('public/upload/'.$items->AnhChinh)}}"></td>
                                <td>@if ($items->SoLuong > 0)
                                  <span style="font-size: 12px;" class="badge badge-success">Còn hàng</span>
                                @else
                                  <span style="font-size: 12px;" class="badge badge-danger">Hết hàng</span>
                                @endif</td>
                                <td>{{$items->SoLuongDaBan}}</td>
                                {{-- <td>
                                  @if (count($prod->products_comment) > 0)
                                    <a href="{{asset('admin/comment/danhsach/'.$prod->id)}}"><button type="button" class="btn btn-info"><i class="fa fa-comments"></i>&nbsp;Đọc bình luận</button></a>
                                  @else
                                    Không có bình luận nào
                                  @endif                     
                                </td> --}}
                                <td>
                                  <a href="{{asset('admin/sanpham/sua/'.$items->id)}}"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Sửa</button></a>
                                  <a href="{{asset('admin/sanpham/xoa/'.$items->id)}}" onclick="return xoa()"><button type="button" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;Xóa</button></a>
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
