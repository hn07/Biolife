@extends('Frontend.Layouts.main')
@section('main-content')
    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="{{ route('index') }}" class="permal-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('authentication.index') }}" class="permal-link">Đăng nhập</a></li>
                <li class="nav-item"><span class="current-page">Đổi mật khẩu</span></li>
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
                        
                        <form action="{{ route('authentication.change-password-post') }}" method="POST" name="frm-login">
                            
                            <h5>Vui lòng nhập mật khẩu cũ bạn đã đăng ký tại Biolife!</h5>
                            <p class="form-row">
                               
                                <input type="password" placeholder="Mật khẩu cũ:" name="passwordold"
                                    value="{{ old('passwordold') }}" class="txt-input w-75 ">
                            </p>
                            <span class="text-danger">
                                @error('passwordold')
                                    {{ $message }}
                                @enderror
                            </span>
                            <h5>Vui lòng nhập mật khẩu mới bạn đã đăng ký tại Biolife!</h5>
                            <p class="form-row">
                               
                                <input type="password" placeholder="Mật khẩu mới:" name="passwordnew"
                                    value="{{ old('passwordnew') }}" class="txt-input w-75 ">
                            </p>
                            <span class="text-danger">
                                @error('passwordnew')
                                    {{ $message }}
                                @enderror
                            </span>
                            <h5>Vui lòng nhập lại mật khẩu mới bạn đã đăng ký tại Biolife!</h5>
                            <p class="form-row">
                               
                                <input type="password" placeholder="Nhập lại mật khẩu mới:" name="passwordnew_confirmation"
                                    value="{{ old('passwordnew_confirmation') }}" class="txt-input w-75 ">
                            </p>
                            <span class="text-danger">
                                @error('passwordnew_confirmation')
                                    {{ $message }}
                                @enderror
                            </span>

                            <p class="form-row wrap-btn">
                                @csrf
                                <button class="btn btn-submit btn-bold" type="submit">xác nhận</button>
                            </p>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
@section('scripts')
<script>
    @if(session('success'))
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 3500
      });
    @endif
    @if(session('error'))
      Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: '{{ session('error') }}',
        showConfirmButton: false,
        timer: 3500
      });
    @endif
  </script>
@endsection
