@extends('Frontend.Layouts.main')
@section('main-content')
    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="{{ route('index') }}" class="permal-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('authentication.index') }}" class="permal-link">Đăng nhập</a></li>
                <li class="nav-item"><span class="current-page">Quên mật khẩu</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain login-page">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">

                <div class="row">
                    <!--Form Sign In-->
                
                        <div class="signin-container">
                            @if (Session::has('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            <form action="{{ route('authentication.forgot-password-post') }}" method="POST" name="frm-login">
                                @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if (Session::has('fail'))
                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            @endif
                                <h5>Vui lòng nhập email bạn đã đăng ký tại Biolife!</h5>
                                <p class="form-row">
                                    {{-- <label for="fid-name">Email Address:<span class="requite">*</span></label> --}}
                                    <input  type="email" placeholder="Email Address:" name="email" value="{{ old('email') }}" class="txt-input w-75 ">
                                </p>
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                               
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <p class="form-row wrap-btn">
                                    @csrf
                                    <button class="btn btn-submit btn-bold" type="submit">gửi mail xác nhận</button>
                                </p>
                            </form>
                        </div>
                                    
                </div>

            </div>

        </div>

    </div>
@endsection
