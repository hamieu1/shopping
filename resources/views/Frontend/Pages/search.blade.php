@extends('Frontend.Layout.master')
@section('content')
  <!-- end header --> 
  
  <!-- Breadcrumbs -->
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li><a href="index.html" title="Go to Home Page">Home</a><span>/</span></li>
            <li><a title="women" href="shop-grid-sidebar.html">Women</a><span>/</span></li>
            <li><strong>Clothing</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
  <!-- Main Container -->
  <div class="main-container col1-layout">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-12">
          <article class="col-main">
            <div class="page-title">
              <h2>Tìm kiếm sản phẩm {{$search}}</h2>
            </div>
            <div class="toolbar">
              <div class="sorter">
                <div class="view-mode"> <span title="Grid" class="button button-active button-grid">&nbsp;</span><a href="shop-list-sidebar.html" title="List" class="button-list">&nbsp;</a> </div>
              </div>
              <div id="sort-by">
                <label class="left">Sort By: </label>
                <ul>
                  <li><a href="#">Position<span class="right-arrow"></span></a>
                    <ul>
                      <li><a href="#">Name</a></li>
                      <li><a href="#">Price</a></li>
                      <li><a href="#">Position</a></li>
                    </ul>
                  </li>
                </ul>
                <a class="button-asc left" href="#" title="Set Descending Direction"><span class="top_arrow"></span></a> </div>
              <div class="pager">
                <div id="limiter">
                  <label>View: </label>
                  <ul>
                    <li><a href="#">16<span class="right-arrow"></span></a>
                      <ul>
                        <li><a href="#">20</a></li>
                        <li><a href="#">30</a></li>
                        <li><a href="#">35</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="category-products">
            @foreach ($spSearch as $items)            
              <ul class="products-grid">
                <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                  <div class="item-inner">
                    <div class="item-img">
                      <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html"> <img alt="Product tilte is here" src="{{asset('public/upload/'.$items->AnhChinh)}}" width="250px" height="290px"> </a>
                        <div class="new-label new-top-left">new</div>
                        <div class="sale-label sale-top-right">sale</div>
                        <div class="mask-shop-white"></div>
                        <div class="new-label new-top-left">new</div>
                        <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                        <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                        </a> <a href="compare.html">
                        <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                        </a> </div>
                    </div>
                    <div class="item-info">
                      <div class="info-inner">
                        <div class="item-title"> <a title="Product tilte is here" href="{{asset('products-detail/'.$items->TenKhongDau.'/'.$items->id.'.html')}}">{{$items->Name}} </a> </div>
                        <div class="item-content">
                          <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                          <div class="item-price">
                            <div class="price-box"> <span class="regular-price"> <span class="price">$99.79</span></span>
                              <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $119.00 </span> </p>
                            </div>
                          </div>
                          <div class="actions">
                            <div class="add_cart">
                              <a @if ($items->SoLuong > 0)
                                href="{{asset('cart/add/'.$items->id)}}"
                              @else
                                href="{{url()->current()}}" onclick="checkSoLuong()"
                              @endif>
                                <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>               
              </ul>
            @endforeach
            </div>
            <div class="toolbar bottom">
              <div class="row">
                <div class="col-sm-6 text-left">
                  <div class="pages">
                    {!!$spSearch->links()!!}
                  </div>
                </div>
                <div class="col-sm-6 text-right">Số lượng sản phẩm tìm thấy {{$spSearch->count()}}</div>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
  <!-- Main Container End --> 
  
  <!-- Footer -->
@endsection
@section('script')
  <script type="text/javascript">
    function checkSoLuong(){
      alert('Sản phẩm đã hết hàng xin quý khách chọn sản phẩm khác');
    }
  </script>
@endsection