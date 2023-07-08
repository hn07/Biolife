@foreach ($comment as $item)
    <ol class="post-comments lever-0">
        <li class="comment-elem">
            <div class="wrap-post-comment">

                <div class="cmt-inner">
                    <div class="auth-info">
                        <a href="#" class="author-contact"><img
                                src="{{ asset('frontend/assets/images/blogpost/author-02.png') }}" alt=""
                                width="29" height="28">{{ $item->cus->username }}</a>
                        <span class="cmt-time">{{ $item->updated_at }} lv1</span>
                    </div>
                    <div class="cmt-content">
                        <p>{{ $item->content }}</p>
                    </div>
                    <div class="cmt-fooot">
                        @if (Session::has('loginId_Customer'))
                            <a class="btn btn-response btn-show-reply-form" data-id="{{ $item->id }}"><i
                                    class="fa fa-commenting" aria-hidden="true"></i>Bình luận</a>
                        @else
                            <a class="btn btn-response"><i class="fa fa-commenting" aria-hidden="true"></i>Bình luận</a>
                        @endif
                        <a href="#" class="btn btn-like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>9</a>
                        <a href="#" class="btn btn-dislike"><i class="fa fa-thumbs-o-down"
                                aria-hidden="true"></i>1</a>
                    </div>
                </div>

                {{-- form trả lời --}}
                <form style="display:none" class="postComment post-comment-{{ $item->id }}" method="POST">

                    <p class="form-row">
                        <textarea name="content" class="form-comment-reply" id="txt-comment-ath-3364-{{ $item->id }}" style="width: 100%"
                            placeholder="Write your comment"></textarea>
                    </p>
                    <span id="comment-error" style="color: red"></span>
                    <p class="form-row last-btns">
                        <button type="button" data-id="{{ $item->id }}" class="btn btn-sumit"
                            id="btn-comments-reply">Trả lời</button>
                        <a href="#" class="btn btn-fn-1"><i class="fa fa-smile-o" aria-hidden="true"></i></a>
                        <a href="#" class="btn btn-fn-1"><i class="fa fa-paperclip" aria-hidden="true"></i></a>
                        <a href="#" class="btn btn-fn-1"><i class="fa fa-file-image-o" aria-hidden="true"></i></a>
                    </p>

                </form>

                {{-- trả lời --}}

                @foreach ($item->replies as $reply)
                <div class="comment-resposes">
                        <ol class="post-comments lever-1">
                            <li class="comment-elem">
                                <div class="wrap-post-comment">
                                    <div class="cmt-inner">
                                        <div class="auth-info">
                                            <a href="#" class="author-contact"><img
                                                    src="{{ asset('frontend/assets/images/blogpost/author-03.png') }}"
                                                    alt="" width="29" height="28">Samuel Godi</a>
                                            <span class="cmt-time">NG</span>
                                        </div>
                                        <div class="cmt-content">
                                            <p>{{ $reply->content }}</p>
                                        </div>
                                        <div class="cmt-fooot">
                                            <a href="#" class="btn btn-response"><i class="fa fa-commenting"
                                                    aria-hidden="true"></i>Comment</a>
                                            <a href="#" class="btn btn-like"><i class="fa fa-thumbs-o-up"
                                                    aria-hidden="true"></i>9</a>
                                            <a href="#" class="btn btn-dislike"><i class="fa fa-thumbs-o-down"
                                                    aria-hidden="true"></i>1</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </div>
                    @endforeach

                {{-- end trả lời --}}
            </div>
        </li>
    </ol>
@endforeach
