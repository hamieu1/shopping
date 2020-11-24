@extends('Frontend.Layout.master')
@section('content')
  <!-- end header --> 
  <!-- Revslider -->
  <div class="container jtv-home-revslider">
    <div class="row">
      <div class="col-lg-9 col-sm-9 col-xs-12 jtv-main-home-slider">
        <div id='rev_slider_1_wrapper' class='rev_slider_wrapper fullwidthbanner-container'>
          <div id='rev_slider_1' class='rev_slider fullwidthabanner'>
            <ul>
              <li data-transition='slotzoom-horizontal' data-slotamount='7' data-masterspeed='1000' data-thumb='images/slider/slide-img1.jpg'><img src='images/slider/slide-img1.jpg' alt="slider image1" data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat'  />
                <div class="info">
                  <div class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-x='0'  data-y='165'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2;white-space:nowrap;'><span>Shop The Trend</span></div>
                  <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='0'  data-y='220'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3;white-space:nowrap;'>Amazing Chance!</div>
                  <div    class='tp-caption Title sft  tp-resizeme ' data-x='0'  data-y='300'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;white-space:nowrap;'>Our new arrivals can't wait to meet you.</div>
                  <div class='tp-caption sfb  tp-resizeme ' data-x='0'  data-y='350'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;white-space:nowrap;'><a href='#' class="buy-btn">Browse Now</a></div>
                </div>
              </li>
              <li data-transition='slotzoom-horizontal' data-slotamount='7' data-masterspeed='1000' data-thumb='images/slider/slide-img3.jpg'><img src='images/slider/slide-img3.jpg' alt="slider image2" data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat'  />
                <div class="info">
                  <div class='tp-caption ExtraLargeTitle sft slide2  tp-resizeme ' data-x='45'  data-y='165'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2;white-space:nowrap;padding-right:0px'><span>Spring Fashion</span></div>
                  <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='45'  data-y='220'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3;white-space:nowrap;'>Be Summer Ready</div>
                  <div class='tp-caption Title sft  tp-resizeme ' data-x='45'  data-y='300'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;white-space:nowrap;'>Identify your Look, Define your Style!</div>
                  <div    class='tp-caption sfb  tp-resizeme ' data-x='45'  data-y='350'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;white-space:nowrap;'><a href='#' class="buy-btn">Join us</a></div>
                </div>
              </li>
              <li data-transition='slotzoom-horizontal' data-slotamount='7' data-masterspeed='1000' data-thumb='images/slider/slide-img2.jpg'><img src='images/slider/slide-img2.jpg' alt="slider image3" data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat'  />
                <div class="info">
                  <div class='tp-caption ExtraLargeTitle sft slide2  tp-resizeme ' data-x='45'  data-y='165'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2;white-space:nowrap;padding-right:0px'><span>Big Sale</span></div>
                  <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='45'  data-y='220'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3;white-space:nowrap;'>New Fashion</div>
                  <div class='tp-caption Title sft  tp-resizeme ' data-x='45'  data-y='300'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;white-space:nowrap;'>Look great & feel amazing in our stunning dresses.</div>
                  <div    class='tp-caption sfb  tp-resizeme ' data-x='45'  data-y='350'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;white-space:nowrap;'><a href='#' class="buy-btn">Buy Now</a></div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="banner-block"> <a href="#"> <img src="images/banner1.jpg" alt=""> </a>
          <div class="text-des-container pad-zero">
            <div class="text-des">
              <p>Designer</p>
              <h2>Handbags</h2>
            </div>
          </div>
        </div>
        <div class="banner-block"> <a href="#"> <img src="images/banner2.jpg" alt=""> </a>
          <div class="text-des-container">
            <div class="text-des">
              <p>The Ultimate</p>
              <h2>Shoes Collection</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Support Policy Box -->
  <div class="container">
    <div class="support-policy-box">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="support-policy"> <i class="fa fa-truck"></i>
            <div class="content">Miễn phí giao hàng toàn quốc</div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="support-policy"> <i class="fa fa-phone"></i>
            <div class="content">Hỗ trợ trực tuyến 24/24</div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="support-policy"> <i class="fa fa-refresh"></i>
            <div class="content">Hoàn trả lại hàng sau 30 ngày</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Main Container -->
  <section class="main-container">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-12">
          <div class="col-main">
            <div class="jtv-featured-products">
              <div class="slider-items-products">
                <div class="jtv-new-title">
                  <h2>Sản phẩm nổi bật</h2>
                </div>
                <div id="featured-slider" class="product-flexslider hidden-buttons">
                  <div class="slider-items slider-width-col4 products-grid">
                  @foreach ($spnoibat as $items)
                    <div class="item">
                      <div class="item-inner">
                        <div class="item-img">
                          <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="{{asset('products-detail/'.$items->TenKhongDau.'/'.$items->id.'.html')}}"> <img alt="Product tilte is here" src="{{asset('public/upload/'.$items->AnhChinh)}}" width="260px" height="336px"> </a>
                            <div class="new-label new-top-left">new</div>
                            <div class="mask-shop-white"></div>
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
                                <div class="price-box"> <span class="regular-price"> <span class="price">{{$items->GiaKhuyenMai}} đ</span></span>
                                  <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> {{$items->GiaBan}} đ </span> </p>
                                </div>
                              </div>
                              <div class="actions">
                                <div class="add_cart">
                                  <a @if ($items->SoLuong > 0)
                                    href="{{asset('cart/add/'.$items->id)}}"
                                  @else
                                    href="{{asset('/')}}" onclick="checkSoLuong()"
                                  @endif>
                                    <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</span></button>
                                  </a>
                                </div>
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
          <!-- Trending Products Slider -->
          <div class="jtv-trending-products">
            <div class="slider-items-products">
              <div class="jtv-new-title">
                <h2>Thờ trang nữ</h2>
              </div>
              <div id="trending-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4 products-grid">
                @foreach ($girlnew as $items)
                  <div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="{{asset('products-detail/'.$items->TenKhongDau.'/'.$items->id.'.html')}}"> <img alt="Product tilte is here" src="{{asset('public/upload/'.$items->AnhChinh)}}" width="200px" height="270px"> </a>
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
                          <div class="item-title"> <a title="Product tilte is here" href="{{asset('products-detail/'.$items->TenKhongDau.'/'.$items->id.'.html')}}">{{$items->Name}} </a> </div>
                          <div class="item-content">
                            <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">{{$items->GiaKhuyenMai}} đ</span></span>
                                <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> {{$items->GiaBan}} đ </span> </p>
                              </div>
                            </div>
                            <div class="actions">
                              <div class="add_cart">
                                <a @if ($items->SoLuong > 0)
                                    href="{{asset('cart/add/'.$items->id)}}"
                                  @else
                                    href="{{asset('/')}}" onclick="checkSoLuong()"
                                  @endif>
                                  <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</span></button>
                                </a>
                              </div>
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
          <div class="jtv-trending-products">
            <div class="slider-items-products">
              <div class="jtv-new-title">
                <h2>Thời trang nam</h2>
              </div>
              <div id="trending-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4 products-grid">
                  @foreach ($boynew as $items)
                    <div class="item">
                      <div class="item-inner">
                        <div class="item-img">
                          <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="{{asset('products-detail/'.$items->TenKhongDau.'/'.$items->id.'.html')}}"> <img alt="Product tilte is here" src="{{asset('public/upload/'.$items->AnhChinh)}}" width="200px" height="270px"> </a>
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
                            <div class="item-title"> <a title="Product tilte is here" href="{{asset('products-detail/'.$items->TenKhongDau.'/'.$items->id.'.html')}}">{{$items->Name}} </a> </div>
                            <div class="item-content">
                              <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                              <div class="item-price">
                                <div class="price-box"> <span class="regular-price"> <span class="price">{{$items->GiaKhuyenMai}} đ</span></span>
                                  <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> {{$items->GiaBan}} đ </span> </p>
                                </div>
                              </div>
                              <div class="actions">
                                <div class="add_cart">
                                  <a @if ($items->SoLuong > 0)
                                    href="{{asset('cart/add/'.$items->id)}}"
                                  @else
                                    href="{{asset('/')}}" onclick="checkSoLuong()"
                                  @endif>
                                    <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</span></button>
                                  </a>
                                </div>
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
          <!-- End Trending Products Slider --> 
        </div>
      </div>
    </div>
  </section>
  
  <!-- Collection Banner -->
  <div class="jtv-collection-area">
    <div class="container">
      <div class="column-right pull-left col-sm-4 no-padding"> <a href="#"> <img src="images/women-top.jpg" alt="Top Collections"> </a>
        <div class="col-right-text">
          <h5 class="text-uppercase">Top Collections <span> 35% </span> get it now</h5>
        </div>
      </div>
      <div class="column-left pull-right col-sm-8 no-padding">
        <div class="column-left-top">
          <div class="col-left-top-left pull-left col-sm-8 no-padding"> <a href="#"> <img src="images/men-suits.jpg" alt="Men's Suits"> </a>
            <div class="col-left-top-left-text">
              <h5 class="text-uppercase">Dressing for your Wedding</h5>
              <h3 class="text-uppercase">Men's Suits</h3>
              <h5 class="text-uppercase">Look Good, Feel Good</h5>
            </div>
          </div>
          <div class="col-left-top-right pull-right col-sm-4 no-padding"> <a href="#"> <img src="images/footwear.jpg" alt="footwear"> </a>
            <div class="col-left-top-right-text text-center">
              <h5 class="text-uppercase">Footwear Fashion Sale</h5>
              <h3>50%</h3>
              <h5 class="text-uppercase">Buy 1, Get 1</h5>
            </div>
          </div>
        </div>
        <div class="column-left-bottom col-sm-12 no-padding">
          <div class="col-left-bottom-left pull-left col-sm-4 no-padding"> <a href="#"> <img src="images/handbag.jpg" alt="Handbag"> </a>
            <div class="col-left-bottom-left-text">
              <h5 class="text-uppercase">What's New?</h5>
              <h3 class="text-uppercase">Bag's</h3>
              <h5 class="text-uppercase">Everyday<br>
                Low Prices</h5>
            </div>
          </div>
          <div class="col-left-bottom-right pull-right col-sm-8 no-padding"> <a href="#"> <img src="images/watch-banner.jpg" alt="Watch"> </a>
            <div class="col-left-bottom-right-text">
              <h5 class="text-uppercase">Never Miss a Second</h5>
              <h3 class="text-uppercase">Watch</h3>
              <h5 class="text-uppercase">Time to buy a watch!</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- collection area end -->
  <div class="container">
    <div class="row">
      <div class="col-sm-4 col-xs-12">
        <div class="jtv-hot-deal-product">
        <div class="jtv-new-title">
              <h2>Deals Of The Day</h2>
            </div>
          <ul class="products-grid">
            <li class="right-space two-height item">
              <div class="item-inner">
                <div class="item-img">
                  <div class="item-img-info"><a href="#" title="Product tilte is here" class="product-image"><img src="{{asset('public/upload/'.$saleday->AnhChinh)}}" alt="Product tilte is here" width="318px" height="363px"> </a>
                    <div class="hot-label hot-top-left">Hot Deal</div>
                    <div class="mask-shop-white"></div>
                    <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                    <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                    </a> <a href="compare.html">
                    <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                    </a> </div>
                    <div class="jtv-timer-box">
                  <div class="countbox_1 timer-grid"></div>
                </div>
                </div>
                
                <div class="item-info">
                  <div class="info-inner">
                    <div class="item-title"> <a title="Product tilte is here" href="{{asset('products-detail/'.$saleday->TenKhongDau.'/'.$saleday->id.'.html')}}">{{$saleday->Name}} </a> </div>
                    <div class="item-content">
                      <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                      <div class="item-price">
                        <div class="price-box"> <span class="regular-price"> <span class="price">{{$saleday->GiaKhuyenMai}} đ</span></span></div>
                      </div>
                      <div class="actions">
                        <div class="add_cart">
                          <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</span></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12 hidden-sm">
        <div class="sidebar-banner">
        <div class="jtv-top-banner"> <a href="#"> <img src="images/banner3.jpg" alt="banner"> </a> </div>
        <div class="jtv-top-banner"> <a href="#"> <img src="images/banner4.jpg" alt="banner"> </a> </div></div>
      </div>
      <!-- Top Seller Slider -->
      <div class="col-sm-4 col-xs-12">
        <div class="jtv-top-products">
          <div class="slider-items-products">
            <div class="jtv-new-title">
              <h2>Top Seller</h2>
            </div>
            <div id="top-products-slider" class="product-flexslider hidden-buttons">
              <div class="slider-items slider-width-col4 products-grid">
              @foreach ($topsale as $items)               
                <div class="item">
                  <div class="item-inner">
                    <div class="item-img">
                      <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html"> <img alt="Product tilte is here" src="{{asset('public/upload/'.$items->AnhChinh)}}" width="318px" height="363px"> </a>
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
                          <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                          <div class="item-price">
                            <div class="price-box"> <span class="regular-price"> <span class="price">{{$items->GiaKhuyenMai}} đ</span></span></div>
                          </div>
                          <div class="actions">
                            <div class="add_cart">
                              <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</span></button>
                            </div>
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
        <!-- End Top Seller Slider --> 
      </div>
    </div>
  </div>
  
  <!-- Brand Logo -->
  <div class="container jtv-brand-logo-block">
    <div class="jtv-brand-logo">
      <div class="slider-items-products">
        <div id="jtv-brand-logo-slider" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col6">
            <div class="item"><a href="#"><img src="images/brand1.png" alt="Brand Logo"></a> </div>
            <div class="item"><a href="#"><img src="images/brand2.png" alt="Brand Logo"></a> </div>
            <div class="item"><a href="#"><img src="images/brand3.png" alt="Brand Logo"></a> </div>
            <div class="item"><a href="#"><img src="images/brand4.png" alt="Brand Logo"></a> </div>
            <div class="item"><a href="#"><img src="images/brand5.png" alt="Brand Logo"></a> </div>
            <div class="item"><a href="#"><img src="images/brand6.png" alt="Brand Logo"></a> </div>
            <div class="item"><a href="#"><img src="images/brand7.png" alt="Brand Logo"></a> </div>
            <div class="item"><a href="#"><img src="images/brand8.png" alt="Brand Logo"></a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
  <script type="text/javascript">
    function checkSoLuong(){
      alert('Sản phẩm đã hết hàng xin quý khách chọn sản phẩm khác');
    }
  </script>
@endsection