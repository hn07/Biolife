@extends('Frontend.Layouts.main')
@section('main-content')
    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
                <li class="nav-item"><span class="current-page">About us</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain about-us">

        <!-- Main content -->
        <div id="main-content" class="main-content">

            <div class="welcome-us-block">
                <div class="container">
                    <h4 class="title">Welcome to Biolife store!</h4>
                    <div class="text-wraper">
                        <p class="text-info">Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                            roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.
                            Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one
                            of the more obscure Latin words, consectetur,</p>
                        <p class="qt-text">“There are many variations of passages of Lorem Ipsum available, but the
                            majority have suffered alteration in some form.”</p>
                    </div>
                </div>
            </div>

            <div class="why-choose-us-block">
                <div class="container">
                    <h4 class="box-title">Why Choose us</h4>
                    <b class="subtitle">Natural food is taken from the world's most modern farms with strict safety
                        cycles</b>
                    <div class="showcase">
                        <div class="sc-child sc-left-position">
                            <ul class="sc-list">
                                <li>
                                    <div class="sc-element color-01">
                                        <span class="biolife-icon icon-fresh-drink"></span>
                                        <div class="txt-content">
                                            <span class="number">01</span>
                                            <b class="title">Always Fresh</b>
                                            <p class="desc">Natural products are kept in the best condition to ensure
                                                always fresh</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="sc-element color-02">
                                        <span class="biolife-icon icon-healthy-about"></span>
                                        <div class="txt-content">
                                            <span class="number">02</span>
                                            <b class="title">Overall Healthy</b>
                                            <p class="desc">Natural products are kept in the best condition to ensure
                                                always fresh</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="sc-element color-03">
                                        <span class="biolife-icon icon-green-safety"></span>
                                        <div class="txt-content">
                                            <span class="number">03</span>
                                            <b class="title">Encironmental Safety</b>
                                            <p class="desc">Natural products are kept in the best condition to ensure
                                                always fresh</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="sc-child sc-center-position">

                            <figure><img src="{{ URL::asset('frontend/assets/images/about-us/bn04.jpg') }}" alt=""
                                    width="622" height="656"></figure>
                        </div>
                        <div class="sc-child sc-right-position">
                            <ul class="sc-list">
                                <li>
                                    <div class="sc-element color-04">
                                        <span class="biolife-icon icon-capacity-about"></span>
                                        <div class="txt-content">
                                            <span class="number">04</span>
                                            <b class="title">Antioxidant Capacity</b>
                                            <p class="desc">Natural products are kept in the best condition to ensure
                                                always fresh</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="sc-element color-05">
                                        <span class="biolife-icon icon-arteries-about"></span>
                                        <div class="txt-content">
                                            <span class="number">05</span>
                                            <b class="title">Good For Arteries</b>
                                            <p class="desc">Natural products are kept in the best condition to ensure
                                                always fresh</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="sc-element color-06">
                                        <span class="biolife-icon icon-title"></span>
                                        <div class="txt-content">
                                            <span class="number">06</span>
                                            <b class="title">Quality Standards</b>
                                            <p class="desc">Natural products are kept in the best condition to ensure
                                                always fresh</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="testimonial-block">
                <div class="container">
                    <h4 class="box-title">Testimonial</h4>
                    <ul class="testimonial-list biolife-carousel"
                        data-slick='{"arrows":false,"dots":true,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":3, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 3}},{"breakpoint":992, "settings":{ "slidesToShow": 2}},{"breakpoint":768, "settings":{ "slidesToShow": 2}},{"breakpoint":500, "settings":{ "slidesToShow": 1}}]}'>
                        <li>
                            <div class="testml-elem">
                                <div class="avata">
                                    <figure><img src="{{ URL::asset('frontend/assets/images/about-us/author-01.png') }}"
                                            alt="" width="217" height="217"></figure>
                                </div>
                                <p class="desc">The point of using Lorem Ipsum is that it has a more-or-less normal
                                    distribution of letters, as opposed to using 'Content here, content here', making it
                                    look like readable English. Many desktop publishing packages and web page editors
                                    now use Lorem Ipsum as their default model text.</p>
                                <b class="name">Ms. Jay Doe</b>
                                <b class="title">Manager, Mycrosoft co.</b>
                                <div class="rating">
                                    <p class="star-rating"><span class="width-80percent"></span></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="testml-elem">
                                <div class="avata">
                                    <figure><img src="{{ URL::asset('frontend/assets/images/about-us/author-02.png') }}"
                                            alt="" width="217" height="217"></figure>
                                </div>
                                <p class="desc">The point of using Lorem Ipsum is that it has a more-or-less normal
                                    distribution of letters, as opposed to using 'Content here, content here', making it
                                    look like readable English. Many desktop publishing packages and web page editors
                                    now use Lorem Ipsum as their default model text.</p>
                                <b class="name">Mr. Braun</b>
                                <b class="title">Sales Manager</b>
                                <div class="rating">
                                    <p class="star-rating"><span class="width-90percent"></span></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="testml-elem">
                                <div class="avata">
                                    <figure><img src="{{ URL::asset('frontend/assets/images/about-us/author-03.png') }}"
                                            alt="" width="217" height="217"></figure>
                                </div>
                                <p class="desc">The point of using Lorem Ipsum is that it has a more-or-less normal
                                    distribution of letters, as opposed to using 'Content here, content here', making it
                                    look like readable English. Many desktop publishing packages and web page editors
                                    now use Lorem Ipsum as their default model text.</p>
                                <b class="name">Ms. Danien</b>
                                <b class="title">Marketing</b>
                                <div class="rating">
                                    <p class="star-rating"><span class="width-100percent"></span></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="testml-elem">
                                <div class="avata">
                                    <figure><img src="{{ URL::asset('frontend/assets/images/about-us/author-01.png') }}"
                                            alt="" width="217" height="217"></figure>
                                </div>
                                <p class="desc">The point of using Lorem Ipsum is that it has a more-or-less normal
                                    distribution of letters, as opposed to using 'Content here, content here', making it
                                    look like readable English. Many desktop publishing packages and web page editors
                                    now use Lorem Ipsum as their default model text.</p>
                                <b class="name">Ms. Jay Doe</b>
                                <b class="title">Manager, Mycrosoft co.</b>
                                <div class="rating">
                                    <p class="star-rating"><span class="width-80percent"></span></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="testml-elem">
                                <div class="avata">
                                    <figure><img src="{{ URL::asset('frontend/assets/images/about-us/author-02.png') }}"
                                            alt="" width="217" height="217"></figure>
                                </div>
                                <p class="desc">The point of using Lorem Ipsum is that it has a more-or-less normal
                                    distribution of letters, as opposed to using 'Content here, content here', making it
                                    look like readable English. Many desktop publishing packages and web page editors
                                    now use Lorem Ipsum as their default model text.</p>
                                <b class="name">Mr. Braun</b>
                                <b class="title">Sales Manager</b>
                                <div class="rating">
                                    <p class="star-rating"><span class="width-90percent"></span></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="testml-elem">
                                <div class="avata">
                                    <figure><img src="{{ URL::asset('frontend/assets/images/about-us/author-03.png') }}"
                                            alt="" width="217" height="217"></figure>
                                </div>
                                <p class="desc">The point of using Lorem Ipsum is that it has a more-or-less normal
                                    distribution of letters, as opposed to using 'Content here, content here', making it
                                    look like readable English. Many desktop publishing packages and web page editors
                                    now use Lorem Ipsum as their default model text.</p>
                                <b class="name">Ms. Danien</b>
                                <b class="title">Marketing</b>
                                <div class="rating">
                                    <p class="star-rating"><span class="width-100percent"></span></p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="wrap-map biolife-wrap-map" id="map-block">
                <iframe width="1920" height="591"
                    {{-- src="https://maps.google.com/maps?width=100%&amp;height=263&amp;hl=en&amp;q=1%20Grafton%20Street%2C%20Dublin%2C%20Ireland+(My%20Business%20Name)&amp;ie=UTF8&amp;t=p&amp;z=15&amp;iwloc=B&amp;output=embed" --}}
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1547.9461416009506!2d105.78154663944956!3d10.029661302962598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1688402768292!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    {{-- src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1547.9994560732216!2d105.75132146942313!3d10.018497309168259!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1688402402289!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"> --}}
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                </iframe>
            </div>

            <div class="container">

                <div class="row">

                    <!--Contact info-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="contact-info-container sm-margin-top-27px xs-margin-bottom-60px xs-margin-top-60px">
                            <h4 class="box-title">Liên hệ với chúng tôi</h4>
                            <p class="frst-desc">Nhằm mục đích phát triển đôi bên, chúng tôi rất mong nhận được sự góp ý
                                chân thành từ các bạn!</p>
                            <ul class="addr-info">
                                <li>
                                    <div class="if-item">
                                        <b class="tie">Địa chỉ:</b>
                                        <p class="dsc">Tòa soạn: 86 Lê Thánh Tôn,Phường Bến Nghé,Quận 1,Thành phố Hồ Chí
                                            Minh;<br></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="if-item">
                                        <b class="tie">Điện thoại:</b>
                                        <p class="dsc">(84) 326284270</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="if-item">
                                        <b class="tie">Email:</b>
                                        <p class="dsc">Organic@example.com</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="if-item">
                                        <b class="tie">Mở cửa:</b>
                                        <p class="dsc">Làm việc từ 8h30 - 17h00 các ngày trong tuần</p>
                                    </div>
                                </li>
                            </ul>
                            <div class="biolife-social inline">
                                <ul class="socials">
                                    <li><a href="#" title="facebook" class="socail-btn"><i
                                                class="fa-brands fa-facebook"></i></i></a></li>
                                    <li><a href="#" title="twitter" class="socail-btn"><i
                                                class="fa-brands fa-twitter"></i></i></a></li>
                                    <li><a href="#" title="pinterest" class="socail-btn"><i
                                                class="fa-brands fa-pinterest"></i></i></a></li>
                                    <li><a href="#" title="youtube" class="socail-btn"><i
                                                class="fa-brands fa-youtube"></i></i></a></li>
                                    <li><a href="#" title="instagram" class="socail-btn"><i
                                                class="fa-brands fa-instagram"></i></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--Contact form-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="contact-form-container sm-margin-top-112px">
                            <form action="#" name="frm-contact">
                                <p class="form-row">
                                    <input type="text" name="name" value="" placeholder="Your Name"
                                        class="txt-input">
                                </p>
                                <p class="form-row">
                                    <input type="email" name="email" value="" placeholder="Email Address"
                                        class="txt-input">
                                </p>
                                <p class="form-row">
                                    <input type="tel" name="phone" value="" placeholder="Phone Number"
                                        class="txt-input">
                                </p>
                                <p class="form-row">
                                    <textarea name="mes" id="mes-1" cols="30" rows="9" placeholder="Leave Message"></textarea>
                                </p>
                                <p class="form-row">
                                    <button class="btn btn-submit" type="submit">send message</button>
                                </p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
