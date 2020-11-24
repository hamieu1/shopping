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
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Thêm</button>                
                  <div class="col-md-12">
                      @if (session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                      @endif                   
                      <div class="card">
                          <div class="card-header">
                              <strong class="card-title">Basic Table</strong>
                          </div>
                          <div class="card-body">
                              <table class="table">           
                                <tbody>
                                  <tr>
                                    <th>id</th>
                                    <th>Tên Danh Mục</th>
                                  </tr>
                                @foreach ($danhmuc as $items)
                                  <tr>
                                    <td>{{$items->id}}</td>
                                    <td>{{$items->Name}}</td>
                                  </tr>
                                @endforeach
                                </tbody>
                              </table>
                          </div>
                      </div>
                      {!!$danhmuc->links()!!}
                  </div>
                
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="danhmuc-form" method="post" enctype="multipart/form-data" class="form-horizontal">
                  {{csrf_field()}}                                 
                  <div class="row form-group">
                      <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên danh mục</label></div>
                      <div class="col-12 col-md-9"><input type="text" id="text-input" name="Name" placeholder="Nhập tên danh muc" class="form-control"></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="button-add" type="submit" class="btn btn-primary">Thêm</button>
                    <button id="btnTest" class="btn btn-primary">Test</button>                  
                  </div>
                </form>
              </div>            
            </div>
          </div>
        </div>
@endsection
@section('script')
  <script type="text/javascript">
    $(document).ready(function() {
      $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        var url = $(this).attr('href').split('page=')[1];
        // console.log(url);
        fetch_data(url);
      });

      function fetch_data(url){
        $.ajax({
         url:"admin/test/pagination?page="+url,
         success:function(data)
         {
          $('.col-md-12').html(data);
         }
        });
      }

      $('#danhmuc-form').on('submit', function(event) {
        event.preventDefault();
        var name = $('input[name=Name]').val();
        var _token = $('input[name=_token]').val();
        $.ajax({
          url: "admin/test/themajax",
          type: "POST",
          data: {
            name: name,
            _token: _token
          },
          success: function(data){
            $('.col-md-12').html(data);
          }
        });
      });

      $('#btnTest').click(function(event) {
        $('#exampleModal').modal('toggle');
        // $('.modal-backdrop.show').css({
        //   opacity: '0',
        //   display: 'none'
        // });
      });
    });
  </script>
@endsection
