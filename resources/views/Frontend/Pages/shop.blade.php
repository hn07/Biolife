@extends('Frontend.Layouts.main')
@section('main-content')
    <!--Hero Section-->
    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="{{ route('index') }}" class="permal-link">Home</a></li>
                <li class="nav-item"><span class="current-page">Tất cả sản phẩm</span></li>
            </ul>
        </nav>
        <div class="hero-section hero-background">
            <h1 class="page-title">Chất lượng làm nên thương hiệu!</h1>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
    </div>

    <div class="page-contain category-page no-sidebar">
        <div class="container">
            <div class="row">

                <!-- Main content -->
                <div id="main-content" class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="block-item recently-products-cat md-margin-bottom-39">
                        <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile"
                            data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":0,"slidesToShow":5, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 3}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":30}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}}]}'>
                            @if (!empty($product))
                                @foreach ($product as $product => $value)
                                    <li class="product-item">
                                        <div class="contain-product layout-02">
                                            <div class="product-thumb product-thumnail-cover" style="width: 270 px; height: 270 px">
                                                <a href="{{ route('shop.chi-tiet-san-pham', $value->id) }}"
                                                    class="link-to-product">
                                                    <img src="{{ $value->image }}" alt="dd" width="270px"
                                                        height="270px" class="product-thumnail">
                                                </a>
                                            </div>
                                            <div class="info">

                                                <h4 class="product-title"><a
                                                        href="{{ route('shop.chi-tiet-san-pham', $value->id) }}"
                                                        class="pr-name">{{ $value->name }}</a>
                                                </h4>
                                                <div class="price">
                                                    <ins><span class="price-amount"><span
                                                                class="currencySymbol">{{ number_format($value->price) }}</span>
                                                            vnđ</span></ins>
                                                    <del><span class="price-amount"><span
                                                                class="currencySymbol">{{ number_format($value->price * 1.2) }}</span>
                                                            vnđ</span></del>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <li>Không có sản phẩm</li>
                            @endif
                        </ul>
                    </div>

                    <div class="product-category grid-style">

                        <div id="top-functions-area" class="top-functions-area">
                            <div class="flt-item to-left group-on-mobile">
                                <span class="flt-title">Lọc</span>
                                <a href="#" class="icon-for-mobile">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                                <div class="wrap-selectors">
                                    <form method="get">
                                        <span class="title-for-mobile">Lọc các sản phẩm theo:</span>
                                        <div class="selector-item">
                                            <select class="selector" name="category">
                                                <option value="0">Tất cả danh mục</option>
                                                @if (!empty(getAllCategory()))
                                                    @foreach (getAllCategory() as $category)
                                                        {
                                                        <option value="{{ $category->id }}"
                                                            {{ request()->id == $category->id ? 'selected' : false }}>
                                                            {{ $category->name_category }}
                                                        </option>
                                                        }
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        {{-- <div class="selector-item">
                                            <select aria-label="State" class="selector" name="price">
                                                <option value="0" class="text-break">Giá sản phẩm</option>
                                                <option><a href="/shop/?sort-by=price&sort-type={{ $sortType }}">Thấp đến cao</a>
                                                </option>
                                                <option><a href="/shop/?sort-by=price&sort-type={{ $sortType }}">Cao đến thấp</a>
                                            </select>

                                        </div>
                                        <div class="selector-item">
                                            <select aria-label="State" class="selector" name="status">
                                                <option value="0" class="text-break">Trạng thái</option>
                                                <option value="Latest"
                                                    {{ request()->status == 'Latest' ? 'selected' : false }}>Sản phẩm mới
                                                    nhất
                                                </option>
                                                <option
                                                    value="oldest"{{ request()->status == 'oldest' ? 'selected' : false }}>
                                                    Sản phẩm trước đó
                                                </option>
                                            </select>
                                        </div> --}}
                                        <p class="btn-for-mobile"><button type="submit" class="btn-submit">Go</button>
                                        <p class="btn ">
                                            <button type="submit" class="btn btn-success  ">Tìm kiếm</button>
                                        </p>
                                    </form>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <ul class="products-list">
                                @if (!empty($list_product))
                                    @foreach ($list_product as $product => $value)
                                        <li class="product-item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                            <div class="contain-product layout-default">
                                                <div  class="product-thumb product-thumnail-cover">
                                                    <a href="{{ route('shop.chi-tiet-san-pham', $value->id) }}"
                                                        class="link-to-product">
                                                        <img src="{{ $value->image }}" alt="dd" width="270"
                                                            height="270"  class="product-thumnail">
                                                    </a>
                                                </div>
                                                <div class="info">
                                                    <b class="categories">{{ $value->category_name }}</b>
                                                    <h4 class="product-title"><a
                                                            href="{{ route('shop.chi-tiet-san-pham', $value->id) }}"
                                                            class="pr-name">{{ $value->name }}</a></h4>
                                                    <div class="price">
                                                        <ins><span class="price-amount"><span
                                                                    class="currencySymbol">{{ number_format($value->price) }}</span>
                                                                vnđ</span></ins>
                                                        <del><span class="price-amount"><span
                                                                    class="currencySymbol">{{ number_format($value->price * 1.2) }}</span>
                                                                vnđ</span></del>
                                                    </div>
                                                    <div class="shipping-info">
                                                        <p class="shipping-day">3-Day Shipping</p>
                                                        <p class="for-today">Pree Pickup Today</p>
                                                    </div>
                                                    <div class="slide-down-box">
                                                        <p class="message">
                                                            {{ Str::limit($value->description, 100, '...') }}</p>
                                                      
                                                            
                                                        <div class="d-flex justify-content-center">
                                                            <a href="{{ route('shop.add-to-cart', ['id' => $value->id]) }}"
                                                                class="btn btn-success pull-right" role="button">Thêm vào
                                                                giở hàng</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    <li>Không có sản phẩm</li>
                                @endif
                        </div>
                    </div>
                    </li>

                    </ul>
                </div>
                <div class="biolife-panigations-block">
                    <div class="d-flex justify-content-end">
                        {{ $list_product->links() }}
                    </div>
                </div>

            </div>

        </div>

    </div>
    </div>
    </div>
@endsection
