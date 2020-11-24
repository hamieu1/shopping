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
                        @if (session('loi'))
                            <div class="alert alert-danger">
                                {{session('loi')}}
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
                                <strong>Thêm sản phẩm</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{asset('admin/sanpham/them')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    {{csrf_field()}}
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Danh mục</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="DanhMuc" id="DanhMuc" class="form-control">
                                            @foreach ($danhmuc as $data)
                                                <option value="{{$data->id}}">{{$data->Name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Loại sản phẩm</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="LoaiSanPham" id="LoaiSanPham" class="form-control">
                                            {{-- @foreach ($loaisanpham as $cate)
                                                <option value="{{$cate->id}}">{{$cate->Name}}</option>
                                            @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên sản phẩm</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="Name" placeholder="Nhập tên sản phẩm" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Giá bán</label></div>
                                        <div class="col-12 col-md-9"><input type="number" id="text-input" name="GiaBan" placeholder="Nhập giá bán" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Giá nhập</label></div>
                                        <div class="col-12 col-md-9"><input type="number" id="text-input" name="GiaNhap" placeholder="Nhập giá gốc" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Giá khuyến mại</label></div>
                                        <div class="col-12 col-md-9"><input type="number" id="text-input" name="GiaKhuyenMai" placeholder="Nhập giá khuyến mại" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh chính</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="file-input" name="AnhChinh" class="form-control-file"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh phụ 1</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="file-input" name="AnhPhu1" class="form-control-file"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh phụ 2</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="file-input" name="AnhPhu2" class="form-control-file"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh phụ 3</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="file-input" name="AnhPhu3" class="form-control-file"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh phụ 4</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="file-input" name="AnhPhu4" class="form-control-file"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Tình trạng</label></div>
                                        <div class="col col-md-9">
                                            <div class="form-check-inline form-check">
                                                <label for="inline-radio1" class="form-check-label ">
                                                    <input type="radio" id="inline-radio1" name="TinhTrang" value="Còn hàng" class="form-check-input" checked="">Còn hàng
                                                </label>
                                                <label for="inline-radio2" class="form-check-label " style="margin-left: 20px;">
                                                    <input type="radio" id="inline-radio2" name="TinhTrang" value="Hết hàng" class="form-check-input">Hết hàng
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Mô tả</label></div>
                                        <div class="col-12 col-md-9"><textarea name="MoTa" id="textarea-input demo" rows="9" placeholder="Content..." class="form-control ckeditor"></textarea></div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Thêm
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
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            var idDanhMuc = $('#DanhMuc').val();
            $.get('admin/ajax/loaisanpham/'+idDanhMuc, function(data) {
                $('#LoaiSanPham').html(data);
            });

            $('#DanhMuc').change(function(event) {
                var idDanhMuc = $('#DanhMuc').val();
                $.get('admin/ajax/loaisanpham/'+idDanhMuc, function(data) {
                    $('#LoaiSanPham').html(data);
                });
            });
        });
    </script>
@endsection
