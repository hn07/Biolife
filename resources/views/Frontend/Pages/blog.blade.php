@extends('Frontend.Layouts.main')
@section('main-content')
 <!-- Page Contain -->
 <div class="page-contain blog-page left-sidebar">
    <div class="container">
        <div class="row">

            <!-- Main content -->
            <div id="main-content" class="main-content col-lg-9 col-md-8 col-sm-12 col-xs-12">

                <ul class="posts-list main-post-list">
                    @foreach ($newsAll  as $news)
                    <li class="post-elem">
                        <div class="post-item style-left-info">
                            <div class="thumbnail">
                                <a href="{{ route('blog-post', ['id' => $news->id, 'slug' => Str::slug($news->title)]) }}" class="link-to-post"><img src="{{ $news->image_news }}" width="370" height="270" alt=""></a>
                            </div>
                            <div class="post-content">
                                <h4 class="post-name"><a href="{{ route('blog-post', ['id' => $news->id, 'slug' => Str::slug($news->title)]) }}" class="linktopost">{{ $news->title }}</a></h4>
                                <p class="post-archive"><b class="post-cat">ORGANIC</b><span class="post-date"> / {{ $news->updated_at }}</span><span class="author">Posted By: {{ $news->author }}</span></p>
                                <p class="excerpt">{{ Str::limit($news->content,100,'...') }}</p>
                                <div class="group-buttons">
                                    <a href="{{ route('blog-post', ['id' => $news->id, 'slug' => Str::slug($news->title)]) }} " class="btn readmore">read more</a>
                                    <a href="#" class="btn count-number liked"><i class="biolife-icon icon-heart-1"></i><span class="number">20</span></a>
                                    <a href="#" class="btn count-number commented"><i class="biolife-icon icon-conversation"></i><span class="number">06</span></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    
                    @endforeach
                </ul>

                <div class="biolife-panigations-block ">
                    <ul class="panigation-contain">
                        <li><span class="current-page">1</span></li>
                        <li><a href="#" class="link-page">2</a></li>
                        <li><a href="#" class="link-page">3</a></li>
                        <li><span class="sep">....</span></li>
                        <li><a href="#" class="link-page">20</a></li>
                        <li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    </ul>
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
                                <input type="text" name="s" value="" placeholder="SEARCH..." class="input-text">
                                <button type="submit" name="ok"><i class="biolife-icon icon-search"></i></button>
                            </form>
                        </div>
                    </div>

                    <!--Categories Widget-->
                    <div class="widget biolife-filter">
                        <h4 class="wgt-title">Categories</h4>
                        <div class="wgt-content">
                            <ul class="cat-list">
                                @foreach ($newsCategory as $category)
                                <li class="cat-list-item"><a href="#" class="cat-link">{{ $category->categoryNews->name_category }} </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!--Posts Widget-->
                    <div class="widget posts-widget">
                        <h4 class="wgt-title">Recent post</h4>
                        <div class="wgt-content">
                            <ul class="posts">
                                <li>
                                    <div class="wgt-post-item">
                                        <div class="thumb">
                                            <a href="#"><img src="assets/images/blogpost/post-wgt-01.jpg" width="80" height="58" alt=""></a>
                                        </div>
                                        <div class="detail">
                                            <h4 class="post-name"><a href="#">Ashwagandha: The #1 Herb in the World</a></h4>
                                            <p class="post-archive">22 Jan 2019<span class="comment">15 Comments</span></p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="wgt-post-item">
                                        <div class="thumb">
                                            <a href="#"><img src="assets/images/blogpost/post-wgt-02.jpg" width="80" height="58" alt=""></a>
                                        </div>
                                        <div class="detail">
                                            <h4 class="post-name"><a href="#">Ashwagandha: The #1 Herb in the World</a></h4>
                                            <p class="post-archive">06 Apr 2019<span class="comment">06 Comments</span></p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="wgt-post-item">
                                        <div class="thumb">
                                            <a href="#"><img src="assets/images/blogpost/post-wgt-03.jpg" width="80" height="58" alt=""></a>
                                        </div>
                                        <div class="detail">
                                            <h4 class="post-name"><a href="#">Ashwagandha: The #1 Herb in the World</a></h4>
                                            <p class="post-archive">12 May 2019<span class="comment">08 Comments</span></p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    

                </div>
            </aside>
        </div>
    </div>
</div>
@endsection