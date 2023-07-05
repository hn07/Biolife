@extends('Frontend.Layouts.main')
@section('main-content')
    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="{{ route('index') }}" class="permal-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('authentication.index') }}" class="permal-link">Đăng nhập</a></li>
                <li class="nav-item"><span class="current-page">Đặt lại mật khẩu</span></li>
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
                            <form
                                action="{{ route('authentication.post-password', ['customer' => $customer->id, 'token' => $customer->token]) }}"
                                method="POST" name="frm-login">
                                @if (Session::has('success'))
                                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                                @if (Session::has('fail'))
                                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                                @endif
                                <p class="form-row">
                                    <label for="fid-pass">Password:<span class="requite">*</span></label>
                                    <input type="password" id="fid-pass" name="password" value="{{ old('password') }}"
                                        class="txt-input">
                                </p>
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <p class="form-row">
                                    <label for="fid-pass">Nhập lại Password:<span class="requite">*</span></label>
                                    <input type="password" id="fid-pass" name="confirm_password"
                                        value="{{ old('confirm_password') }}" class="txt-input">
                                </p>
                                <span class="text-danger">
                                    @error('confirm_password')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <p class="form-row wrap-btn">
                                    @csrf
                                    <button class="btn btn-submit btn-bold" type="submit">Đặt lại mật khẩu</button>

                                </p>
                            </form>
                        </div>
                    </div>

                    <!--Go to Register form-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
