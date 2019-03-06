@extends('FE.layouts.app')

@section('content')
    <!-- ##### Hero Area Start ##### -->
    <section class="hero--area section-padding-80">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12 col-md-7 col-lg-8">
                    @if (!count($news))
                        <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                            <div>No content.</div>
                        </div>
                    @else
                        <div class="tab-content">
                            @foreach ($news as $index => $new)
                                <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="post-{{ $new->id }}" role="tabpanel" aria-labelledby="post-{{ $new->id }}-tab">
                                    <!-- Single Feature Post -->
                                    <div class="single-feature-post video-post bg-img" style="background-image: url('{{ $new->thumbnail }}');">
                                        <!-- Play Button -->
                                    {{--<a href="video-post.html" class="btn play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>--}}

                                    <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="post-cata">News</a>
                                            <a href="single-post.html" class="post-title">{{ $new->title }}</a>
                                            <div class="post-meta d-flex">
                                                <a href=""><span><i class="fa fa-comments-o" aria-hidden="true"></i> {{ $new->comments->count() }}</span></a>
                                                <a href=""><span><i class="fa fa-eye" aria-hidden="true"></i> {{ $new->view }}</span></a>
                                                {{--<a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 25</a>--}}
                                            </div>
                                        </div>

                                        <!-- Video Duration -->
                                        <span class="video-duration">{{ $new->created_at->format('d.m') }}</span>
                                    </div>
                                </div>
                            @endforeach
                            {{--@if (count($news) < 5)--}}
                            {{--@php--}}
                            {{--$new = $news->first();--}}
                            {{--@endphp--}}
                            {{--@for ($i = 0; $i < 5 - count($news); $i++)--}}
                            {{--<div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="post-{{ $new->id }}" role="tabpanel" aria-labelledby="post-{{ $new->id }}-tab">--}}
                            {{--<!-- Single Feature Post -->--}}
                            {{--<div class="single-feature-post video-post bg-img" style="background-image: url('img/bg-img/{{ $new->id }}.jpg');">--}}
                            {{--<!-- Play Button -->--}}
                            {{--<a href="video-post.html" class="btn play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>--}}

                            {{--<!-- Post Content -->--}}
                            {{--<div class="post-content">--}}
                            {{--<a href="#" class="post-cata">Sports</a>--}}
                            {{--<a href="single-post.html" class="post-title">Reunification of migrant toddlers, parents should be completed Thursday</a>--}}
                            {{--<div class="post-meta d-flex">--}}
                            {{--<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 25</a>--}}
                            {{--<a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 25</a>--}}
                            {{--<a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 25</a>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<!-- Video Duration -->--}}
                            {{--<span class="video-duration">05.03</span>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--@endfor--}}
                            {{--@endif--}}
                        </div>
                    @endif
                </div>

                <div class="col-12 col-md-5 col-lg-4">


                        <ul class="nav vizew-nav-tab" role="tablist">
                            @if (!count($news))
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                    <div>No content.</div>
                                </div>
                            @else
                                @foreach ($news as $index => $new)
                                    <li class="nav-item w-100">
                                        <a class="nav-link {{ $index === 0 ? 'active' : '' }}" id="post-{{ $new->id }}-tab" data-toggle="pill" href="#post-{{ $new->id }}" role="tab" aria-controls="post-{{ $new->id }}" aria-selected="true">
                                            <!-- Single Blog Post -->
                                            <div class="single-blog-post style-2 d-flex align-items-center">
                                                <div class="post-thumbnail">
                                                    <img src="{{ $new->thumbnail }}" alt="">
                                                </div>
                                                <div class="post-content w-100">
                                                    <h6 class="post-title">{{ $new->title }}</h6>
                                                    <div class="post-meta d-flex justify-content-between">
                                                        <span><i class="fa fa-comments-o" aria-hidden="true"></i> {{ $new->comments->count() }}</span>
                                                        <span><i class="fa fa-eye" aria-hidden="true"></i> {{ $new->view }}</span>
                                                        {{--<span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 19</span>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Trending Posts Area Start ##### -->
    <section class="trending-posts-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h4>Trending News</h4>
                        <div class="line"></div>
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                @if (!count($news))
                    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                        <div>No content.</div>
                    </div>
                @else
                    @foreach ($trends as $item)
                    <!-- Single Blog Post -->
                        <div class="col-12 col-md-4">
                            <div class="single-post-area mb-80">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="{{ $item->thumbnail }}" alt="">

                                    <!-- Video Duration -->
                                    <span class="video-duration">{{ $item->created_at->format('d.m') }}</span>
                                </div>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="#" class="post-cata cata-sm cata-danger">Hot</a>
                                    <a href="#" class="post-title">{{ $item->title }}</a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><span><i class="fa fa-comments-o" aria-hidden="true"></i> {{ $new->comments->count() }}</span></a>
                                        <a href="#"> <span><i class="fa fa-eye" aria-hidden="true"></i> {{ $new->view }}</span></a>
                                        {{--<a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 15</a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>

        </div>
    </section>
    <!-- ##### Trending Posts Area End ##### -->

    <!-- ##### Vizew Post Area Start ##### -->
    <section class="vizew-post-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="all-posts-area">
                        <!-- Section Heading -->
                        <div class="section-heading style-2">
                            <h4>Featured News</h4>
                            <div class="line"></div>
                        </div>

                        <!-- Featured Post Slides -->
                        <div class="featured-post-slides owl-carousel mb-30">
                            @if (!count($news))
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                    <div>No content.</div>
                                </div>
                            @else
                                @foreach($trends as $item)
                                <!-- Single Feature Post -->
                                    <div class="single-feature-post video-post bg-img" style="background-image: url('{{ $item->thumbnail }}');">
                                        <!-- Play Button -->
                                    {{--<a href="video-post.html" class="btn play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>--}}

                                    <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="post-cata">News</a>
                                            <a href="single-post.html" class="post-title">{{ $item->title }}</a>
                                            <div class="post-meta d-flex">
                                                <a href="#"><span><i class="fa fa-comments-o" aria-hidden="true"></i> {{ $new->comments->count() }}</span></a>
                                                <a href="#"><span><i class="fa fa-eye" aria-hidden="true"></i> {{ $new->view }}</span></a>
                                                {{--<a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 25</a>--}}
                                            </div>
                                        </div>

                                        <!-- Video Duration -->
                                        <span class="video-duration">{{ $item->created_at->format('d.m') }}</span>
                                    </div>
                                @endforeach
                            @endif

                        </div>

                        @foreach ($news as $new)
                            <!-- Single Post Area -->
                                <div class="single-post-area mb-30">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-lg-6">
                                            <!-- Post Thumbnail -->
                                            <div class="post-thumbnail">
                                                <img src="{{ $new->thumbnail }}" alt="">

                                                <!-- Video Duration -->
                                                <span class="video-duration">{{ $item->created_at->format('d.m') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <!-- Post Content -->
                                            <div class="post-content mt-0">
                                                <a href="#" class="post-cata cata-sm cata-success">News</a>
                                                <a href="single-post.html" class="post-title mb-2">{{ $new->title }}</a>
                                                <div class="post-meta d-flex align-items-center mb-2">
                                                    <a href="#" class="post-author">By {{ $new->admin->name }}</a>
                                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                                    <a href="#" class="post-date">{{ $new->created_at->format('M d, Y') }}</a>
                                                </div>
                                                <p class="mb-2">{{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($new->content))) }}</p>
                                                <div class="post-meta d-flex">
                                                    <a href="#"><span><i class="fa fa-comments-o" aria-hidden="true"></i> {{ $new->comments->count() }}</span></a>
                                                    <a href="#"><span><i class="fa fa-eye" aria-hidden="true"></i> {{ $new->view }}</span></a>
                                                    {{--<a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 7</a>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach

                    </div>
                </div>

                <div class="col-12 col-md-5 col-lg-4">
                    <div class="sidebar-area">

                        {{--<!-- ***** Single Widget ***** -->--}}
                        {{--<div class="single-widget followers-widget mb-50">--}}
                            {{--<a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span class="counter">198</span><span>Fan</span></a>--}}
                            {{--<a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span class="counter">220</span><span>Followers</span></a>--}}
                            {{--<a href="#" class="google"><i class="fa fa-google" aria-hidden="true"></i><span class="counter">140</span><span>Subscribe</span></a>--}}
                        {{--</div>--}}

                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget latest-video-widget mb-50">
                            <!-- Section Heading -->
                            <div class="section-heading style-2 mb-30">
                                <h4>Random news</h4>
                                <div class="line"></div>
                            </div>
                            @if (!count($news))
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                    <div>No content.</div>
                                </div>
                            @else
                            <!-- Single Blog Post -->
                                <div class="single-post-area mb-30">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="{{ $news->first()->thumbnail }}" alt="">

                                        <!-- Video Duration -->
                                        <span class="video-duration">{{ $news->first()->created_at->format('d.m') }}</span>
                                    </div>

                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="post-cata cata-sm cata-dander">News</a>
                                        <a href="#" class="post-title">{{ $news->first()->title }}</a>
                                        <div class="post-meta d-flex">
                                            <a href="#"><span><i class="fa fa-comments-o" aria-hidden="true"></i> {{ $new->comments->count() }}</span></a>
                                            <a href="#"><span><i class="fa fa-eye" aria-hidden="true"></i> {{ $new->view }}</span></a>
                                            {{--<a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 22</a>--}}
                                        </div>
                                    </div>
                                </div>

                                @foreach($news as $index => $new)
                                    @if ($index != 0)
                                    <!-- Single Blog Post -->
                                        <div class="single-blog-post d-flex">
                                            <div class="post-thumbnail">
                                                <img src="{{ $new->thumbnail }}" alt="">
                                            </div>
                                            <div class="post-content">
                                                <a href="#" class="post-title">{{ $new->title }}</a>
                                                <div class="post-meta d-flex justify-content-between">
                                                    <span><i class="fa fa-comments-o" aria-hidden="true"></i> {{ $new->comments->count() }}</span>
                                                    <span><i class="fa fa-eye" aria-hidden="true"></i> {{ $new->view }}</span>
                                                    {{--<a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 23</a>--}}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Vizew Psot Area End ##### -->
@stop
