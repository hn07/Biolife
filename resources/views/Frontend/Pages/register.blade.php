@extends('Frontend.Layouts.main')
@section('main-content')
    <div class="page-contain login-page">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">
                <section class="vh-60">
                    <div class="container h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-lg-12 col-xl-11">
                                <div class="card text-black" style="border-radius: 25px;">
                                    <div class="card-body p-md-5">
                                        <div class="row justify-content-center">
                                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                                                @if (Session::has('success'))
                                                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                                                @endif
                                                @if (Session::has('error'))
                                                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                                @endif
                                                <form action="{{ route('authentication.regestration-user') }}"
                                                method="POST" class="mx-1 mx-md-4">
                                                    <span class="text-danger">
                                                        @error('name_custom')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                        <i class="fa-solid fa-user fa-lg me-3 fa-fw"></i>
                                                        <div class="form-outline flex-fill mb-0">
                                                            <input type="text" name="name_custom" id="form3Example1c"
                                                                value="{{ old('name_custom') }}" class="form-control" />
                                                            <label class="form-label" for="form3Example1c">Your Name</label>
                                                        </div>
                                                    </div>

                                                    <span class="text-danger">
                                                        @error('email_custom')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>

                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                        <div class="form-outline flex-fill mb-0">
                                                            <input type="email" name="email_custom" id="form3Example3c"
                                                                value="{{ old('email_custom') }}" class="form-control" />
                                                            <label class="form-label" for="form3Example3c">Your
                                                                Email</label>
                                                        </div>
                                                    </div>

                                                    <span class="text-danger">
                                                        @error('pass_custom')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                        <div class="form-outline flex-fill mb-0">
                                                            <input type="password" name="pass_custom"
                                                                id="form3Example4c"value="{{ old('pass_custom') }}"
                                                                class="form-control" />
                                                            <label class="form-label" for="form3Example4c">Password</label>
                                                        </div>
                                                    </div>


                                                    {{-- <div class="d-flex flex-row align-items-center mb-4">
                                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                        <div class="form-outline flex-fill mb-0">
                                                            <input type="password" name="re_pass_custom"
                                                                id="form3Example4cd" class="form-control" />
                                                            <label class="form-label" for="form3Example4cd">Repeat your
                                                                password</label>
                                                        </div>
                                                    </div> --}}
                                                    <span class="text-danger">
                                                        @error('phone_custom')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                        <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                                                        <div class="form-outline flex-fill mb-0">
                                                            <input type="text" name="phone_custom"
                                                                id="form3Example4cd"value="{{ old('phone_custom') }}"
                                                                class="form-control" />
                                                            <label class="form-label" for="form3Example4cd">Your
                                                                Phone</label>
                                                        </div>
                                                    </div>

                                                    <span class="text-danger">
                                                        @error('address_custom')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                        <i class="fa-sharp fa-solid fa-location-dot fa-lg me-3 fa-fw"></i>
                                                        <div class="form-outline flex-fill mb-0">
                                                            <input type="text" name="address_custom"
                                                                id="form3Example4cd"value="{{ old('address_custom') }}"
                                                                class="form-control" />
                                                            <label class="form-label" for="form3Example4cd">Your
                                                                Address</label>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 form-check">
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                        <label class="form-check-label" for="exampleCheck1"><a
                                                                href="#">Bạn đồng ý với các điều khoản của chúng
                                                                tôi</a></label>
                                                    </div>

                                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                        @csrf
                                                        <button class="btn btn-primary btn-lg">Đăng ký</button>
                                                        <a href="{{ route('authentication.index') }}" class="btn btn-dark btn-lg ml-3">Đăng nhập</a>
                                                    </div>

                                                </form>

                                            </div>
                                            <div
                                                class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                                    class="img-fluid" alt="Sample image">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>

        </div>

    </div>
@endsection
