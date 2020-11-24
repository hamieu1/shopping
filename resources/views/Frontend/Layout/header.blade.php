<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="description" content="Fabulous is a creative, clean, fully responsive, powerful and multipurpose HTML Template with latest website trends. Perfect to all type of fashion stores.">
<meta name="keywords" content="HTML,CSS,womens clothes,fashion,mens fashion,fashion show,fashion week">
<meta name="author" content="JTV">
<base href="{{asset('public/frontend')}}">
<title>Đào Minh Hà - Shop thời trang</title>

<!-- Favicons Icon -->
<link rel="icon" href="images/favicon.ico" type="image/x-icon" />

<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS Style -->
<link rel="stylesheet" type="text/css" href="css/styles.css" media="all">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">
  .live-search{
    width: 423px;
    height: 456px;
    background-color: #fff;
    position: absolute;
    z-index: 21;
    margin-top: 45px;
    overflow: auto;
    /*display: none;*/
  }

  .live-search ul {
    margin: 0;
    padding: 0;
  }

  .live-search ul li{
    list-style: none;
    padding: 5px 0 5px 5px;
    border-top: 1px solid #000;
  }

  .live-search ul li img{
    float: left;
  }

  .live-search ul li a p{
    font-size: 15px;
  }

  .live-search ul li a{
    float: left;
    padding-left: 60px;
    line-height: 60px;
  }

  .live-search ul li a p:hover{
    color: #e40046;
  }
</style>
<script type="text/javascript">
  $(document).ready(function() {
    $('#search').keyup(function(event) {
      var tukhoa = $(this).val();
      $.ajax({
          url:"{{URL::to("livesearch")}}",
          method:'GET',
          data:{tukhoa:tukhoa},
          dataType:'html',
          success:function(data){
              $('#search-data').html(data);                       
          }
      })
    });
  });
</script>
</head>

<body class="cms-index-index cms-home-page">

<!-- Newsletter Popup -->
<!-- Mobile Menu -->
<div id="jtv-mobile-menu">
  <ul>
    <li>
      <div class="mm-search">
        <form id="mob-search" name="search">
          <div class="input-group">
            <div class="input-group-btn">
              <input type="text" class="form-control simple" placeholder="Search ..." name="srch-term" id="srch-term">
              <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> </button>
            </div>
          </div>
        </form>
      </div>
    </li>
    <li><a href="{{asset('/')}}">Home</a>      
    </li>    
    <li><a href="{{asset('thoitrangnam/sortnew/1.html')}}">Men's</a>
      <ul>
      @foreach ($thoitrangnam as $data)
        <li>
          <a href="{{asset('category/'.$data->TenKhongDau.'/'.$data->id.'.html')}}">{{$data->Name}}</a>         
        </li>  
      @endforeach            
      </ul>
    </li>
    <li><a href="{{asset('thoitrangnam/sortnew/2.html')}}">Women's</a>
      <ul>
      @foreach ($thoitrangnu as $data)
        <li>
          <a href="{{asset('category/'.$data->TenKhongDau.'/'.$data->id.'.html')}}">{{$data->Name}}</a>         
        </li>  
      @endforeach            
      </ul>
    </li>
    <li><a href="shop-grid-sidebar.html">Accessories </a>
      <ul>
        <li><a href="shop-grid-sidebar.html">Sunglasses</a>
          <ul>
            <li><a href="shop-grid-sidebar.html">Over-Sized</a></li>
            <li><a href="shop-grid-sidebar.html">Wayfarer</a></li>
            <li><a href="shop-grid-sidebar.html">Premium Brands</a></li>
            <li><a href="shop-grid-sidebar.html">Uv Glass</a></li>
            <li><a href="shop-grid-sidebar.html">Colores</a></li>
          </ul>
        </li>
        <li><a href="shop-grid-sidebar.html">Watches</a>
          <ul>
            <li><a href="shop-grid-sidebar.html">Fastrack</a></li>
            <li><a href="shop-grid-sidebar.html">Timex</a></li>
            <li><a href="shop-grid-sidebar.html">Titan</a></li>
            <li><a href="shop-grid-sidebar.html">Fossil</a></li>
            <li><a href="shop-grid-sidebar.html">Casio</a></li>
          </ul>
        </li>
        <li><a href="shop-grid-sidebar.html">Bags & Wallets</a>
          <ul>
            <li><a href="shop-grid-sidebar.html">Handbags</a></li>
            <li><a href="shop-grid-sidebar.html">Sling Bags</a></li>
            <li><a href="shop-grid-sidebar.html">Wallets & Belts</a></li>
            <li><a href="shop-grid-sidebar.html">Totes</a></li>
            <li><a href="shop-grid-sidebar.html">Travel Bags</a></li>
          </ul>
        </li>
        <li><a href="shop-grid-sidebar.html">Western Wear</a>
          <ul>
            <li><a href="shop-grid-sidebar.html">Jeans</a></li>
            <li><a href="shop-grid-sidebar.html">Polo's & T-Shirts</a></li>
            <li><a href="shop-grid-sidebar.html">Shirts Tops</a></li>
            <li><a href="shop-grid-sidebar.html">Gymwear</a></li>
            <li><a href="shop-grid-sidebar.html">Sleep Wear</a></li>
          </ul>
        </li>
      </ul>
    </li>
    <li><a href="blog.html">Blog</a></li>
    <li><a href="contact-us.html">Contact Us</a></li>
  </ul>
  <div class="top-links">
    <ul class="links">
    @if (Auth::check())
      <li><a title="Log In" href="{{asset('myaccount')}}">My Account</a></li>
      <li><a title="Log In" href="{{asset('dangnhap')}}">{{Auth::user()->name}}</a></li>
      <li><a title="Log In" href="{{asset('dangxuat')}}">Đăng xuất</a></li>
    @else
      <li><a title="Track Order" href="{{asset('dangky')}}">Đăng ký</a></li>
      <li><a title="Log In" href="{{asset('dangnhap')}}">Đăng nhập</a></li>
    @endif
    </ul>
    <div class="language-box">
      <select class="selectpicker" data-width="fit">
        <option>English</option>
        <option>Francais</option>
        <option>German</option>
        <option>Español</option>
      </select>
    </div>
    <div class="currency-box">
      <form class="form-inline">
        <div class="input-group">
          <div class="currency-addon">
            <select class="currency-selector">
              <option data-symbol="$">USD</option>
              <option data-symbol="€">EUR</option>
              <option data-symbol="£">GBP</option>
              <option data-symbol="¥">JPY</option>
              <option data-symbol="$">CAD</option>
              <option data-symbol="$">AUD</option>
            </select>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div id="page"> 
  <!-- Header -->
  <header>
    <div class="header-container">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-sm-3 col-xs-12">
            <div class="logo"><a title="ecommerce Template" href="{{asset('/')}}"><img alt="ecommerce Template" src="images/logo.png"></a></div>
            <div class="nav-icon">
              <div class="mega-container visible-lg visible-md visible-sm">
                <div class="navleft-container">
                  <div class="mega-menu-title">
                    <h3><i class="fa fa-navicon"></i>Danh mục</h3>
                  </div>
                  <div class="mega-menu-category">
                    <ul class="nav">
                      <li class="nosub"><a href="{{asset('/')}}">Home</a>                       
                      </li>                      
                      <li><a href="{{asset('thoitrangnam/sortnew/1.html')}}">Men's</a>
                        <div class="wrap-popup column1">
                          <div class="popup">
                            <ul class="nav">
                            @foreach ($thoitrangnam as $data)
                              <li><a href="{{asset('category/'.$data->TenKhongDau.'/'.$data->id.'.html')}}">{{$data->Name}}</a></li>
                            @endforeach                                                          
                            </ul>
                          </div>
                        </div>
                      </li>
                      <li><a href="{{asset('thoitrangnam/sortnew/2.html')}}">Women's</a>
                        <div class="wrap-popup column1">
                          <div class="popup">
                            <ul class="nav">
                            @foreach ($thoitrangnu as $data)
                              <li><a href="{{asset('category/'.$data->TenKhongDau.'/'.$data->id.'.html')}}">{{$data->Name}}</a></li>
                            @endforeach                                                          
                            </ul>
                          </div>
                        </div>
                      </li>                      
                      <li class="nosub"><a href="shop-grid-sidebar.html">Accessories</a></li>
                      <li><a href="blog.html">Blog</a>
                        <div class="wrap-popup column1">
                          <div class="popup">
                            <ul class="nav">
                              <li><a href="blog.html">Blog</a></li>
                              <li><a href="blog-archive.html">Blog Archive</a></li>
                              <li><a href="blog_single_post.html">Blog Single</a></li>
                            </ul>
                          </div>
                        </div>
                      </li>
                      <li class="nosub"><a href="contact.html">Contact Us</a></li>
                    </ul>
                    <div class="side-banner"><img src="images/top-banner.jpg" alt="Flash Sale" class="img-responsive"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-9 col-sm-9 col-xs-12 jtv-rhs-header">
            <div class="jtv-mob-toggle-wrap">
              <div class="mm-toggle"><i class="fa fa-reorder"></i><span class="mm-label">Menu</span></div>
            </div>
            <div class="jtv-header-box">
              <div class="search_cart_block">
                <div class="search-box hidden-xs">
                  <form id="search_mini_form" action="{{asset('search')}}" method="get" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input id="search" type="text" name="Search" value="" class="searchbox" placeholder="Nhập sản phẩm bạn muốn tìm ..." maxlength="128">
                    <button type="submit" title="Search" class="search-btn-bg" id="submit-button"><span class="hidden-sm">Tìm kiếm</span><i class="fa fa-search hidden-xs hidden-lg hidden-md"></i></button>
                  </form>
                </div>
                <div id="search-data">
                  {{-- <div class="live-search">
                    <ul>
                      <li>
                        <img src="upload/9SBM_AK190007-1.jpg" width="60px" height="80px">
                        <a href=""><p>ádasdasdasd</p></a>
                        <div style="clear: both;"></div>
                      </li>
                      <li>
                        <img src="upload/9SBM_AK190007-1.jpg" width="60px" height="80px">
                        <a href=""><p>ádasdasdasd</p></a>
                        <div style="clear: both;"></div>
                      </li>
                      <li>
                        <img src="upload/9SBM_AK190007-1.jpg" width="60px" height="80px">
                        <a href=""><p>ádasdasdasd</p></a>
                        <div style="clear: both;"></div>
                      </li>
                      <li>
                        <img src="upload/9SBM_AK190007-1.jpg" width="60px" height="80px">
                        <a href=""><p>ádasdasdasd</p></a>
                        <div style="clear: both;"></div>
                      </li>
                      <li>
                        <img src="upload/9SBM_AK190007-1.jpg" width="60px" height="80px">
                        <a href=""><p>ádasdasdasd</p></a>
                        <div style="clear: both;"></div>
                      </li>
                      <li>
                        <img src="upload/9SBM_AK190007-1.jpg" width="60px" height="80px">
                        <a href=""><p>ádasdasdasd</p></a>
                        <div style="clear: both;"></div>
                      </li>
                      <li>
                        <img src="upload/9SBM_AK190007-1.jpg" width="60px" height="80px">
                        <a href=""><p>ádasdasdasd</p></a>
                        <div style="clear: both;"></div>
                      </li>
                    </ul>
                  </div> --}}
                </div>
                <div class="right_menu">
                  <div class="menu_top">
                    <div class="top-cart-contain pull-right">
                      <div class="mini-cart">
                        <div class="basket"><a class="basket-icon" href="{{asset('cart/show')}}"><i class="fa fa-shopping-basket"></i> Giỏ hàng <span>{{Cart::count()}}</span></a>
                          <div class="top-cart-content">
                            <div class="block-subtitle">
                              <div class="top-subtotal">{{Cart::count()}} items, <span class="price">{{number_format(Cart::total(),0,',','.')}} đ</span></div>
                            </div>
                            <ul class="mini-products-list" id="cart-sidebar">
                            @foreach (Cart::content() as $items)                             
                              <li class="item">
                                <div class="item-inner"><a class="product-image" title="product tilte is here" href="product-detail.html"><img alt="product tilte is here" src="{{asset('public/upload/'.$items->options->img)}}" width="60px" height="69px"></a>
                                  <div class="product-details">
                                    <div class="access"><a class="btn-remove1" title="Remove This Item" href="{{asset('cart/delete/'.$items->rowId)}}">Remove</a> <a class="btn-edit" title="Edit item" href="{{asset('cart/show')}}"><i class="fa fa-pencil"></i><span class="hidden">Edit item</span></a> </div>
                                    <p class="product-name"><a href="{{asset('products-detail/'.$items->options->tenkhongdau.'/'.$items->id.'.html')}}">{{$items->name}}</a></p>
                                    <strong>{{$items->qty}}</strong> x <span class="price">{{$items->price}} đ</span></div>
                                </div>
                              </li>
                            @endforeach                            
                            </ul>
                            <div class="actions"> <a href="{{asset('cart/show')}}" class="view-cart"><span>View Cart</span></a>
                              <a href="{{asset('cart/show')}}"><button onclick="window.location.href='checkout.html'" class="btn-checkout" title="Checkout" type="button"><span>Checkout</span></button></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="language-box hidden-xs">
                    <select class="selectpicker" data-width="fit">
                      <option>English</option>
                      <option>Francais</option>
                      <option>German</option>
                      <option>Español</option>
                    </select>
                  </div>
                  <div class="currency-box hidden-xs">
                    <form class="form-inline">
                      <div class="input-group">
                        <div class="currency-addon">
                          <select class="currency-selector">
                            <option data-symbol="$">USD</option>
                            <option data-symbol="€">EUR</option>
                            <option data-symbol="£">GBP</option>
                            <option data-symbol="¥">JPY</option>
                            <option data-symbol="$">CAD</option>
                            <option data-symbol="$">AUD</option>
                          </select>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="top_section hidden-xs">
                <div class="toplinks">
                  <div class="site-dir hidden-xs"> <a class="hidden-sm" href="#"><i class="fa fa-phone"></i> <strong>Liên hệ:</strong> 0868928495</a> <a href="mailto:support@example.com"><i class="fa fa-envelope"></i> hamieu1@gmail.com</a> </div>
                  <ul class="links">                                      
                  @if (Auth::check())
                    <li><a title="Log In" href="{{asset('myaccount')}}">My Account</a></li>
                    <li><a title="Log In" href="{{asset('dangnhap')}}">{{Auth::user()->name}}</a></li>
                    <li><a title="Log In" href="{{asset('dangxuat')}}">Đăng xuất</a></li>
                  @else
                    <li><a title="Track Order" href="{{asset('dangky')}}">Đăng ký</a></li>
                    <li><a title="Log In" href="{{asset('dangnhap')}}">Đăng nhập</a></li>
                  @endif
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>