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
            <li> <strong>Shopping cart </strong> </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End -->
  
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="row">
        <div class="col-sm-12 col-xs-12">
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
          <div class="product-area">
            <div class="title-tab-product-category">
              <div class="text-center">
                <ul class="nav jtv-heading-style" role="tablist">
                  <li role="presentation" class="active"><a href="#cart" aria-controls="cart" role="tab" data-toggle="tab">1 Giỏ hàng</a></li>
                  <li role="presentation" class=""><a href="#checkout" aria-controls="checkout" role="tab" data-toggle="tab">2 Checkout</a></li>
                  <li role="presentation" class=""><a href="#complete-order" aria-controls="complete-order" role="tab" data-toggle="tab">3 Hoàn thành</a></li>
                </ul>
              </div>
            </div>
            <div class="content-tab-product-category"> 
              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="cart"> 
                  <!-- cart are start-->
                  <div class="cart-page-area">
                    <form method="post" action="#">
                      <div class="table-responsive">
                        <table class="shop-cart-table">
                          <thead>
                            <tr>
                              <th class="product-thumbnail ">Ảnh</th>
                              <th class="product-name ">Tên sản phẩm</th>
                              <th class="product-price ">Giá</th>
                              <th class="product-quantity">Số lượng</th>
                              <th class="product-subtotal ">Thành tiền</th>
                              <th class="product-remove">Xóa</th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach ($cartcontent as $items)                            
                            <tr class="cart_item">
                              <td class="item-img"><a href="#"><img src="{{asset('public/upload/'.$items->options->img)}}" alt="Product tilte is here " width="103px" height="118px"> </a></td>
                              <td class="item-title"><a href="{{asset('products-detail/'.$items->options->tenkhongdau.'/'.$items->id.'.html')}}">{{$items->name}} </a></td>
                              <td class="item-price"> {{number_format($items->price, 0, ',', '.')}} đ </td>
                              <td class="item-qty"><div class="cart-quantity">
                                  <div class="product-qty">
                                    <input type="number" style="text-align: center; width: 80px; height: 40px; border: 1px #e5e5e5 solid;" name="qty" value="{{$items->qty}}" onchange="updateCart(this.value, '{{$items->rowId}}', '{{$items->id}}')">
                                  </div>
                                </div></td>
                              <td class="total-price"><strong> {{number_format($items->price * $items->qty, 0, ',', '.')}} đ</strong></td>
                              <td class="remove-item"><a href="{{asset('cart/delete/'.$items->rowId)}}"><i class="fa fa-trash-o"></i></a></td>
                            </tr> 
                          @endforeach                          
                          </tbody>
                        </table>
                      </div>
                      <div class="cart-bottom-area">
                        <div class="row">
                          <div class="col-md-8 col-sm-7 col-xs-12">
                            <div class="update-coupne-area">
                              <div class="update-continue-btn text-right">
                                <a href="{{asset('/')}}"><button class="button btn-continue" title="Continue Shopping" type="button"><span>Continue Shopping</span></button></a>
                                <a href="{{asset('cart/delete/all')}}"><button class="button btn-empty" title="Clear Cart" value="empty_cart" name="update_cart_action" type="button"><span>Clear Cart</span></button></a>
                                <button class="button btn-update" title="Update Cart" value="update_qty" name="update_cart_action" type="button"><span>Update Cart</span></button>
                              </div>
                              <div class="coupn-area">
                                <div class="discount">
                                  <h3>Mã giảm giá</h3>
                                  <label for="coupon_code">Nếu bạn có mã giảm giá hãy nhập vào ô dưới</label>
                                  <input type="hidden" value="0" id="remove-coupone" name="remove">
                                  <input type="text" value="" name="coupon_code" id="coupon_code" class="input-text fullwidth">
                                  <button value="Apply Coupon" onclick="discountForm.submit(false)" class="button coupon " title="Apply Coupon" type="button"><span>Áp dụng</span></button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-5 col-xs-12">
                            <div class="cart-total-area">
                              <div class="catagory-title cat-tit-5 text-right">
                                <h3>Thông tin giỏ hàng</h3>
                              </div>
                              <div class="sub-shipping">                          
                                <p>Tổng số lượng <span>{{Cart::count()}}</span></p>
                                <p>Thuế <span>0%</span></p>
                              </div>                             
                              <div class="process-cart-total">
                                <p>Tổng tiền <span>{{number_format(Cart::total(),0,',','.')}} đ</span></p>
                              </div>
                              <div class="process-checkout-btn text-right">
                                <a href="{{asset('cart/baogia')}}" target="_blank"><button class="button btn-proceed-checkout" title="Proceed to Checkout" type="button"><span>In báo giá</span></button></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- cart are end--> 
                </div>
                <div role="tabpanel" class="tab-pane  fade in " id="checkout"> 
                  <!-- Checkout are start-->
                  <div class="checkout-area">
                    <div class="">
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          {{-- <div class="coupne-customer-area mb50">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              <div class="panel panel-checkout">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                  <h4 class="panel-title"> <img src="images/acc.jpg" alt=""> Returning customer? <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> Click here to login </a> </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                  <div class="panel-body">
                                    <div class="sm-des"> If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing & Shipping section. </div>
                                    <div class="first-last-area">
                                      <div class="input-box">
                                        <label>User Name Or Email</label>
                                        <input type="email" placeholder="Your Email" class="info" name="email">
                                      </div>
                                      <div class="input-box">
                                        <label>Password</label>
                                        <input type="password" placeholder="Password" class="info" name="padd">
                                      </div>
                                      <div class="frm-action cc-area">
                                        <div class="input-box tci-box"> <a href="#" class="btn-def btn2">Login</a> </div>
                                        <span>
                                        <input type="checkbox" class="remr">
                                        Remember me </span> <a class="forgotten forg" href="#">Forgotten Password</a> </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="panel panel-checkout">
                                <div class="panel-heading" role="tab" id="headingThree">
                                  <h4 class="panel-title"> <img src="images/acc.jpg" alt=""> Have A Coupon? <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> Click here to enter your code </a> </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                  <div class="panel-body coupon-body">
                                    <div class="first-last-area">
                                      <div class="input-box">
                                        <input type="text" placeholder="Coupon Code" class="info" name="code">
                                      </div>
                                      <div class="frm-action">
                                        <div class="input-box tci-box"> <a href="#" class="btn-def btn2">Apply Coupon</a> </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div> --}}
                          <div class="row">
                            <div class="col-md-12 col-xs-12">
                              <div class="billing-details">
                                <div class="contact-text right-side">
                                  <h2>Thông tin khách hàng</h2>
                                  <form action="{{asset('cart/thanhtoan')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="row">
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="input-box">
                                          <label>Tên<em>*</em></label>
                                          <input type="text" name="Name" class="info" placeholder="Nhập tên khách hàng" @if (Auth::check())
                                            value="{{Auth::user()->name}}" 
                                          @endif>
                                        </div>
                                      </div>                                    
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-box">
                                          <label>Email Address<em>*</em></label>
                                          <input type="email" name="Email" class="info" placeholder="Nhập Email của bạn" @if (Auth::check())
                                            value="{{Auth::user()->email}}" 
                                          @endif>
                                        </div>
                                      </div>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-box">
                                          <label>Số điện thoại<em>*</em></label>
                                          <input type="text" name="DienThoai" class="info" placeholder="Nhập số điện thoại của bạn" @if (Auth::check())
                                            value="{{Auth::user()->dienthoai}}" 
                                          @endif>
                                        </div>
                                      </div>                                    
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="input-box">
                                          <label>Địa chỉ<em>*</em></label>
                                          <input type="text" name="DiaChi" class="info mb-10" placeholder="Nhập địa chỉ của bạn">
                                        </div>
                                      </div>                                                                                                                                           
                                    </div>
                                </div>
                              </div>
                            </div>                          
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Checkout are end--> 
                </div>
                <div role="tabpanel" class="tab-pane  fade in" id="complete-order">
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="checkout-payment-area">
                        <div class="checkout-total">
                          <h3>Hóa đơn của bạn</h3>
                            <div class="table-responsive">
                              <table class="checkout-area table">
                                <thead>
                                  <tr class="cart_item check-heading">
                                    <td class="ctg-type"> Sản phẩm</td>
                                    <td class="cgt-des"> Thành tiền</td>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach ($cartcontent as $items)                               
                                  <tr class="cart_item check-item prd-name">
                                    <td class="ctg-type"> {{$items->name}} × <span>{{$items->qty}}</span></td>
                                    <td class="cgt-des"> {{$items->price}} đ</td>
                                  </tr> 
                                @endforeach                                
                                  <tr class="cart_item">
                                    <td class="ctg-type"> Subtotal</td>
                                    <td class="cgt-des">$205.00</td>
                                  </tr>
                                  <tr class="cart_item">
                                    <td class="ctg-type">Shipping</td>
                                    <td class="cgt-des ship-opt">
                                      <div class="shipp">
                                        <input type="radio" id="pay-toggle2" name="ship" checked="">
                                        <label for="pay-toggle2">Free Shipping</label>
                                      </div></td>
                                  </tr>
                                  <tr class="cart_item">
                                    <td class="ctg-type crt-total"> Tổng tiền</td>
                                    <td class="cgt-des prc-total"> {{number_format(Cart::total(),0,',','.')}} đ </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                        </div>
                        <div class="payment-section">
                          <div class="pay-toggle">
                              <div class="pay-type-total">
                                <div class="pay-type">
                                  <input type="radio" id="pay-toggle01" name="pay">
                                  <label for="pay-toggle01">Chuyển khoản ngân hàng</label>
                                </div>
                                <div class="pay-type">
                                  <input type="radio" id="pay-toggle02" name="pay">
                                  <label for="pay-toggle02">Thanh toán khi gia hàng</label>
                                </div>
                                <div class="pay-type">
                                  <input type="radio" id="pay-toggle03" name="pay">
                                  <label for="pay-toggle03">Cash on Delivery</label>
                                </div>
                                <div class="pay-type">
                                  <input type="radio" id="pay-toggle04" name="pay">
                                  <label for="pay-toggle04">Paypal</label>
                                </div>
                              </div>
                              <div class="input-box"><input class="btn-def btn2" type="submit" value="Đặt hàng"></div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="container">
    <div class="jtv-crosssel-pro">
      <div class="jtv-new-title">
        <h2>Sản phẩm khác</h2>
      </div>
      <div class="category-products">
        <ul class="products-grid">
        @foreach ($productsrandom as $items)
          <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
            <div class="item-inner">
              <div class="item-img">
                <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="#"> <img alt="Product tilte is here" src="{{asset('public/upload/'.$items->AnhChinh)}}" width="250px" height="290px"> </a>
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
                    <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                    <div class="item-price">
                      <div class="price-box"> <span class="regular-price"> <span class="price">{{$items->GiaKhuyenMai}} đ</span></span></div>
                    </div>
                    <div class="actions"><a href="#" class="link-wishlist" title="Add to Wishlist"></a>
                      <div class="add_cart">
                        <a @if ($items->SoLuong > 0)
                          href="{{asset('cart/add/'.$items->id)}}"
                        @else
                          href="{{url()->current()}}" onclick="checkSoLuong()"
                        @endif>
                          <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</span></button>
                        </a>
                      </div>
                      <a href="#" class="link-compare" title="Add to Compare"></a> </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
        @endforeach
        </ul>
      </div>
    </div>
  </div>
@endsection
@section('script')
  <script type="text/javascript">   
    function updateCart(qty, rowId, idSanPham){
      $.get(
        '{{asset('cart/update')}}',
        {qty:qty, rowId:rowId, idSanPham:idSanPham},
        function(data){
          if(data == 'ok'){
            alert('Số lượng bạn yêu cầu hiện không đủ');
            location.reload();           
          }
          else{
            location.reload();
          }
        }
      );
    }

    function checkSoLuong(){
      alert('Sản phẩm đã hết hàng xin quý khách chọn sản phẩm khác');
    }
  </script>
@endsection