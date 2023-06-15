@extends('Frontend.Layouts.main_Login')
@section('main-content')
    <div class="wrapper">
        <div class="logo">
            <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png"
                alt="">
        </div>
        <div class="text-center mt-4 name">
            Biolife
        </div>
        @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
        @endif
        <form action="{{ route('admin.loginPost') }}" method="POST" class="p-3 mt-3">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="Email">
            </div>
            <span class="text-danger">
                @error('email')
                    {{ $message }}
                @enderror
            </span>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" value="{{ old('password') }}"id="pwd" placeholder="Password">
            </div>
            <span class="text-danger">
                @error('password')
                    {{ $message }}
                @enderror
            </span>
            @csrf
            <button class="btn mt-3">Login</button>
        </form>
        <div class="text-center fs-6">
            <h6>Bạn chưa có tài khoản? | <a href="{{ route('admin.regestration') }}">Đăng ký</a></h6>
        </div>
    </div>
@endsection
