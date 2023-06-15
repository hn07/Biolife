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
        <form action="{{ route('admin.regestration-user') }}" method="POST" class="p-3 mt-3">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="username" id="username" value="{{ old('username') }}" placeholder="Username">
            </div>
            <span class="text-danger">
                @error('username')
                    {{ $message }}
                @enderror
            </span>
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
                <input type="password" name="password" value="{{ old('userName') }}" id="pwd" placeholder="Password">
            </div>
            <span class="text-danger">
                @error('password')
                    {{ $message }}
                @enderror
            </span>
            @csrf
            <button class="btn mt-3">Đăng ký</button>
        </form>
        {{-- <a href="{{ route('admin.login') }}"><button class="btn mt-3">Đăng nhập</button></a> --}}
        <div class="text-center fs-6">
            <a href="{{ route('admin.login') }}">Bạn đã có tài khoản</a>
        </div>

    </div>
@endsection
