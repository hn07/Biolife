@extends('Frontend.Layouts.main')
@section('main-content')

<!--Navigation section-->
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
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
                        <form action="#" name="frm-login" method="post">
                            <p class="form-row">
                                <label for="fid-name">Email Address:<span class="requite">*</span></label>
                                <input type="text" id="fid-name" name="name" value="" class="txt-input">
                            </p>
                            <p class="form-row">
                                <label for="fid-pass">Password:<span class="requite">*</span></label>
                                <input type="email" id="fid-pass" name="email" value="" class="txt-input">
                            </p>
                            <p class="form-row wrap-btn">
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
                            <a href="http://127.0.0.1:8000/register" class="btn btn-bold">tạo tài khoản</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

 @endsection