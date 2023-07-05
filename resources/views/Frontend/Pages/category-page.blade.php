@extends('Frontend.Layouts.main')
@section('main-content')
    <!--Hero Section-->
    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="{{ route('index') }}" class="permal-link">Home</a></li>
                @foreach ($category_product as $value)
                    <li class="nav-item"><span class="current-page">Danh mục {{ $value->category_name }}</span></li>
                @endforeach
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
                    <div class="product-category grid-style">
                        <div class="row">
                            <ul class="products-list">
                                @if (!empty($category_product))
                                    @foreach ($category_product as $product => $value)
                                        <li class="product-item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                            <div class="contain-product layout-default">
                                                <div class="product-thumb">
                                                    <a href="{{ route('shop.chi-tiet-san-pham', $value->id) }}"
                                                        class="link-to-product">
                                                        <img src="{{ $value->image }}" alt="dd" width="270"
                                                            height="270" class="product-thumnail">
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
                                                        <input type="hidden" value="{{ $value->id }}" name="id">
                                                        <input type="hidden" value="{{ $value->name }}" name="name">
                                                        <input type="hidden" value="{{ $value->price }}" name="price">
                                                        <input type="hidden" value="{{ $value->image }}" name="image">
                                                        <input type="hidden" value="1" name="quantity">
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
                        {{ $category_product->links() }}
                    </div>
                </div>

            </div>

        </div>

    </div>
    </div>
    </div>
@endsection
