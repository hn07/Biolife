<footer id="footer" class="footer layout-03">
    <div class="footer-content background-footer-03">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-9">
                    <section class="footer-item">
                        <a href="index-2.html" class="logo footer-logo"><img
                                src="{{ URL::asset('frontend/assets/images/organic-3.png') }}" alt="biolife logo"
                                width="135" height="34"></a>
                        <div class="footer-phone-info">
                            <i class="biolife-icon icon-head-phone"></i>
                            <p class="r-info">
                                <span>Hotline?</span>
                                <span>032 628 4270</span>
                            </p>
                        </div>

                    </section>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 md-margin-top-5px sm-margin-top-50px xs-margin-top-40px">
                    <section class="footer-item">
                        <h3 class="section-title">Liên kết hữu ích</h3>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-xs-6">
                                <div class="wrap-custom-menu vertical-menu-2">
                                    <ul class="menu">
                                        <li><a href="#">Thông tin về chúng tôi</a></li>
                                        <li><a href="#">Dịch vụ của chúng tôi</a></li>
                                        <li><a href="#">Dự án</a></li>
                                        <li><a href="#">Liên hệ chúng tôi</a></li>
                                        <li><a href="#">Sáng tạo</a></li>
                                        <li><a href="#">Chứng nhận</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 md-margin-top-5px sm-margin-top-50px xs-margin-top-40px">
                    <section class="footer-item">
                        <h3 class="section-title">Văn phòng</h3>
                        <div class="contact-info-block footer-layout xs-padding-top-10px">
                            <ul class="contact-lines">
                                <li>
                                    <p class="info-item">
                                        <i class="biolife-icon icon-location"></i>
                                        <b class="desc">Nguyen Thi Minh Khai St,Dist 1, HCM City, Viet Nam
                                        </b>
                                    </p>
                                </li>
                                <li>
                                    <p class="info-item">
                                        <i class="biolife-icon icon-phone"></i>
                                        <b class="desc">Điện thoại: 032 628 4270</b>
                                    </p>
                                </li>
                                <li>
                                    <p class="info-item">
                                        <i class="biolife-icon icon-letter"></i>
                                        <b class="desc">Email: nguyennham2580@gmail.com</b>
                                    </p>
                                </li>
                                <li>
                                    <p class="info-item">
                                        <i class="biolife-icon icon-clock"></i>
                                        <b class="desc">Làm việc từ 8h30 - 17h00 các ngày trong tuần</b>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="biolife-social inline">
                            <ul class="socials">
                                <li><a href="#" title="twitter" class="socail-btn"><i
                                            class="fa-brands fa-twitter"></i></i></a></li>
                                <li><a href="#" title="facebook" class="socail-btn"><i
                                            class="fa-brands fa-facebook"></i></i></a></li>
                                <li><a href="#" title="pinterest" class="socail-btn"><i
                                            class="fa-brands fa-pinterest"></i></i></a></li>
                                <li><a href="#" title="youtube" class="socail-btn"><i
                                            class="fa-brands fa-youtube"></i></i></a></li>
                                <li><a href="#" title="instagram" class="socail-btn"><i
                                            class="fa-brands fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="separator sm-margin-top-70px xs-margin-top-40px"></div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">

                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="payment-methods">
                        <ul>
                            <li><a href="#" class="payment-link"><img
                                        src="{{ URL::asset('frontend/assets/images/card1.jpg') }}" width="51"
                                        height="36" alt=""></a></li>
                            <li><a href="#" class="payment-link"><img
                                        src="{{ URL::asset('frontend/assets/images/card2.jpg') }}" width="51"
                                        height="36" alt=""></a></li>
                            <li><a href="#" class="payment-link"><img
                                        src="{{ URL::asset('frontend/assets/images/card3.jpg') }}" width="51"
                                        height="36" alt=""></a></li>
                            <li><a href="#" class="payment-link"><img
                                        src="{{ URL::asset('frontend/assets/images/card4.jpg') }}" width="51"
                                        height="36" alt=""></a></li>
                            <li><a href="#" class="payment-link"><img
                                        src="{{ URL::asset('frontend/assets/images/card5.jpg') }}" width="51"
                                        height="36" alt=""></a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!--Footer For Mobile-->
<div class="mobile-footer">
    <div class="mobile-footer-inner">
        <div class="mobile-block block-menu-main">
            <a class="menu-bar menu-toggle btn-toggle" data-object="open-mobile-menu" href="javascript:void(0)">
                <span class="fa fa-bars"></span>
                <span class="text">Menu</span>
            </a>
        </div>
        <div class="mobile-block block-sidebar">
            <a class="menu-bar filter-toggle btn-toggle" data-object="open-mobile-filter" href="javascript:void(0)">
                <i class="fa fa-sliders" aria-hidden="true"></i>
                <span class="text">Sidebar</span>
            </a>
        </div>
        <div class="mobile-block block-minicart">
            <a class="link-to-cart" href="{{ route('shop.shopping-cart') }}">
                <span class="fa fa-shopping-bag" aria-hidden="true"></span>
                <span class="text">Cart</span>
            </a>
        </div>
        <div class="mobile-block block-global">
            <a class="menu-bar myaccount-toggle btn-toggle" data-object="global-panel-opened"
                href="javascript:void(0)">
                <span class="fa fa-globe"></span>
                <span class="text">Global</span>
            </a>
        </div>
    </div>
</div>

<!--Mobile Global Menu-->
<div class="mobile-block-global">
    <div class="biolife-mobile-panels">
        <span class="biolife-current-panel-title">Global</span>
        <a class="biolife-close-btn" data-object="global-panel-opened" href="#">&times;</a>
    </div>
    <div class="block-global-contain">
        <div class="glb-item my-account">
            <b class="title">My Account</b>
            <ul class="list">
                @if (Session::has('loginId_Customer'))
                    <li class="list-item"><a href="{{ route('checkout.index') }}">Thanh toán</a></li>
                    <li class="list-item"><a href="{{ route('authentication.logout') }}">Đăng xuất</a></li>
                @else
                    <li class="list-item"><a href="{{ route('authentication.index') }}">Đăng nhập</a></li>
                    <li class="list-item"><a href="{{ route('authentication.regestration') }}">Đăng ký</a></li>
                @endif
            </ul>
        </div>

        <div class="glb-item languages">
            <b class="title">Language</b>
            <ul class="list inline">
                <li class="list-item"><a href="#"><img
                            src="{{ URL::asset('frontend/assets/images/languages/vn.jpg') }}" alt="flag"
                            width="24" height="18"></a></li>

            </ul>
        </div>
    </div>
</div>

<!--Quickview Popup-->
<div id="biolife-quickview-block" class="biolife-quickview-block">
    <div class="quickview-container">
        <a href="#" class="btn-close-quickview" data-object="open-quickview-block"><span
                class="biolife-icon icon-close-menu"></span></a>
        <div class="biolife-quickview-inner">
            <div class="media">
                <ul class="biolife-carousel quickview-for"
                    data-slick='{"arrows":false,"dots":false,"slidesMargin":30,"slidesToShow":1,"slidesToScroll":1,"fade":true,"asNavFor":".quickview-nav"}'>
                    <li><img src="{{ URL::asset('frontend/assets/images/details-product/detail_01.jpg') }}"
                            alt="" width="500" height="500"></li>
                    <li><img src="{{ URL::asset('frontend/assets/images/details-product/detail_02.jpg') }}"
                            alt="" width="500" height="500"></li>
                    <li><img src="{{ URL::asset('frontend/assets/images/details-product/detail_03.jpg') }}"
                            alt="" width="500" height="500"></li>
                    <li><img src="{{ URL::asset('frontend/assets/images/details-product/detail_04.jpg') }}"
                            alt="" width="500" height="500"></li>
                    <li><img src="{{ URL::asset('frontend/assets/images/details-product/detail_05.jpg') }}"
                            alt="" width="500" height="500"></li>
                    <li><img src="{{ URL::asset('frontend/assets/images/details-product/detail_06.jpg') }}"
                            alt="" width="500" height="500"></li>
                    <li><img src="{{ URL::asset('frontend/assets/images/details-product/detail_07.jpg') }}"
                            alt="" width="500" height="500"></li>

                </ul>
                <ul class="biolife-carousel quickview-nav"
                    data-slick='{"arrows":true,"dots":false,"centerMode":false,"focusOnSelect":true,"slidesMargin":10,"slidesToShow":3,"slidesToScroll":1,"asNavFor":".quickview-for"}'>
                    <li><img src="{{ URL::asset('frontend/assets/images/details-product/thumb_01.jpg') }}"
                            alt="" width="88" height="88"></li>
                    <li><img src="{{ URL::asset('frontend/assets/images/details-product/thumb_02.jpg') }}"
                            alt="" width="88" height="88"></li>
                    <li><img src="{{ URL::asset('frontend/assets/images/details-product/thumb_03.jpg') }}"
                            alt="" width="88" height="88"></li>
                    <li><img src="{{ URL::asset('frontend/assets/images/details-product/thumb_04.jpg') }}"
                            alt="" width="88" height="88"></li>
                    <li><img src="{{ URL::asset('frontend/assets/images/details-product/thumb_05.jpg') }}"
                            alt="" width="88" height="88"></li>
                    <li><img src="{{ URL::asset('frontend/assets/images/details-product/thumb_06.jpg') }}"
                            alt="" width="88" height="88"></li>
                    <li><img src="{{ URL::asset('frontend/assets/images/details-product/thumb_07.jpg') }}"
                            alt="" width="88" height="88"></li>

            </div>
            <div class="product-attribute">
                <h4 class="title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                <div class="rating">
                    <p class="star-rating"><span class="width-80percent"></span></p>
                </div>

                <div class="price price-contain">
                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                </div>
                <p class="excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel maximus lacus.
                    Duis ut mauris eget justo dictum tempus sed vel tellus.</p>
                <div class="from-cart">
                    <div class="qty-input">
                        <input type="text" name="qty12554" value="1" data-max_value="20" data-min_value="1"
                            data-step="1">
                        <a href="#" class="qty-btn btn-up"><i class="fa fa-caret-up"
                                aria-hidden="true"></i></a>
                        <a href="#" class="qty-btn btn-down"><i class="fa fa-caret-down"
                                aria-hidden="true"></i></a>
                    </div>
                    <div class="buttons">
                        <a href="#" class="btn add-to-cart-btn btn-bold">add to cart</a>
                    </div>
                </div>

                <div class="product-meta">
                    <div class="product-atts">
                        <div class="product-atts-item">
                            <b class="meta-title">Categories:</b>
                            <ul class="meta-list">
                                <li><a href="#" class="meta-link">Milk & Cream</a></li>
                                <li><a href="#" class="meta-link">Fresh Meat</a></li>
                                <li><a href="#" class="meta-link">Fresh Fruit</a></li>
                            </ul>
                        </div>
                        <div class="product-atts-item">
                            <b class="meta-title">Tags:</b>
                            <ul class="meta-list">
                                <li><a href="#" class="meta-link">food theme</a></li>
                                <li><a href="#" class="meta-link">organic food</a></li>
                                <li><a href="#" class="meta-link">organic theme</a></li>
                            </ul>
                        </div>
                        <div class="product-atts-item">
                            <b class="meta-title">Brand:</b>
                            <ul class="meta-list">
                                <li><a href="#" class="meta-link">Fresh Fruit</a></li>
                            </ul>
                        </div>
                    </div>
                    <span class="sku">SKU: N/A</span>
                    <div class="biolife-social inline add-title">
                        <span class="fr-title">Share:</span>
                        <ul class="socials">
                            <li><a href="#" title="twitter" class="socail-btn"><i class="fa fa-twitter"
                                        aria-hidden="true"></i></a></li>
                            <li><a href="#" title="facebook" class="socail-btn"><i class="fa fa-facebook"
                                        aria-hidden="true"></i></a></li>
                            <li><a href="#" title="pinterest" class="socail-btn"><i class="fa fa-pinterest"
                                        aria-hidden="true"></i></a></li>
                            <li><a href="#" title="youtube" class="socail-btn"><i class="fa fa-youtube"
                                        aria-hidden="true"></i></a></li>
                            <li><a href="#" title="instagram" class="socail-btn"><i class="fa fa-instagram"
                                        aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scroll Top Button -->
{{-- js main --}}
<a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/biolife.framework.js') }}"></script>
<script src="{{ asset('frontend/assets/js/functions.js') }}"></script>
{{-- js main --}}

<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"></script>
<!-- MDB -->

{{-- Alertity js --}}
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css" />
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css" />
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css" />
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css" />
{{-- Alertity js --}}


<script>
    var proQty = $(".pro-qty");
    proQty.on("click", ".qty-btn", function() {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.hasClass("inc")) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find("input").val(newVal);

        //update cart
        const rowId = $button.parent().find("input").data("rowid");
        updateCart(rowId, newVal);
    });

    function updateCart(rowId, qty) {
        $.ajax({
            type: "GET",
            url: "/shop/update-cart",
            data: {
                rowId: rowId,
                qty: qty,
            },
            success: function(res) {
                alertify.success('Cập nhật giở hàng thành công');
                setTimeout(() => {
                    location.reload();
                }, 1000);

            },
            error: function(err) {
                alertify.success('Cập nhật giỏ hàng thất bại');
            },
        });
    }

    function confirmDelete() {
        // Hiển thị cảnh báo với SweetAlert2
        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa toàn bộ giỏ hàng không?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            // Nếu người dùng nhấn Xóa, thực hiện xóa giỏ hàng
            if (result.isConfirmed) {
                // Thực hiện xóa giỏ hàng
                $.ajax({
                    type: "GET",
                    url: "/shop/delete-all-cart",
                    success: function(res) {
                        // Hiển thị thông báo thành công
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        // Sau 1s, tự động reload lại trang
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    },
                    error: function(err) {
                        // Hiển thị thông báo lỗi
                        alertify.error('Xóa giỏ hàng thất bại');
                    },
                });
            }
            // Nếu người dùng nhấn Hủy, không làm gì cả
            else {
                // Không làm gì cả
            }
        });
    }
    
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.input-search-ajax').keyup(function() {
            var keyword = $(this).val();
            if (keyword.length > 0) {
                $.ajax({
                    url: "{{ route('search.ajax-search-product') }}?key=" +
                    keyword, // Đường dẫn đến phương thức xử lý tìm kiếm
                    type: 'GET',
                    success: function(res) {
                        $('.search-ajax-result').html(res);
                        $('.search-ajax-result').show(500);
                    }
                });
            } else {
                $('.search-ajax-result').html('');
                $('.search-ajax-result').hide();
            }
        });
    });


    // $(document).on('click', '.search-ajax-result li', function() {
    //     var value = $(this).text();
    //     $('.input-text').val(value);
    //     $('.search-ajax-result').hide();
    // });

    // $(document).on('click', '.search-ajax-result', function() {
    //     $('.search-ajax-result').hide();
    // });
</script>



