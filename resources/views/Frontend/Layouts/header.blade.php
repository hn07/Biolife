<!-- Preloader -->
<div id="biof-loading">
    <div class="biof-loading-center">
        <div class="biof-loading-center-absolute">
            <div class="dot dot-one"></div>
            <div class="dot dot-two"></div>
            <div class="dot dot-three"></div>
        </div>
    </div>
</div>

<!-- HEADER -->
<header id="header" class="header-area style-01 layout-03">
    <div class="header-top bg-main hidden-xs">
        <div class="container">
            <div class="top-bar left">
                <ul class="horizontal-menu">
                    <li><a href="{{ route('index') }}"><i class="fa fa-envelope"
                                aria-hidden="true"></i>nguyennham2580@gmail.com</a></li>
                    <li><a href="{{ route('index') }}">Miễn phí vận chuyển trong khu vực Cần Thơ</a></li>
                </ul>
            </div>
            <div class="top-bar right display-6">
                @if (Session::has('loginId_Customer'))
                    <div class="dropdown">
                        <button class="btn btn-secondary " type="button" id="userDropdown" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="https://antimatter.vn/wp-content/uploads/2023/01/hinh-anh-hoa-sen-1200x676.jpg"
                                alt="Avatar" class="user-img">
                            @foreach ($customer as $customer)
                                {{ $customer->username }}
                            @endforeach

                        </button>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            {{-- <li><a class="dropdown-item" href="{{ route('authentication.update-info') }}">Thông tin cá
                                    nhân</a></li> --}}
                            <li><a class="dropdown-item" href="{{ route('authentication.change-password') }}">Đổi mật
                                    khẩu</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('authentication.logout') }}">Đăng xuất</a>
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="dropdown">
                        <button class="btn btn-secondary " type="button" id="userDropdown" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-user fa-2xl"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ route('authentication.index') }}">Đăng nhập</a></li>
                            <li><a class="dropdown-item" href="{{ route('authentication.regestration') }}">Đăng ký</a>
                            </li>

                        </ul>
                    </div>
                @endif



            </div>
        </div>
    </div>
    <div class="header-middle biolife-sticky-object ">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-2 col-md-6 col-xs-6">
                    <a href="http://127.0.0.1:8000/" class="biolife-logo"><img
                            src="{{ URL::asset('frontend/assets/images/organic-3.png') }}" alt="biolife logo"
                            width="135" height="34"></a>
                </div>
                <div class="col-lg-6 col-md-7 hidden-sm hidden-xs">
                    <div class="primary-menu">
                        <ul class="menu biolife-menu clone-main-menu clone-primary-menu" id="primary-menu"
                            data-menuname="main menu">
                            <li class="menu-item"><a href="http://127.0.0.1:8000/">Trang chủ</a></li>
                            <li class="menu-item"><a href="http://127.0.0.1:8000/about">Giới thiệu</a></li>
                            <li class="menu-item"><a href="{{ route('shop.tat-ca-san-pham') }}">Sản phẩm</a></li>

                            <li class="menu-item menu-item-has-children has-child">
                                <a class="menu-name" data-title="Products">Danh mục</a>
                                <ul class="sub-menu">
                                    @foreach ($categoryAll as $category)
                                        <li class="menu-item"><a
                                                href="{{ route('category.category-get', ['id' => $category->id]) }}">{{ $category->name_category }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="menu-item menu-item-has-children has-megamenu">
                                <a href="http://127.0.0.1:8000/blog" class="menu-name" data-title="Blog">Blog</a>
                                <div class="wrap-megamenu ">
                                    <div class="mega-content">
                                        <div class="col-lg-12 col-md-12 col-xs-12 md-margin-top-0 xs-margin-top-25px">
                                            <div class="block-posts">
                                                <h4 class="menu-title">Bài viết gần đây</h4>
                                                <ul class="posts">
                                                    @foreach ($newsAll as $news)
                                                        <li>
                                                            <div class="block-post-item">
                                                                <div class="thumb"><a
                                                                        href="{{ route('blog-post', ['id' => $news->id, 'slug' => Str::slug($news->title)]) }}">
                                                                        <img src="{{ $news->image_news }}"
                                                                            width="100" height="73"
                                                                            alt=""></a></div>
                                                                <div class="left-info">
                                                                    <h4 class="post-name"><a
                                                                            href="{{ route('blog-post', ['id' => $news->id, 'slug' => Str::slug($news->title)]) }}">
                                                                            {{ Str::limit($news->title, 100, '...') }}</a>
                                                                    </h4>
                                                                    <h5><a
                                                                            href="{{ route('blog-post', ['id' => $news->id, 'slug' => Str::slug($news->title)]) }}">
                                                                            Tác giả:
                                                                            {{ Str::limit($news->author, 100, '...') }}</a>
                                                                    </h5>
                                                                    <span class="p-date">{{ $news->updated_at }}</span>
                                                                    <span class="p-comment">2 Comments</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-md-6 col-xs-6">
                    <div class="biolife-cart-info">
                        <div class="mobile-search">
                            <a href="javascript:void(0)" class="open-searchbox"><i
                                    class="biolife-icon icon-search"></i></a>
                            <div class="mobile-search-content">
                                <form class="form-search" name="mobile-seacrh" method="get">
                                    <div class="form-group">
                                        <div class="search">
                                            <input type="text" name="s"
                                                class="input-text input-search-ajax form-control" value=""
                                                placeholder="Search here...">
                                            <button type="submit" id="submit-search" class="btn-submit"><i
                                                    class="fa-solid fa-magnifying-glass"></i></button>
                                        </div>
                                        <div class="search-ajax-result">
                                            <!-- Kết quả tìm kiếm sẽ được hiển thị ở đây -->
                                        </div>
                                    </div>
                                </form>                               
                            </div>

                        </div>

                        <div class="minicart-block">
                            <div class="minicart-contain">
                                @if (Session::has('loginId_Customer'))
                                    <a href="{{ route('shop.shopping-cart') }}" class="link-to">
                                        <span class="icon-qty-combine">
                                            <i class="icon-cart-mini biolife-icon"></i>
                                            <span class="qty">{{ Cart::count() ? Cart::count() : '0' }}</span>
                                        </span>
                                        <span class="title">Giỏ hàng của tôi: </span>
                                        <span class="sub-total">{{ Cart::subtotal() ? Cart::subtotal() : '0' }}</span>
                                    </a>
                                @else
                                    <a href="{{ route('shop.shopping-cart') }}" class="link-to">
                                        <span class="icon-qty-combine">
                                            <i class="icon-cart-mini biolife-icon"></i>
                                            <span class="qty">0</span>
                                        </span>
                                        <span class="title">Giỏ hàng của tôi: </span>
                                        <span class="sub-total">0</span>
                                    </a>
                                @endif

                                <div class="cart-content">
                                    <div class="cart-inner">
                                        @if (Session::has('loginId_Customer'))
                                            @if (Cart::count() > 0)
                                                <ul class="products" id="change-item-cart">

                                                    @foreach ($carts as $cart)
                                                        <li>
                                                            <div class="minicart-item">
                                                                <div class="thumb">
                                                                    <img src="{{ $cart->options->has('image') ? $cart->options->image : '' }}"
                                                                        width="90" height="90"
                                                                        alt="National Fresh"></a>
                                                                </div>
                                                                <div class="left-info">
                                                                    <div class="product-title"><a href="#"
                                                                            class="product-name">{{ $cart->name }}</a>
                                                                    </div>
                                                                    <div class="price">
                                                                        <ins><span class="price-amount"><span
                                                                                    class="currencySymbol">{{ number_format($cart->price) }}</span>
                                                                                vnđ</span></ins>

                                                                    </div>
                                                                    <div class="qty">
                                                                        <label for="cart[id127][qty]">Qty:</label>
                                                                        <input type="number" class="input-qty"
                                                                            name="cart[id127][qty]"
                                                                            id="cart[id127][qty]"
                                                                            value="{{ $cart->qty }}" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="action">
                                                                    <a class="remove"><i
                                                                            onclick="window.location = '{{ route('shop.delete-cart', ['id' => $cart->rowId]) }}'"
                                                                            class="fa fa-trash-o"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <p class="btn-control">
                                                    <a href="{{ route('shop.shopping-cart') }}"
                                                        class="btn view-cart">view
                                                        cart</a>
                                                    <a href="{{ route('checkout.index') }}"
                                                        class="btn">checkout</a>
                                                </p>
                                            @else
                                                <p class="btn-control">
                                                <h5 class="btn-non-product">Chưa có sản phẩm trong giỏ hàng</h5>

                                                </p>
                                            @endif
                                        @else
                                            <p class="btn-control">
                                            <h5 class="btn-non-product">Chưa có sản phẩm trong giỏ hàng</h5>

                                            </p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-menu-toggle">
                            <a class="btn-toggle" data-object="open-mobile-menu" href="javascript:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom hidden-sm hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="vertical-menu vertical-category-block">

                    </div>
                </div>
                <div class="col-lg-9 col-md-8 padding-top-2px">
                    <div class="header-search-bar layout-01">
                        <form class="form-search" name="desktop-seacrh" method="get">
                            <div class="form-group">
                                <div class="search">
                                    <input type="text" name="s"
                                        class="input-text input-search-ajax form-control" value=""
                                        placeholder="Search here...">
                                    <button type="submit" id="submit-search" class="btn-submit"><i
                                            class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                                <div class="search-ajax-result">
                                    <!-- Kết quả tìm kiếm sẽ được hiển thị ở đây -->
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="live-info">
                        <p class="telephone"><i class="fa fa-phone" aria-hidden="true"></i><b
                                class="phone-number">Hotline: 0854 64 8877 </b></p>
                        <p class="working-time">Làm việc từ 8h30 - 17h00 các ngày trong tuần.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
