@extends('FE.layouts.app')

@section('content')
    <section class="post-details-area mb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="post-details-thumb mb-50" style="display: flex; justify-content: center; max-height: 500px; width: unset;">
                        <img src="{{ asset($new->thumbnail) }}" alt="">
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- Post Details Content Area -->
                <div class="col-12 col-lg-8 col-xl-7">
                    <div class="post-details-content">
                        <!-- Blog Content -->
                        <div class="blog-content">

                            <!-- Post Content -->
                            <div class="post-content mt-0">
                                <a href="#" class="post-cata cata-sm cata-success" id="vote-this-post" data-id="{{ $new->id }}"><i class="fa fa-thumbs-up"></i></a>
                                <a href="single-post.html" class="post-title mb-2">{{ $new->title }}</a>

                                <div class="d-flex justify-content-between mb-30">
                                    <div class="post-meta d-flex align-items-center">
                                        <a href="#" class="post-author">By {{ $new->admin->name }}</a>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <a href="#" class="post-date">{{ $new->created_at->format('M d, Y') }}</a>
                                    </div>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> {{ $new->comments->count() }}</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{ $new->view }}</a>
                                        {{--<a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 7</a>--}}
                                    </div>
                                </div>
                            </div>

                            {!! $new->content !!}

                            <!-- Post Author -->
                            <div class="vizew-post-author d-flex align-items-center py-5">
                                <div class="post-author-thumb">
                                    <img src="{{ asset($new->admin->ava) }}" alt="">
                                </div>
                                <div class="post-author-desc pl-4">
                                    <a href="#" class="author-name">{{ $new->admin->name }}</a>
                                    <p>{{ $new->admin->desc }}</p>
                                    <div class="post-author-social-info">
                                        <a href="//fb.com/kpmquockhanh"><i class="fa fa-facebook"></i></a>
                                        {{--<a href="#"><i class="fa fa-twitter"></i></a>--}}
                                        {{--<a href="#"><i class="fa fa-pinterest"></i></a>--}}
                                        {{--<a href="#"><i class="fa fa-linkedin"></i></a>--}}
                                        {{--<a href="#"><i class="fa fa-dribbble"></i></a>--}}
                                    </div>
                                </div>
                            </div>

                            <!-- Comment Area Start -->
                            <div class="comment_area clearfix mb-50">

                                <!-- Section Title -->
                                <div class="section-heading style-2">
                                    <h4>Comments</h4>
                                    <div class="line"></div>
                                </div>

                                <ul>
                                    @foreach($new->comments->load('user') as $comment)
                                        <!-- Single Comment Area -->
                                            <li class="single_comment_area">
                                                <!-- Comment Content -->
                                                <div class="comment-content d-flex">
                                                    <!-- Comment Author -->
                                                    <div class="comment-author">
                                                        <img src="{{ asset($comment->user->ava) }}" alt="author">
                                                    </div>
                                                    <!-- Comment Meta -->
                                                    <div class="comment-meta">
                                                        <a href="#" class="comment-date">{{ $comment->created_at->format('d M Y') }}</a>
                                                        <h6>{{ $comment->user->name }}</h6>
                                                        <p>{{ $comment->message }}</p>
                                                        {{--<div class="d-flex align-items-center">--}}
                                                            {{--<a href="#" class="like">like</a>--}}
                                                            {{--<a href="#" class="reply">Reply</a>--}}
                                                        {{--</div>--}}
                                                    </div>
                                                </div>

                                                {{--<ol class="children">--}}
                                                {{--<li class="single_comment_area">--}}
                                                {{--<!-- Comment Content -->--}}
                                                {{--<div class="comment-content d-flex">--}}
                                                {{--<!-- Comment Author -->--}}
                                                {{--<div class="comment-author">--}}
                                                {{--<img src="img/bg-img/32.jpg" alt="author">--}}
                                                {{--</div>--}}
                                                {{--<!-- Comment Meta -->--}}
                                                {{--<div class="comment-meta">--}}
                                                {{--<a href="#" class="comment-date">27 Aug 2019</a>--}}
                                                {{--<h6>Britney Millner</h6>--}}
                                                {{--<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius</p>--}}
                                                {{--<div class="d-flex align-items-center">--}}
                                                {{--<a href="#" class="like">like</a>--}}
                                                {{--<a href="#" class="reply">Reply</a>--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                                {{--</li>--}}
                                                {{--</ol>--}}
                                            </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Post A Comment Area -->
                            <div class="post-a-comment-area">

                                <!-- Section Title -->
                                <div class="section-heading style-2">
                                    <h4>Leave a reply</h4>
                                    <div class="line"></div>
                                </div>

                                @if (\Illuminate\Support\Facades\Auth::check())
                                    <!-- Reply Form -->
                                        <div class="contact-form-area">
                                            <form action="#" method="post">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <textarea name="message" class="form-control" id="message" placeholder="Message*"></textarea>
                                                    </div>
                                                    <div class="col-12">
                                                        <button class="btn vizew-btn mt-30" type="submit">Submit Comment</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                @else
                                    Login to comment this post. <a href="{{ route('login') }}">here</a>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Sidebar Widget -->
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="sidebar-area">

                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget share-post-widget mb-50">
                            <p>Share This Post</p>
                            <a href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ route('new.detail', ['id' => $new->id]) }}','popUpWindow','height=500,width=400,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');" target="_blank" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
                            <a href="#" onclick="window.open('https://twitter.com/share?url={{ route('new.detail', ['id' => $new->id]) }}','popUpWindow','height=500,width=400,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                            {{--<a href="#" class="google"><i class="fa fa-google" aria-hidden="true"></i> Google+</a>--}}
                        </div>

                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget p-0 author-widget">
                            <div class="p-4">
                                <img class="author-avatar" src="{{ asset($new->admin->ava) }}" alt="">
                                <a href="#" class="author-name">{{ $new->admin->name }}</a>
                                <div class="author-social-info">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                                <p>{{ $new->admin->desc }}</p>
                            </div>

                            <div class="authors--meta-data d-flex">
                                <p>Posted<span class="counter">{{ $new->admin->load('news')->news->count() }}</span></p>
                                <p>Comments<span class="counter">{{ $new->admin->load('news')->news->load('comments')->sum(function ($new) {return $new->comments->count();}) }}</span></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
