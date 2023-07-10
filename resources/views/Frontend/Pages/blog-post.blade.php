@extends('Frontend.Layouts.main')
@section('main-content')
    <!-- Page Contain -->
    <div class="page-contain blog-page left-sidebar">
        <div class="container">
            <div class="row">

                <!-- Main content -->
                <div id="main-content" class="main-content col-lg-9 col-md-8 col-sm-12 col-xs-12">

                    <!--Single Post Contain-->
                    <div class="single-post-contain">

                        <div class="post-head">
                            <div class="thumbnail">
                                <figure><img src="{{ $news->image_news }}" width="870" height="635" alt="">
                                </figure>
                            </div>
                            <h2 class="post-name">{{ $news->title }}</h2>
                            <p class="post-archive"><b class="post-cat">Ngày đăng</b><span class="post-date"> :
                                    {{ $news->updated_at }}</span><span class="author">Posted By: {{ $news->author }}</span>
                            </p>
                        </div>

                        <div class="post-content">
                            <p>{{ $news->content }}</p>
                            <blockquote>
                                <p>{{ $news->quote }}</p>
                                <address>
                                    <a href="#" class="author">Tác giả</a>
                                    <span>{{ $news->author }}</span>
                                </address>
                            </blockquote>
                        </div>

                        <div class="post-foot">
                            <div class="auth-info">
                                <div class="socials-connection">
                                    <span class="title">Share:</span>
                                    <ul class="social-list">
                                        <li><a href="#" class="socail-link"><i class="fa-brands fa-twitter"></i></a>
                                        </li>
                                        <li><a href="#" class="socail-link"><i class="fa-brands fa-facebook"></i></a>
                                        </li>
                                        <li><a href="#" class="socail-link"><i class="fa-brands fa-pinterest"></i></a>
                                        </li>
                                        <li><a href="#" class="socail-link"><i class="fa-brands fa-youtube"></i></a>
                                        </li>
                                        <li><a href="#" class="socail-link"><i class="fa-brands fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!--Comment Block-->
                    <div class="post-comments">
                        <h3 class="cmt-title">Comments<sup>(26)</sup></h3>
                        @if (Session::has('loginId_Customer'))
                            <div class="comment-form">
                                <h4>Xin chào {{ strtoupper($CustomerId->username) }} hãy để lại ý kiến đóng góp bạn nhé!
                                </h4>
                                <form action="" method="POST" role="form" name="frm-post-comment">
                                    <input type="hidden" value="{{ $news->id }}">
                                    <p class="form-row">
                                        <textarea name="content" id="txt-comment-ath-3364" cols="30" rows="5" placeholder="Write your comment"></textarea>
                                    </p>
                                    <span id="comment-error" style="color: red"></span>
                                    <p class="form-row last-btns">
                                        <button type="button" class="btn btn-sumit" id="btn-comments">post a
                                            comment</button>
                                        <a href="#" class="btn btn-fn-1"><i class="fa fa-smile-o"
                                                aria-hidden="true"></i></a>
                                        <a href="#" class="btn btn-fn-1"><i class="fa fa-paperclip"
                                                aria-hidden="true"></i></a>
                                        <a href="#" class="btn btn-fn-1"><i class="fa fa-file-image-o"
                                                aria-hidden="true"></i></a>
                                    </p>

                                </form>
                            </div>
                        @else
                            <div class="comment-form">
                                <a href="{{ route('authentication.index') }}" style="button"
                                    class="btn btn-danger btn-lg">Để
                                    bình luận bạn vui lòng đăng nhập trước!</a>
                            </div>
                        @endif

                        {{-- cac binh luan --}}
                        <div id="comment_list" class="comment-list">
                            @include('Frontend.Pages.list-comment', ['comment' => $news->comments])

                        </div>

                        <div class="biolife-panigations-block ">
                            <ul class="panigation-contain">
                                <li><span class="current-page">1</span></li>
                                <li><a href="#" class="link-page">2</a></li>
                                <li><a href="#" class="link-page">3</a></li>
                                <li><span class="sep">....</span></li>
                                <li><a href="#" class="link-page">20</a></li>
                                <li><a href="#" class="link-page next"><i class="fa fa-angle-right"
                                            aria-hidden="true"></i></a></li>
                            </ul>
                        </div>

                    </div>

                </div>

                <!-- Sidebar -->
                <aside id="sidebar" class="sidebar blog-sidebar col-lg-3 col-md-4 col-sm-12 col-xs-12">

                    <div class="biolife-mobile-panels">
                        <span class="biolife-current-panel-title">Sidebar</span>
                        <a class="biolife-close-btn" href="#" data-object="open-mobile-filter">&times;</a>
                    </div>

                    <div class="sidebar-contain">

                        <!--Search Widget-->
                        <div class="widget search-widget">
                            <div class="wgt-content">
                                <form action="#" name="frm-search" method="get" class="frm-search">
                                    <input type="text" name="s" value="" placeholder="SEACH..."
                                        class="input-text">
                                    <button type="submit" name="ok"><i
                                            class="biolife-icon icon-search"></i></button>
                                </form>
                            </div>
                        </div>

                        <!--Categories Widget-->
                        <div class="widget biolife-filter">
                            <h4 class="wgt-title">Categories</h4>
                            <div class="wgt-content">
                                <ul class="cat-list">
                                    @foreach ($categorys as $category)                                        
                                    <li class="cat-list-item"><a href="{{ route('category.category-get', ['id' => $category->id]) }}" class="cat-link">{{ $category->name_category }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!--Posts Widget-->
                        <div class="widget posts-widget">
                            <h4 class="wgt-title">Recent post</h4>
                            <div class="wgt-content">
                                <ul class="posts">
                                    @foreach ($newsAll  as $news)
                                    <li>
                                        <div class="wgt-post-item">
                                            <div class="thumb">
                                                <a href="{{ route('blog-post', ['id' => $news->id, 'slug' => Str::slug($news->title)]) }}"><img
                                                        src="{{ $news->image_news }}"
                                                        width="80" height="58" alt=""></a>
                                            </div>
                                            <div class="detail">
                                                <h4 class="post-name"><a href="{{ route('blog-post', ['id' => $news->id, 'slug' => Str::slug($news->title)]) }}">{{ $news->title }}</a></h4>
                                                <p class="post-archive">{{ $news->updated_at }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach                                    
                                </ul>
                            </div>
                        </div>

                        <!--Twitter Widget-->
                        <div class="widget twitter-widget">
                            <h4 class="wgt-title">Latest Tweets</h4>
                            <div class="wgt-content">
                                <ul class="content">
                                    <li>
                                        <div class="wgt-twitter-item">
                                            <div class="author"><a href="#"><img
                                                        src="{{ asset('frontend/assets/images/blogpost/author.png') }}"
                                                        width="38" height="38" alt="author"></a></div>
                                            <div class="detail">
                                                <h4 class="account-info">
                                                    <a href="#" class="ath-name">Braum J. Teran</a>
                                                    <a href="#" class="ath-taglink">@real BraumTeran</a>
                                                </h4>
                                                <p class="tweet-content">President XI told me he appreciates that the
                                                    U.S.<br /><a href="#">http://company/googletzd</a>
                                                </p>
                                                <div class="tweet-count">
                                                    <a class="btn responsed"><i class="fa fa-comment"
                                                            aria-hidden="true"></i>2.9N</a>
                                                    <a class="btn liked"><i class="fa fa-heart"
                                                            aria-hidden="true"></i>10N</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    {{-- <li>
                                        <div class="wgt-twitter-item">
                                            <div class="author"><a href="#"><img src="{{ asset('frontend/assets/images/blogpost/author.png') }}" width="38" height="38" alt="author"></a></div>
                                            <div class="detail">
                                                <h4 class="account-info">
                                                    <a href="#" class="ath-name">Braum J. Teran</a>
                                                    <a href="#" class="ath-taglink">@real BraumTeran</a>
                                                </h4>
                                                <p class="tweet-content">President XI told me he appreciates that the U.S.<br/><a href="#">http://company/googletzd</a>
                                                </p>
                                                <div class="tweet-count">
                                                    <a class="btn responsed"><i class="fa fa-comment" aria-hidden="true"></i>2.9N</a>
                                                    <a class="btn liked"><i class="fa fa-heart" aria-hidden="true"></i>10N</a>
                                                </div>
                                                <div class="viewall">
                                                    <a href="#" class="view-all">view all</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>

                        <!--Comments Widget-->
                        {{-- <div class="widget comment-widget">
                            <h4 class="wgt-title">Recent Comments</h4>
                            <div class="wgt-content">
                                <ul class="comment-list">
                                    <li>
                                        <p class="cmt-item"><a href="#" class="auth-name"><i class="biolife-icon icon-conversation"></i>Jessica Alba</a><a href="#" class="link-post">on Healthy Organics</a></p>
                                    </li>
                                    <li>
                                        <p class="cmt-item"><a href="#" class="auth-name"><i class="biolife-icon icon-conversation"></i>Jessica Alba</a><a href="#" class="link-post">on Best Organics</a></p>
                                    </li>
                                    <li>
                                        <p class="cmt-item"><a href="#" class="auth-name"><i class="biolife-icon icon-conversation"></i>Jessica Alba</a><a href="#" class="link-post">on Healthy Organics</a></p>
                                    </li>
                                    <li>
                                        <p class="cmt-item"><a href="#" class="auth-name"><i class="biolife-icon icon-conversation"></i>Jessica Alba</a><a href="#" class="link-post">on Healthy Organics</a></p>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}

                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{-- bình luận --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        var csrf = '{{ csrf_token() }}';
        let commentnUrl = "{{ route('comment.add-comment', ['id' => $news->id]) }}";
        $('#btn-comments').click(function(ev) {
            ev.preventDefault();
            var content = $('#txt-comment-ath-3364').val();
            let commentnUrl = "{{ route('comment.add-comment', ['id' => $news->id]) }}";
            // console.log(commentnUrl);

            $.ajax({
                url: commentnUrl,
                type: 'POST',
                data: {
                    _token: csrf,
                    content: content,
                },
                success: function(responsed) {
                    if (responsed.error) {
                        checkComment();

                    } else {
                        $('#txt-comment-ath-3364').val('');
                        $('#comment_list').html(responsed);
                    }
                }
            });

        });

        // show form trả lời bình luận
        $(document).on('click',
            '.btn-show-reply-form',
            function(ev) {
                ev.preventDefault();
                var id = $(this).data('id');
                var comment_reply_id = '#txt-comment-ath-3364-' + id;
                var form_reply = '.post-comment-' + id;
                var contentReply = $(comment_reply_id).val();
                console.log(form_reply);
                $('.postComment').slideUp();
                $(form_reply).slideDown();
            }
        );

        //tra lời bình luận
        $(document).on('click',
            '#btn-comments-reply',
            function(ev) {
                ev.preventDefault();
                var id = $(this).data('id');
                var comment_reply_id = '#txt-comment-ath-3364-' + id;
                var form_reply = '.post-comment-' + id;
                var contentReply = $(comment_reply_id).val();


                $.ajax({
                    url: commentnUrl,
                    type: 'POST',
                    data: {
                        _token: csrf,
                        reply_id: id,
                        content: contentReply,
                    },
                    success: function(responsed) {
                        if (responsed.error) {
                            checkComment();

                        } else {
                            $('.form-comment-reply').val('');
                            $('#comment_list').html(responsed);

                        }
                    }
                });
            }
        );
    </script>
    <script>
        function checkComment() {
            Swal.fire(
                'Đã có lỗi xãy ra!',
                'Bạn hãy nhập nội dung bình luận trước',
                'error'
            )
        }
    </script>
@endsection
