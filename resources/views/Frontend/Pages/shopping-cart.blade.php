@extends('Frontend.Layouts.main')
@section('main-content')
    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="{{ route('index') }}" class="permal-link">Home</a></li>
                <li class="nav-item"><span class="current-page">ShoppingCart</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain shopping-cart">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">

                <!--Top banner-->
                <div class="top-banner background-top-banner-for-shopping min-height-346px">
                    <h3 class="title">Thông báo khuyến mãi</h3>
                    {{-- <p class="subtitle">Save $50 when you open an account online & spen $50 on your first online purchase to
                        day</p>
                    <ul class="list">
                        <li>
                            <div class="price-less">
                                <span class="desc">Purchase amount</span>
                                <span class="cost">$0.00</span>
                            </div>
                        </li>
                        <li>
                            <div class="price-less">
                                <span class="desc">Credit on billing statement</span>
                                <span class="cost">$0.00</span>
                            </div>
                        </li>
                        <li>
                            <div class="price-less sum">
                                <span class="desc">Cost affter statemen credit</span>
                                <span class="cost">$0.00</span>
                            </div>
                        </li>
                    </ul> --}}

                </div>
                @if (Session::has('checkmail'))
                    <div class="alert alert-success">{{ Session::get('checkmail') }} <a class="text-bold text-warning text-xl-right" href="https://mail.google.com/">email</a> để xác nhận đơn hàng!</div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
                <!--Cart Table-->
                <div class="shopping-cart-container">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="box-title">Your cart items</h3>
                            <form class="shopping-cart-form" action="#" method="post">
                                <table class="shop_table cart-form">
                                    @if (Cart::count() != 0)
                                        <thead>
                                            <tr>
                                                <th class="product-name">Tên Sản Phẩm</th>
                                                <th class="product-price">Giá</th>
                                                <th class="product-quantity">Số lượng</th>
                                                <th class="product-subtotal">Tổng</th>
                                                <th class="product-subtotal">Tùy chỉnh</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($carts as $cart)
                                                <tr class="cart_item">
                                                    <td class="product-thumbnail" data-title="Product Name">
                                                        <a class="prd-thumb" href="#">
                                                            <figure><img width="113" height="113"
                                                                    src="{{ $cart->options->image }}" alt="shipping cart">
                                                            </figure>
                                                        </a>
                                                        <a class="prd-name" href="#">{{ $cart->name }}</a>

                                                    </td>
                                                    <td class="product-price" data-title="Price">
                                                        <div class="price price-contain">
                                                            <ins><span class="price-amount">
                                                                    {{ number_format($cart->price) }}
                                                                    vnđ</span></ins>
                                                            <del><span class="price-amount"><span
                                                                        class="currencySymbol">{{ number_format($cart->price * 1.2) }}</span>vnđ</span></del>
                                                        </div>
                                                    </td>

                                                    @csrf

                                                    <td class="product-quantity" data-title="Quantity">
                                                        <div class="quantity-box type1">
                                                            <div class="qty-input pro-qty">
                                                                <input type="text" name="qty12554"
                                                                    value="{{ $cart->qty }}" min="1"
                                                                    max="20" data-rowid="{{ $cart->rowId }}">

                                                                <a href="" class="qty-btn btn-up inc"><i
                                                                        class="fa fa-caret-up" aria-hidden="true"></i></a>
                                                                <a href="#" class="qty-btn btn-down dec"><i
                                                                        class="fa fa-caret-down" aria-hidden="true"></i></a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="product-subtotal" data-title="Total">
                                                        <div class="price price-contain">
                                                            <ins><span class="price-amount">
                                                                    {{ number_format($cart->price * $cart->qty) }}
                                                                    vnđ</span></ins>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="action">

                                                            <a href="{{ route('shop.delete-cart', ['id' => $cart->rowId]) }}"
                                                                class="remove"><i
                                                                    class="fa-solid fa-trash-can fa-flip-horizontal fa-xl"></i></a>
                                                        </div>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @elseif (Cart::count() == 0)
                                            <tr class="cart_item">
                                                <td colspan="5" class="product-thumbnail" data-title="Product Name">
                                                    <h4 class="prd-name" href="#">Không có sản phẩm nào trong giỏ
                                                        hàng</h4>
                                                </td>
                                            </tr>
                                    @endif
                                    <tr class="cart_item wrap-buttons">
                                        <td class="wrap-btn-control" colspan="4">
                                            <a href="{{ route('shop.tat-ca-san-pham') }}" class="btn back-to-shop">Back
                                                to Shop</a>

                                            @if (Cart::count() > 0)
                                                <button class="btn btn-clear" type="reset"> <a style="color: brown"
                                                        onclick="confirmDelete()" class="remove">xóa giỏ
                                                        hàng</a></button>
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>

                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                            @if (Cart::count() > 0)
                                <div class="shpcart-subtotal-block">
                                    <div class="subtotal-line">
                                        <b class="stt-name">Tổng thanh toán <span
                                                class="sub">({{ $totalQty }})</span></b>
                                        <span class="stt-price">{{ $totalPrice }}</span>
                                    </div>

                                    <div class="btn-checkout">
                                        <a href="{{ route('checkout.index') }}" class="btn checkout">Check
                                            out</a>
                                    </div>
                            @endif
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
                        @foreach($productList as $item)
                        <li class="product-item">
                            <div class="contain-product layout-default">
                                <div class="product-thumb">
                                    <a href="#" class="link-to-product">
                                        <img src="{{ $item->image }}"
                                            alt="dd" width="270" height="270" class="product-thumnail">
                                    </a>
                                </div>
                                <div class="info">
                                    <b class="categories">{{ $item->name_category }}</b>
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
        function checkmail() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        }
    </script>
@endsection
