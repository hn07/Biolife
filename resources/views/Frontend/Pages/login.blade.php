@extends('Frontend.Layouts.main')
@section('main-content')
    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="{{ route('authentication.index') }}" class="permal-link">Home</a></li>
                <li class="nav-item"><span class="current-page">Authentication</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain login-page">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">

                <div class="row">
                    <!--Form Sign In-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="signin-container">
                            @if (Session::has('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            <form action="{{ route('authentication.loginPost') }}" method="POST" name="frm-login">
                                @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if (Session::has('fail'))
                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            @endif
                                <p class="form-row">
                                    <label for="fid-name">Email Address:<span class="requite">*</span></label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="txt-input">
                                </p>
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <p class="form-row">
                                    <label for="fid-pass">Password:<span class="requite">*</span></label>
                                    <input type="password" id="fid-pass" name="password" value="{{ old('password') }}" class="txt-input">
                                </p>
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <p class="form-row wrap-btn">
                                    @csrf
                                    <button class="btn btn-submit btn-bold" type="submit">đăng nhập</button>
                                    <a href="#" class="link-to-help">Forgot your password</a>
                                </p>
                            </form>
                        </div>
                    </div>

                    <!--Go to Register form-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="register-in-container">
                            <div class="intro">
                                <h4 class="box-title">Khách hàng mới?</h4>
                                <p class="sub-title">Tạo một tài khoản với chúng tôi và bạn sẽ có thể:</p>
                                <ul class="lis">
                                    <li>Kiểm tra nhanh hơn</li>
                                    <li>Lưu nhiều anddesses vận chuyển</li>
                                    <li>Truy cập lịch sử đặt hàng của bạn</li>
                                    <li>Theo dõi đơn hàng mới</li>
                                    <li>Lưu các mục vào Danh sách yêu thích của bạn</li>
                                </ul>
                                <a href="{{ route('authentication.regestration') }}" class="btn btn-bold">tạo tài khoản</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
