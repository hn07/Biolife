@extends('Frontend.Layouts.main')
@section('main-content')
    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="{{ route('index') }}" class="permal-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('shop.tat-ca-san-pham') }}" class="permal-link">Shop</a></li>
                <li class="nav-item"><span class="current-page">{{ $productDetail->name }}</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain single-product">
        <div class="container">

            <!-- Main content -->
            <div id="main-content" class="main-content">

                <!-- summary info -->
                @if (!empty($productDetail))
                    <div class="sumary-product single-layout">
                        <div class="media">
                            <ul class="biolife-carousel slider-for"
                                data-slick='{"arrows":false,"dots":false,"slidesMargin":30,"slidesToShow":1,"slidesToScroll":1,"fade":true,"asNavFor":".slider-nav"}'>


                                @foreach ($imageSub as $images)
                                    <li><img src="{{ $images->image }}" alt="" width="500" height="500"></li>
                                @endforeach

                            </ul>
                            <ul class="biolife-carousel slider-nav"
                                data-slick='{"arrows":false,"dots":false,"centerMode":false,"focusOnSelect":true,"slidesMargin":10,"slidesToShow":4,"slidesToScroll":1,"asNavFor":".slider-for"}'>
                                @foreach ($imageSub as $images)
                                    <li><img src="{{ $images->image }}" alt="" width="88" height="88">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="product-attribute">
                            <h3 class="title">{{ $productDetail->name }}</h3>
                            {{-- <div class="rating">
                            <p class="star-rating"><span class="width-80percent"></span></p>
                            <span class="review-count">(04 Reviews)</span>
                            <span class="qa-text">Q&A</span>
                            <b class="category">By: Natural food</b>
                        </div> --}}
                            <span class="sku">Mã sản phẩm: {{ $productDetail->code_product }}</span>
                            <p class="excerpt">{{ Str::limit($productDetail->description, 300, '...') }}</p>
                            <div class="price">
                                <ins><span class="price-amount"><span
                                            class="currencySymbol">{{ number_format($productDetail->price) }}</span>
                                        vnđ</span></ins>
                                <del><span class="price-amount"><span
                                            class="currencySymbol">{{ number_format($productDetail->price * 1.2) }}</span>
                                        vnđ</span></del>
                            </div>

                            <div class="shipping-info">
                                <p class="shipping-day">3-Day Shipping</p>
                                <p class="for-today">Pree Pickup Today</p>
                            </div>
                        </div>
                        <div class="action-form">
                            <form action="{{ route('shop.add-to-cart-post', ['id' => $productDetail->id]) }}"
                                method="POST">
                                <div class="quantity-box">
                                    <span class="title">Số lượng:</span>
                                    <div class="qty-input">
                                        <input type="text" name="qty" value="1" data-max_value="40"
                                            data-min_value="1" data-step="1" oninput="updateTotalPrice()">
                                        <a href="#" class="qty-btn btn-up"><i class="fa fa-caret-up"
                                                aria-hidden="true"></i></a>
                                        <a href="#" class="qty-btn btn-down"><i class="fa fa-caret-down"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="total-price-contain">
                                    <span class="title">Tổng giá tiền:</span>
                                    <p class="price" id="total-price">{{ number_format($productDetail->price) }}</p>
                                </div>
                                @csrf

                                <button class="buttons btn add-to-cart-btn"
                                    style="background-color: #007bff; color: #fff; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer;">add
                                    to cart</button>
                                <div class="social-media">
                                    <ul class="social-list">
                                        <li><a href="#" class="social-link"><i class="fa-brands fa-facebook"></i></a>
                                        </li>
                                        <li><a href="#" class="social-link"><i class="fa-brands fa-pinterest"></i></a>
                                        </li>
                                        <li><a href="#" class="social-link"><i
                                                    class="fa-solid fa-share-nodes"></i></a>
                                        </li>
                                        <li><a href="#" class="social-link"><i class="fa-brands fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>

                                <input type="hidden" name="product_id" value="{{ $productDetail->id }}">
                            </form>
                        </div>
                    </div>
                @else
                    <li>Không có sản phẩm</li>
                @endif
                <!-- Tab info -->
                <div class="product-tabs single-layout biolife-tab-contain">
                    <div class="tab-head">
                        <ul class="tabs">
                            <li class="tab-element active"><a href="#tab_1st" class="tab-link">Thông tin sản phẩm</a>
                            </li>
                            <li class="tab-element"><a href="#tab_2nd" class="tab-link">Ưu điểm</a></li>
                            <li class="tab-element"><a href="#tab_3rd" class="tab-link">Hướng dẫn sử dụng</a></li>
                            <li class="tab-element"><a href="#tab_4th" class="tab-link">ĐÁNH GIÁ CỦA KHÁCH HÀNG 
                                    <sup>(3)</sup></a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="tab_1st" class="tab-contain desc-tab active">
                            <p class="desc">{{ $productDetail->description }}</p>
                        </div>
                        <div id="tab_2nd" class="tab-contain addtional-info-tab">
                            <p class="desc">{{ $productDetail->beneficial }}</p>
                        </div>
                        <div id="tab_3rd" class="tab-contain shipping-delivery-tab">
                            <div class="accodition-tab biolife-accodition">
                                <p class="desc">{{ $productDetail->User_manual }}</p>

                            </div>
                        </div>
                        <div id="tab_4th" class="tab-contain review-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                        <div class="rating-info">
                                            <p class="index"><strong class="rating">4.4</strong>out of 5</p>
                                            <div class="rating">
                                                <p class="star-rating"><span class="width-80percent"></span></p>
                                            </div>
                                            <p class="see-all">See all 68 reviews</p>
                                            <ul class="options">
                                                <li>
                                                    <div class="detail-for">
                                                        <span class="option-name">5stars</span>
                                                        <span class="progres">
                                                            <span class="line-100percent"><span
                                                                    class="percent width-90percent"></span></span>
                                                        </span>
                                                        <span class="number">90</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="detail-for">
                                                        <span class="option-name">4stars</span>
                                                        <span class="progres">
                                                            <span class="line-100percent"><span
                                                                    class="percent width-30percent"></span></span>
                                                        </span>
                                                        <span class="number">30</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="detail-for">
                                                        <span class="option-name">3stars</span>
                                                        <span class="progres">
                                                            <span class="line-100percent"><span
                                                                    class="percent width-40percent"></span></span>
                                                        </span>
                                                        <span class="number">40</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="detail-for">
                                                        <span class="option-name">2stars</span>
                                                        <span class="progres">
                                                            <span class="line-100percent"><span
                                                                    class="percent width-20percent"></span></span>
                                                        </span>
                                                        <span class="number">20</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="detail-for">
                                                        <span class="option-name">1star</span>
                                                        <span class="progres">
                                                            <span class="line-100percent"><span
                                                                    class="percent width-10percent"></span></span>
                                                        </span>
                                                        <span class="number">10</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                                        <div class="review-form-wrapper">
                                            <span class="title">Submit your review</span>
                                            <form action="#" name="frm-review" method="post">
                                                <div class="comment-form-rating">
                                                    <label>1. Your rating of this products:</label>
                                                    <p class="stars">
                                                        <span>
                                                            <a class="btn-rating" data-value="star-1" href="#"><i
                                                                    class="fa fa-star-o" aria-hidden="true"></i></a>
                                                            <a class="btn-rating" data-value="star-2" href="#"><i
                                                                    class="fa fa-star-o" aria-hidden="true"></i></a>
                                                            <a class="btn-rating" data-value="star-3" href="#"><i
                                                                    class="fa fa-star-o" aria-hidden="true"></i></a>
                                                            <a class="btn-rating" data-value="star-4" href="#"><i
                                                                    class="fa fa-star-o" aria-hidden="true"></i></a>
                                                            <a class="btn-rating" data-value="star-5" href="#"><i
                                                                    class="fa fa-star-o" aria-hidden="true"></i></a>
                                                        </span>
                                                    </p>
                                                </div>
                                                <p class="form-row wide-half">
                                                    <input type="text" name="name" value=""
                                                        placeholder="Your name">
                                                </p>
                                                <p class="form-row wide-half">
                                                    <input type="email" name="email" value=""
                                                        placeholder="Email address">
                                                </p>
                                                <p class="form-row">
                                                    <textarea name="comment" id="txt-comment" cols="30" rows="10" placeholder="Write your review here..."></textarea>
                                                </p>
                                                <p class="form-row">
                                                    <button type="submit" name="submit">submit review</button>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="comments">
                                    <ol class="commentlist">
                                        <li class="review">
                                            <div class="comment-container">
                                                <div class="row">
                                                    <div class="comment-content col-lg-8 col-md-9 col-sm-8 col-xs-12">
                                                        <p class="comment-in"><span class="post-name">Quality is our way
                                                                of life</span><span class="post-date">01/04/2018</span></p>
                                                        <div class="rating">
                                                            <p class="star-rating"><span class="width-80percent"></span>
                                                            </p>
                                                        </div>
                                                        <p class="author">by: <b>Shop organic</b></p>
                                                        <p class="comment-text">There are few things in life that please
                                                            people more than the succulence of quality fresh fruit and
                                                            vegetables. At Fresh Fruits we work to deliver the world’s
                                                            freshest, choicest, and juiciest produce to discerning customers
                                                            across the UAE and GCC.</p>
                                                    </div>
                                                    <div
                                                        class="comment-review-form col-lg-3 col-lg-offset-1 col-md-3 col-sm-4 col-xs-12">
                                                        <span class="title">Was this review helpful?</span>
                                                        <ul class="actions">
                                                            <li><a href="#" class="btn-act like"
                                                                    data-type="like"><i class="fa fa-thumbs-up"
                                                                        aria-hidden="true"></i>Yes (100)</a></li>
                                                            <li><a href="#" class="btn-act hate"
                                                                    data-type="dislike"><i class="fa fa-thumbs-down"
                                                                        aria-hidden="true"></i>No (20)</a></li>
                                                            <li><a href="#" class="btn-act report"
                                                                    data-type="dislike"><i class="fa fa-flag"
                                                                        aria-hidden="true"></i>Report</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="review">
                                            <div class="comment-container">
                                                <div class="row">
                                                    <div class="comment-content col-lg-8 col-md-9 col-sm-8 col-xs-12">
                                                        <p class="comment-in"><span class="post-name">Quality is our way
                                                                of life</span><span class="post-date">01/04/2018</span></p>
                                                        <div class="rating">
                                                            <p class="star-rating"><span class="width-80percent"></span>
                                                            </p>
                                                        </div>
                                                        <p class="author">by: <b>Shop organic</b></p>
                                                        <p class="comment-text">There are few things in life that please
                                                            people more than the succulence of quality fresh fruit and
                                                            vegetables. At Fresh Fruits we work to deliver the world’s
                                                            freshest, choicest, and juiciest produce to discerning customers
                                                            across the UAE and GCC.</p>
                                                    </div>
                                                    <div
                                                        class="comment-review-form col-lg-3 col-lg-offset-1 col-md-3 col-sm-4 col-xs-12">
                                                        <span class="title">Was this review helpful?</span>
                                                        <ul class="actions">
                                                            <li><a href="#" class="btn-act like"
                                                                    data-type="like"><i class="fa fa-thumbs-up"
                                                                        aria-hidden="true"></i>Yes (100)</a></li>
                                                            <li><a href="#" class="btn-act hate"
                                                                    data-type="dislike"><i class="fa fa-thumbs-down"
                                                                        aria-hidden="true"></i>No (20)</a></li>
                                                            <li><a href="#" class="btn-act report"
                                                                    data-type="dislike"><i class="fa fa-flag"
                                                                        aria-hidden="true"></i>Report</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="review">
                                            <div class="comment-container">
                                                <div class="row">
                                                    <div class="comment-content col-lg-8 col-md-9 col-sm-8 col-xs-12">
                                                        <p class="comment-in"><span class="post-name">Quality is our way
                                                                of life</span><span class="post-date">01/04/2018</span></p>
                                                        <div class="rating">
                                                            <p class="star-rating"><span class="width-80percent"></span>
                                                            </p>
                                                        </div>
                                                        <p class="author">by: <b>Shop organic</b></p>
                                                        <p class="comment-text">There are few things in life that please
                                                            people more than the succulence of quality fresh fruit and
                                                            vegetables. At Fresh Fruits we work to deliver the world’s
                                                            freshest, choicest, and juiciest produce to discerning customers
                                                            across the UAE and GCC.</p>
                                                    </div>
                                                    <div
                                                        class="comment-review-form col-lg-3 col-lg-offset-1 col-md-3 col-sm-4 col-xs-12">
                                                        <span class="title">Was this review helpful?</span>
                                                        <ul class="actions">
                                                            <li><a href="#" class="btn-act like"
                                                                    data-type="like"><i class="fa fa-thumbs-up"
                                                                        aria-hidden="true"></i>Yes (100)</a></li>
                                                            <li><a href="#" class="btn-act hate"
                                                                    data-type="dislike"><i class="fa fa-thumbs-down"
                                                                        aria-hidden="true"></i>No (20)</a></li>
                                                            <li><a href="#" class="btn-act report"
                                                                    data-type="dislike"><i class="fa fa-flag"
                                                                        aria-hidden="true"></i>Report</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                    <div class="biolife-panigations-block version-2">
                                        <ul class="panigation-contain">
                                            <li><span class="current-page">1</span></li>
                                            <li><a href="#" class="link-page">2</a></li>
                                            <li><a href="#" class="link-page">3</a></li>
                                            <li><span class="sep">....</span></li>
                                            <li><a href="#" class="link-page">20</a></li>
                                            <li><a href="#" class="link-page next"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                        <div class="result-count">
                                            <p class="txt-count"><b>1-5</b> of <b>126</b> reviews</p>
                                            <a href="#" class="link-to">See all<i class="fa fa-caret-right"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Những sảm phẩm tương tự -->
                <div class="product-related-box single-layout">
                    <div class="biolife-title-box lg-margin-bottom-26px-im">
                        <span class="biolife-icon icon-organic"></span>
                        <span class="subtitle">Tất cả các mặt hàng tốt nhất cho bạn</span>
                        <h3 class="main-title">Những sảm phẩm tương tự</h3>
                    </div>
                    <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile"
                        data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":0,"slidesToShow":5, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":20 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}}]}'>
                        @foreach($productCategoryList as $item)
                        <li class="product-item">
                            <div class="contain-product layout-default">
                                <div class="product-thumb">
                                    <a href="#" class="link-to-product">
                                        <img src="{{ $item->image }}"
                                            alt="dd" width="270" height="270" class="product-thumnail">
                                    </a>
                                </div>
                                <div class="info">
                                    <b class="categories">{{ $categoryName[0]->name_category }}</b>
                                    <h4 class="product-title"><a href="#" class="pr-name">{{ $item->name }}</a>
                                    </h4>
                                    <div class="price">
                                        <ins><span class="price-amount"><span
                                                    class="currencySymbol">{{ number_format($item->price) }}</span> vnđ</span></ins>
                                        <del><span class="price-amount"><span
                                                    class="currencySymbol">{{ number_format($item->price*1.2) }}</span> vnđ</span></del>
                                    </div>
                                    <div class="slide-down-box">
                                        <p class="message">{{ Str::limit($item->description, 100, '...') }}</p>
                                        <div class="buttons">
                                            <a href="#" class="btn wishlist-btn"><i class="fa fa-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="#" class="btn add-to-cart-btn"><i
                                                    class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                            <a href="#" class="btn compare-btn"><i class="fa fa-random"
                                                    aria-hidden="true"></i></a>
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
@endsection
@section('scripts')
    <script>
        function updateTotalPrice() {
            // Lấy giá trị của input có name="qty"
            const qtyInput = document.querySelector('input[name="qty"]');
            const qtyValue = parseInt(qtyInput.value);

            // Tính toán giá trị tổng giá tiền
            const price = {{ $productDetail->price }};
            const totalPrice = price * qtyValue;

            // Cập nhật giá trị tổng giá tiền vào phần tử có id="total-price"
            const totalPriceElement = document.querySelector('#total-price');
            totalPriceElement.textContent = number_format(totalPrice);
        }

        function number_format(number, decimals = 0, dec_point = '.', thousands_sep = ',') {
            // Hàm định dạng số thành chuỗi có dấu phân cách phù hợp với định dạng tiền tệ của quốc gia
            decimals = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
            number = parseFloat(number);
            if (!isFinite(number) || (!number && number !== 0)) {
                return '';
            }
            const sign = number < 0 ? '-' : '';
            const integerPart = parseInt(number = Math.abs(number).toFixed(decimals)).toString();
            const thousandSeparator = thousands_sep || ',';
            const decimalSeparator = dec_point || '.';
            const decimalPart = (decimals ?
                decimalSeparator + (Math.abs(number) - parseInt(integerPart)).toFixed(decimals).slice(2) :
                '');
            return sign + integerPart.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1' + thousandSeparator) + decimalPart;
        }
    </script>
@endsection
