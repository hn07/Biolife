@extends('Frontend.Layouts.main')
@section('main-content')
    <div class="page-contain">

        <!-- Main content -->
        <div id="main-content" class="main-content">

            <!--Block 01: Main slide-->
            <div class="main-slide block-slider">
                <ul class="biolife-carousel nav-none-on-mobile"
                    data-slick='{"arrows": true, "dots": false, "slidesMargin": 0, "slidesToShow": 1, "infinite": true, "speed": 800}'>
                    <li>
                        <div class="slide-contain slider-opt03__layout01">
                            <div class="media">
                                <div class="child-elememt">
                                    <a href="#" class="link-to">
                                        <img src="assets/images/home-03/LARVIVA-PL.png" width="604" height="580"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="text-content">
                                <i class="first-line">Sản phẩm nhà Biolife</i>
                                <h3 class="second-line">Cam kết chất lượng 100%</h3>
                                <p class="third-line">Uy tính làm nên thương hiệu!</p>
                                <p class="buttons">
                                    <a href="{{ route('shop.tat-ca-san-pham') }}" class="btn btn-bold">Shop now</a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slide-contain slider-opt03__layout01">
                            <div class="media">
                                <div class="child-elememt"><a href="#" class="link-to"><img
                                            src="assets/images/home-03/LARVIVA-ZOEA-AND-MYSIS-1.png" width="604"
                                            height="580" alt=""></a></div>
                            </div>
                            <div class="text-content">
                                <i class="first-line">Sản phẩm nhà Biolife</i>
                                <h3 class="second-line">Cam kết chất lượng 100%</h3>
                                <p class="third-line">Uy tính làm nên thương hiệu!</p>
                                <p class="buttons">
                                    <a href="{{ route('shop.tat-ca-san-pham') }}" class="btn btn-bold">Shop now</a>
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <!--Block 02: Banner-->
            <div class="special-slide">
                <div class="container">
                    <ul class="biolife-carousel dots_ring_style"
                        data-slick='{"arrows": false, "dots": true, "slidesMargin": 30, "slidesToShow": 1, "infinite": true, "speed": 800, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 1}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":20, "dots": false}},{"breakpoint":480, "settings":{ "slidesToShow": 1}}]}'>
                        @foreach ($productAll as $item)
                            <li>
                                <div class="slide-contain biolife-banner__special">
                                    <div class="banner-contain">
                                        <div class="media">
                                            <a href="{{ route('shop.chi-tiet-san-pham', ['id' => $item->id]) }}"
                                                class="bn-link">
                                                <figure><img src="{{ $item->image }}" width="616" height="483"
                                                        alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="text-content">
                                            <b class="third-line"
                                                style="font-family: serif;">{{ $item->Category->name_category }}</b>
                                            <hr>
                                            <span
                                                class="third-line"><i>{{ Str::limit($item->description, 50, '...') }}</i></span>
                                            <div class="product-detail">
                                                <h4 class="product-name">{{ $item->name }}</h4>
                                                <div class="price price-contain">
                                                    <ins><span class="price-amount"><span
                                                                class="currencySymbol">{{ number_format($item->price) }}</span>
                                                            vnđ</span></ins>
                                                    <del><span class="price-amount"><span
                                                                class="currencySymbol">{{ number_format($item->price * 1.2) }}</span>
                                                            vnđ</span></del>
                                                </div>
                                                <div class="buttons">
                                                    <a href="{{ route('shop.add-to-cart', ['id' => $item->id]) }}"
                                                        class="btn add-to-cart-btn">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="biolife-service type01 biolife-service__type01 sm-margin-top-0 xs-margin-top-45px">
                        <b class="txt-show-01">100%Nature</b>
                        <i class="txt-show-02">Chất lượng Châu Âu cho tôm giống Việt</i>
                        <ul class="services-list">
                            <li>
                                <div class="service-inner">
                                    <span class="number">1</span>
                                    <span class="biolife-icon icon-beer"></span>
                                    <h5 class="srv-name" href="#">sản phẩm được kiểm định nghiêm ngặt</h5>
                                </div>
                            </li>
                            <li>
                                <div class="service-inner">
                                    <span class="number">2</span>
                                    <span class="biolife-icon icon-schedule"></span>
                                    <h5 class="srv-name" href="#">Giao hàng nhanh chống</h5>
                                </div>
                            </li>
                            <li>
                                <div class="service-inner">
                                    <span class="number">3</span>
                                    <span class="biolife-icon icon-car"></span>
                                    <h5 class="srv-name">Free ship trong khu vực cần thơ</h5>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!--Block 03: Product Tab-->
            <div class="product-tab z-index-20 sm-margin-top-193px xs-margin-top-30px">
                <div class="container">
                    <div class="biolife-title-box">
                        <span class="subtitle">Tất cả các mặt hàng tốt nhất cho bạn</span>
                        <h3 class="main-title">Những sảm phẩm tương tự</h3>
                    </div>
                    <div class="biolife-tab biolife-tab-contain sm-margin-top-34px">

                        <div class="tab-content">
                            <div id="tab01_1st" class="tab-contain active">
                                <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain"
                                    data-slick='{"rows":2 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":25 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":15}}]}'>
                                    @foreach ($productAll as $item)
                                        <li class="product-item">
                                            <div class="contain-product layout-default">
                                                <div class="product-thumb">
                                                    <a href="{{ route('shop.chi-tiet-san-pham', ['id' => $item->id]) }}"
                                                        class="link-to-product">
                                                        <img src="{{ $item->image }}" alt="Vegetables" width="270"
                                                            height="270" class="product-thumnail">
                                                    </a>
                                                    <a class="lookup btn_call_quickview" href="#"><i
                                                            class="biolife-icon icon-search"></i></a>
                                                </div>
                                                <div class="info">
                                                    <b class="categories">{{ $item->Category->name_category }}</b>
                                                    <h4 class="product-title"><a
                                                            href="{{ route('shop.chi-tiet-san-pham', ['id' => $item->id]) }}"
                                                            class="pr-name">{{ $item->name }}</a></h4>
                                                    <div class="price ">
                                                        <ins><span class="price-amount"><span
                                                                    class="currencySymbol">{{ number_format($item->price) }}</span>
                                                                vnđ</span></ins>
                                                        <del><span class="price-amount"><span
                                                                    class="currencySymbol">{{ number_format($item->price * 1.2) }}</span>
                                                                vnđ</span></del>
                                                    </div>
                                                    <div class="slide-down-box">
                                                        <p class="message">Tất cả các sản phẩm đều được chọn lọc kỹ lưỡng
                                                            để đảm bảo an toàn.</p>
                                                        <div class="buttons">
                                                            <a href="{{ route('shop.add-to-cart', ['id' => $item->id]) }}"
                                                                class="btn add-to-cart-btn"><i
                                                                    class="fa fa-cart-arrow-down"
                                                                    aria-hidden="true"></i>add
                                                                to cart</a>
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
                </div>
            </div>

            <!--Block 04: Banner Promotion 01 -->
            <div class="banner-promotion-01 xs-margin-top-50px sm-margin-top-11px">
                <div class="biolife-banner promotion biolife-banner__promotion">
                    <div class="banner-contain">
                        <div class="media background-biolife-banner__promotion">
                            <div class="img-moving position-1">
                                <img src="assets/images/home-03/img-moving-pst-1.png" width="149" height="139"
                                    alt="img msv">
                            </div>
                            <div class="img-moving position-2">
                                <img src="assets/images/home-03/img-moving-pst-2.png" width="185" height="265"
                                    alt="img msv">
                            </div>
                            <div class="img-moving position-3">
                                <img src="assets/images/home-03/img-moving-pst-3-cut.png" width="384" height="151"
                                    alt="img msv">
                            </div>
                            <div class="img-moving position-4">
                                <img src="assets/images/home-03/img-moving-pst-4.png" width="198" height="269"
                                    alt="img msv">
                            </div>
                        </div>
                        <div class="text-content">
                            <div class="container text-wrap">
                                <i class="first-line">Healthy Fruit juice</i>
                                <span class="second-line">Vegetable Always fresh</span>
                                <p class="third-line">Food Heaven Made Easy sounds like the name of an amazingly delicious
                                    food delivery service, but don't be fooled...</p>
                                <div class="product-detail">
                                    <p class="txt-price"><span>Only:</span>$8.00</p>
                                    <a href="#" class="btn add-to-cart-btn">add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--Block 07: Brands-->
            <div class="brand-slide sm-margin-top-100px background-fafafa xs-margin-top-80px xs-margin-bottom-80px">
                <div class="container">
                    <ul class="biolife-carousel nav-center-bold nav-none-on-mobile"
                        data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}},{"breakpoint":450, "settings":{ "slidesToShow": 1, "slidesMargin":10}}]}'>
                        <li>
                            <div class="biolife-brd-container">
                                <a href="#" class="link">
                                    <figure><img src="assets/images/home-03/brd-01.jpg" width="214" height="163"
                                            alt=""></figure>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-brd-container">
                                <a href="#" class="link">
                                    <figure><img src="assets/images/home-03/brd-02.jpg" width="214" height="163"
                                            alt=""></figure>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-brd-container">
                                <a href="#" class="link">
                                    <figure><img src="assets/images/home-03/brd-03.jpg" width="153" height="163"
                                            alt=""></figure>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-brd-container">
                                <a href="#" class="link">
                                    <figure><img src="assets/images/home-03/brd-04.jpg" width="224" height="163"
                                            alt=""></figure>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-brd-container">
                                <a href="#" class="link">
                                    <figure><img src="assets/images/home-03/brd-01.jpg" width="214" height="163"
                                            alt=""></figure>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-brd-container">
                                <a href="#" class="link">
                                    <figure><img src="assets/images/home-03/brd-02.jpg" width="214" height="163"
                                            alt=""></figure>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-brd-container">
                                <a href="#" class="link">
                                    <figure><img src="assets/images/home-03/brd-03.jpg" width="153" height="163"
                                            alt=""></figure>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-brd-container">
                                <a href="#" class="link">
                                    <figure><img src="assets/images/home-03/brd-04.jpg" width="224" height="163"
                                            alt=""></figure>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!--Block 08: Blog Posts-->
            <div class="blog-posts sm-margin-top-93px sm-padding-top-72px xs-padding-bottom-50px">
                <div class="container">
                    <div class="biolife-title-box">
                        <span class="subtitle">Tin tức mới nhất và thú vị nhất</span>
                        <h3 class="main-title">Cập nhật tin tức mới nhất và thú vị nhất với sự đóng góp của các nhà nghiên
                            cứu hàng đầu!</h3>
                    </div>
                    <ul class="biolife-carousel nav-center nav-none-on-mobile xs-margin-top-36px"
                        data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":3, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 3}},{"breakpoint":992, "settings":{ "slidesToShow": 2}},{"breakpoint":768, "settings":{ "slidesToShow": 2}},{"breakpoint":600, "settings":{ "slidesToShow": 1}}]}'>
                        @foreach ($newsAll as $item)
                            <li>
                                <div class="post-item effect-01 style-bottom-info layout-02">
                                    <div class="thumbnail">
                                        <a href="{{ route('blog-post', ['id' => $item->id]) }}" class="link-to-post"><img
                                                src="{{ $item->image_news }}" width="370"
                                                height="270" alt=""></a>
                                        <div class="post-date">
                                            <span class="date">26</span>
                                            <span class="month">dec</span>
                                        </div>
                                    </div>
                                    <div class="post-content">
                                        <h4 class="post-name"><a href="#" class="linktopost">{{ $item->title }}</a></h4>
                                        <div class="post-meta">
                                            <a href="#" class="post-meta__item author"><img
                                                    src="assets/images/home-03/post-author.png" width="28"
                                                    height="28" alt=""><span>{{ $item->author }}</span></a>
                                            <a href="#" class="post-meta__item btn liked-count">2<span
                                                    class="biolife-icon icon-comment"></span></a>
                                            <a href="#" class="post-meta__item btn comment-count">6<span
                                                    class="biolife-icon icon-like"></span></a>
                                            <div class="post-meta__item post-meta__item-social-box">
                                                <span class="tbn"><i class="fa fa-share-alt"
                                                        aria-hidden="true"></i></span>
                                                <div class="inner-content">
                                                    <ul class="socials">
                                                        <li><a href="#" title="twitter" class="socail-btn"><i class="fa-brands fa-twitter"></i></a></li>
                                                        <li><a href="#" title="facebook" class="socail-btn"><i class="fa-brands fa-facebook"></i></a></li>
                                                        <li><a href="#" title="instagram" class="socail-btn"><i class="fa-brands fa-instagram"></i></a></li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="excerpt">{{ Str::limit($item->content,100,'...') }}</p>
                                        <div class="group-buttons">
                                            <a href="{{ route('blog-post', ['id' => $item->id]) }}" class="btn readmore">continue reading</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>

    </div>
@endsection
@section('scripts')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300&family=Zilla+Slab:wght@500&display=swap');
    </style>
    <script>
        @if(session('success'))
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500
          });
        @endif
      </script>
@endsection
