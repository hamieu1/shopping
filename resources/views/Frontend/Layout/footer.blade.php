  <footer>
    <div class="footer-inner">
      <div class="news-letter">
        <div class="container">
          <div class="heading text-center">
            <h2>Đăng ký ngay!</h2>
            <span>Nhập địa chỉ Email của bạn</span> </div>
          <form>
            <input type="email" placeholder="Nhập email của bạn" required>
            <button type="submit">Gửi</button>
          </form>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <h4>Liên hệ</h4>
            <div class="contacts-info">
              <p>Shop thời trang Đào Minh Hà </p>
              <address>
              <i class="fa fa-location-arrow"></i> <span>Long Biên - Đức Giang<br>
              Hà Nội</span>
              </address>
              <div class="phone-footer"><i class="fa fa-phone"></i> 0868928495</div>
              <div class="email-footer"><i class="fa fa-envelope"></i> <a href="mailto:support@example.com">hamieu1@gmail.com</a> </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-2 col-sm-6 col-xs-12">
            <h4>Liên kết hữu ích</h4>
            <ul class="links">
              <li><a href="#">Sản phẩm</a></li>
              <li><a href="#">Tìm của hàng</a></li>
              <li><a href="#">Ảnh</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="blog.html">Blog</a></li>
              <li><a href="sitemap.html">Bản đồ</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-2 col-sm-6 col-xs-12">
            <h4>Shop</h4>
            <ul class="links">
              <li><a href="about-us.html">About Us</a></li>
              <li><a href="faq.html">FAQs</a></li>
              <li><a href="#">Phương thưc vận chuyển</a></li>
              <li><a href="contact.html">Contact</a></li>
              <li><a href="#">Hỗ trợ</a></li>
              <li><a href="#">Nhà bán lẻ</a></li>
            </ul>
          </div>
          <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6">
            <div class="social">
              <h4>Follow Us</h4>
              <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
              </ul>
            </div>
            <div class="payment-accept">
              <h4>Thanh toán</h4>
              <div class="payment-icon"><img src="images/paypal.png" alt="paypal"> <img src="images/visa.png" alt="visa"> <img src="images/american-exp.png" alt="american express"> <img src="images/mastercard.png" alt="mastercard"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-xs-12 coppyright text-center">Copyright © 2019 Đào Minh Hà.</div>
        </div>
      </div>
    </div>
  </footer>
</div>

<!-- JavaScript --> 
{{-- <script src="js/jquery-2.1.4.min"></script> --}}
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/revslider.js"></script> 
<script src="js/main.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/mob-menu.js"></script> 
<script src="js/countdown.js"></script> 
<script src="js/jquery.flexslider.js"></script>
<script src="js/cloud-zoom.js"></script>
<script>
jQuery(document).ready(function(){
  jQuery('#rev_slider_1').show().revolution({
    dottedOverlay: 'none',
    delay: 5000,
    startwidth: 858,
    startheight: 500,

    hideThumbs: 200,
    thumbWidth: 200,
    thumbHeight: 50,
    thumbAmount: 2,

    navigationType: 'thumb',
    navigationArrows: 'solo',
    navigationStyle: 'round',

    touchenabled: 'on',
    onHoverStop: 'on',

    swipe_velocity: 0.7,
    swipe_min_touches: 1,
    swipe_max_touches: 1,
    drag_block_vertical: false,

    spinner: 'spinner0',
    keyboardNavigation: 'off',

    navigationHAlign: 'center',
    navigationVAlign: 'bottom',
    navigationHOffset: 0,
    navigationVOffset: 20,

    soloArrowLeftHalign: 'left',
    soloArrowLeftValign: 'center',
    soloArrowLeftHOffset: 20,
    soloArrowLeftVOffset: 0,

    soloArrowRightHalign: 'right',
    soloArrowRightValign: 'center',
    soloArrowRightHOffset: 20,
    soloArrowRightVOffset: 0,

    shadow: 0,
    fullWidth: 'on',
    fullScreen: 'off',

    stopLoop: 'off',
    stopAfterLoops: -1,
    stopAtSlide: -1,

    shuffle: 'off',

    autoHeight: 'off',
    forceFullWidth: 'on',
    fullScreenAlignForce: 'off',
    minFullScreenHeight: 0,
    hideNavDelayOnMobile: 1500,

    hideThumbsOnMobile: 'off',
    hideBulletsOnMobile: 'off',
    hideArrowsOnMobile: 'off',
    hideThumbsUnderResolution: 0,

    hideSliderAtLimit: 0,
    hideCaptionAtLimit: 0,
    hideAllCaptionAtLilmit: 0,
    startWithSlide: 0,
    fullScreenOffsetContainer: ''
  });
});
</script> 
<!-- Hot Deals Timer --> 
<script>
var dthen1 = new Date("12/25/17 11:59:00 PM");
start = "08/04/15 03:02:11 AM";
start_date = Date.parse(start);
var dnow1 = new Date(start_date);
if (CountStepper > 0)
ddiff = new Date((dnow1) - (dthen1));
else
ddiff = new Date((dthen1) - (dnow1));
gsecs1 = Math.floor(ddiff.valueOf() / 1000);

var iid1 = "countbox_1";
CountBack_slider(gsecs1, "countbox_1", 1);
</script>
</body>
</html>