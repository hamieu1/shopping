@extends('Frontend.Layout.master')
@section('content')
<!-- end header --> 
  
  <!-- Breadcrumbs -->
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a href="index.html" title="Go to Home Page">Home</a> <span>/</span></li>
            <li><a href="shop-grid-sidebar.html" title="">Women</a> <span>/ </span></li>
            <li><a href="shop-grid-sidebar.html" title="">Clothing</a> <span>/</span></li>
            <li> <strong>{{$sanpham->Name}} </strong> </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
  
  <!-- Main Container -->
  <section class="main-container col1-layout">
    <div class="container">
      <div class="row">
        <div class="product-view">
          <div class="product-essential">
            <form action="#" method="post" id="product_addtocart_form">
              <div class="product-img-box col-lg-4 col-sm-5 col-xs-12">
                <div class="product-image">
                  <div class="product-full">
                    <div class="new-label new-top-left"> New </div>
                    <img id="product-zoom" src="{{asset('public/upload/'.$sanpham->AnhChinh)}}" alt="product-image"/> </div>
                  <div class="more-views">
                    <div class="slider-items-products">
                      <div id="jtv-more-views-img" class="product-flexslider hidden-buttons product-img-thumb">
                        <div class="slider-items slider-width-col4 block-content">
                          <div class="more-views-items"> <a href="#" data-image="{{asset('public/upload/'.$sanpham->AnhPhu1)}}"> <img id="product-zoom"  src="{{asset('public/upload/'.$sanpham->AnhPhu1)}}" alt="product-image"/> </a></div>
                          <div class="more-views-items"> <a href="#" data-image="{{asset('public/upload/'.$sanpham->AnhPhu2)}}"> <img id="product-zoom"  src="{{asset('public/upload/'.$sanpham->AnhPhu2)}}" alt="product-image"/> </a></div>
                          <div class="more-views-items"> <a href="#" data-image="{{asset('public/upload/'.$sanpham->AnhPhu3)}}"> <img id="product-zoom"  src="{{asset('public/upload/'.$sanpham->AnhPhu3)}}" alt="product-image"/> </a></div>
                          <div class="more-views-items"> <a href="#" data-image="{{asset('public/upload/'.$sanpham->AnhPhu4)}}"> <img id="product-zoom"  src="{{asset('public/upload/'.$sanpham->AnhPhu4)}}" alt="product-image"/> </a></div>                       
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end: more-images --> 
              </div>
              <div class="product-shop col-lg-8 col-sm-7 col-xs-12">
                <div class="product-name">
                  <h1>{{$sanpham->Name}}</h1>
                </div>
                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                <div class="price-block">
                  <div class="price-box">
                    <p class="special-price"> <span class="price-label">Special Price</span><span class="price"> {{$sanpham->GiaKhuyenMai}} đ </span></p>
                    <p class="old-price"> <span class="price-label">Regular Price:</span><span class="price"> {{$sanpham->GiaBan}} đ </span></p>
                  @if ($sanpham->SoLuong > 0)
                    <p><span style="background-color: #6dbe14; padding: 4px 12px 4px 12px; font-size: 12px; color: #fff; text-transform: uppercase; border-radius: 3px;">Còn hàng</span></p>
                  @else
                    <p><span style="background-color: red; padding: 4px 12px 4px 12px; font-size: 12px; color: #fff; text-transform: uppercase; border-radius: 3px;">Hết hàng</span></p>
                  @endif
                  </div>
                </div>
                <div class="short-description">
                  <h2>Mô tả</h2>
                  {!!$sanpham->MoTa!!}
                </div>
                <div class="add-to-box">
                  <div class="add-to-cart">
                    {{-- <div class="pull-left">
                      <div class="custom pull-left">
                        <label>Quantity:</label>
                        <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="fa fa-minus">&nbsp;</i></button>
                        <input type="text" class="input-text qty" title="Qty" value="" maxlength="12" id="qty" name="qty">
                        <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="fa fa-plus">&nbsp;</i></button>
                      </div>
                    </div> --}}
                    <a @if ($sanpham->SoLuong > 0)
                      href="{{asset('cart/add/'.$sanpham->id)}}"
                    @else
                      href="{{asset('products-detail/'.$sanpham->TenKhongDau.'/'.$sanpham->id.'.html')}}"
                      onclick="checkSoLuong()" 
                    @endif><button onClick="productAddToCartForm.submit(this)" class="button btn-cart" title="Add to Cart" type="button"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button></a>
                  </div>
                  <div style="clear: both;"></div>
                  <div class="email-addto-box">
                    <ul class="add-to-links">
                      <li><a class="link-wishlist" href="wishlist.html"><i class="fa fa-heart"></i><span>Thêm vào yêu thích</span></a></li>
                      <li><a class="link-compare" href="compare.html"><i class="fa fa-signal"></i><span>So sánh</span></a></li>
                      <li><a class="email-friend" href="#"><i class="fa fa-envelope"></i><span>Gửi Email cho bạn bè</span></a></li>
                    </ul>
                  </div>
                </div>
                <div class="social">
                  <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                  </ul>
                </div>
                <div class="product-next-prev"> <a class="product-next" href="#"><i class="fa fa-angle-left"></i></a> <a class="product-prev" href="#"><i class="fa fa-angle-right"></i></a> </div>
              </div>
            </form>
          </div>
        </div>
        <div class="product-collateral col-lg-12 col-sm-12 col-xs-12">
          <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
            <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Mô tả </a></li>
            <li><a href="#reviews_tabs" data-toggle="tab">Reviews</a></li>
          </ul>
          <div id="productTabContent" class="tab-content">
            <div class="tab-pane fade in active" id="product_tabs_description">
              <div class="std">
                {!!$sanpham->MoTa!!}
              </div>
            </div>
            <div class="tab-pane fade" id="product_tabs_tags">
              <div class="box-collateral box-tags">
                <div class="tags">
                  <form id="addTagForm" action="#" method="get">
                    <div class="form-add-tags">
                      <label for="productTagName">Add Tags:</label>
                      <div class="input-box">
                        <input class="input-text" name="productTagName" id="productTagName" type="text">
                        <button type="button" title="Add Tags" class=" button btn-add" onClick="submitTagForm()"> <span>Add Tags</span></button>
                      </div>
                      <!--input-box--> 
                    </div>
                  </form>
                </div>
                <!--tags-->
                <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
              </div>
            </div>
            <div class="tab-pane fade" id="reviews_tabs">
              <div class="box-collateral box-reviews" id="customer-reviews">
                <div class="box-reviews1">
                  <div class="form-add">
                    <form id="review-form" method="post" action="{{asset('comments/'.$sanpham->id)}}" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <h3>Đánh giá của bạn về sản phẩm</h3>
                      <fieldset>
                        <h4>Đánh giá theo mức độ hài lòng của bạn về sản phẩm <em class="required">*</em></h4>
                        <span id="input-message-box"></span>
                        <table id="product-review-table" class="data-table">
                          <thead>
                            <tr class="first last">
                              <th>&nbsp;</th>
                              <th><span class="nobr">1 *</span></th>
                              <th><span class="nobr">2 *</span></th>
                              <th><span class="nobr">3 *</span></th>
                              <th><span class="nobr">4 *</span></th>
                              <th><span class="nobr">5 *</span></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="first odd">
                              <th>Đánh giá</th>
                              <td class="value"><input type="radio" class="radio" value="1" id="Price_1" name="DanhGia"></td>
                              <td class="value"><input type="radio" class="radio" value="2" id="Price_2" name="DanhGia"></td>
                              <td class="value"><input type="radio" class="radio" value="3" id="Price_3" name="DanhGia"></td>
                              <td class="value"><input type="radio" class="radio" value="4" id="Price_4" name="DanhGia"></td>
                              <td class="value last"><input type="radio" class="radio" value="5" id="Price_5" name="DanhGia"></td>
                            </tr>
                          </tbody>
                        </table>
                        <input type="hidden" value="" class="validate-rating" name="validate_rating">
                        <div class="review1">
                          <ul class="form-list">
                            <li>
                              <label class="required" for="nickname_field">Name<em>*</em></label>
                              <div class="input-box">
                                <input type="text" class="input-text" id="nickname_field" name="Name" @if (Auth::check())
                                  value="{{Auth::user()->name}}" readonly="" 
                                @endif>
                              </div>
                            </li>
                            <li>
                              <label class="required" for="summary_field">Email<em>*</em></label>
                              <div class="input-box">
                                <input type="email" class="input-text" id="summary_field" name="Email" @if (Auth::check())
                                  value="{{Auth::user()->email}}" readonly="" 
                                @endif>
                              </div>
                            </li>
                          </ul>
                        </div>
                        <div class="review2">
                          <ul>
                            <li>
                              <label class="required " for="review_field">Bình luận<em>*</em></label>
                              <div class="input-box">
                                <textarea rows="3" cols="5" id="review_field" name="NoiDung"></textarea>
                              </div>
                            </li>
                          </ul>
                          <div class="buttons-set">
                            <button class="button submit" title="Submit Review" type="submit"><span>Gửi bình luận</span></button>
                          </div>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                </div>
                <div class="box-reviews2">
                  <h3>Khách hàng bình luận</h3>
                  <div class="box visible">
                    <ul>
                    @foreach ($comments as $data)                   
                      <li>
                        <table class="ratings-table">
                          <div class="avatar" style="float: left; margin-top: 20px; margin-left: 20px;">
                            <img src="upload/images.png" height="100px" width="100px">
                          </div>
                        </table>
                        <div class="review" style="float: left; margin-left: 25px;">
                          <h6><a href="#">@if ($data->id_users == null)
                            {{$data->comments_khachhang->Name}}
                          @else
                            {{$data->comments_users->name}}
                          @endif</a></h6>
                          <small>{{date('d-m-Y', strtotime($data->created_at))}} </small>
                          <div class="review-txt">{{$data->NoiDung}}</div>
                        </div>
                        <div style="clear: both;"></div>
                      </li>
                    @endforeach
                    </ul>
                  </div>
                  <div class="actions"> <a class="button view-all" id="revies-button" href="#"><span><span>View all</span></span></a> </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="product_tabs_custom">
              <div class="product-tabs-content-inner clearfix">
                <p>Lorem Ipsum is
                  simply dummy text of the printing and typesetting industry. Lorem Ipsum
                  has been the industry's standard dummy text ever since the 1500s, when 
                  an unknown printer took a galley of type and scrambled it to make a type
                  specimen book. It has survived not only five centuries, but also the 
                  leap into electronic typesetting, remaining essentially unchanged. It 
                  was popularised in the 1960s with the release of Letraset sheets 
                  containing Lorem Ipsum passages, and more recently with desktop 
                  publishing software like Aldus PageMaker including versions of Lorem 
                  Ipsum.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Main Container End --> 
  
  <!-- Related Products Slider -->
@if ($splienquan->count() > 0)
  <div class="container">
    <div class="jtv-related-products">
      <div class="slider-items-products">
        <div class="jtv-new-title">
          <h2>Sản phẩm cùng loại</h2>
        </div>
        <div class="related-block">
          <div id="jtv-related-products-slider" class="product-flexslider hidden-buttons">
            <div class="slider-items slider-width-col4 products-grid">
            @foreach ($splienquan as $items)            
              <div class="item">
                <div class="item-inner">
                  <div class="item-img">
                    <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="#"> <img alt="Product tilte is here" src="{{asset('public/upload/'.$items->AnhChinh)}}" width="260px" height="298px"> </a>
                      <div class="new-label new-top-left">new</div>
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
                      <div class="item-title"> <a title="Product tilte is here" href="{{asset('products-detail/'.$items->TenKhongDau.'/'.$items->id.'.html')}}"> {{$items->Name}} </a> </div>
                      <div class="item-content">
                        <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                        <div class="item-price">
                          <div class="price-box"> <span class="regular-price"> <span class="price">{{$items->GiaKhuyenMai}} đ</span></span></div>
                        </div>
                        <div class="actions">
                          <a @if ($items->SoLuong > 0)
                            href="{{asset('cart/add/'.$items->id)}}"
                          @else
                            href="{{url()->current()}}" onclick="checkSoLuong()"
                          @endif>
                            <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</span></button>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif
  <!-- Related Products Slider End --> 
  
  <!-- Upsell Product Slider -->
  
@endsection
@section('script')
  <script type="text/javascript">
    function checkSoLuong(){
      alert('Sản phẩm đã hết hàng xin quý khách chọn sản phẩm khác');
    }
  </script>
@endsection