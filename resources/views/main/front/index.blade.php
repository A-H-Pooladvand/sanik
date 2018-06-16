@extends('_layouts.front.index')

@section('content')

    <main>
        <div class="page-loader">
            <div class="loader">Loading...</div>
        </div>

        <section class="home-section home-full-height photography-page" id="home">

            <div class="hero-slider">

                <ul class="slides">

                    @foreach($sliders as $slider)
                        <li class="bg-dark" style="background-image:url({{ image_url($slider->image) }});">
                            <div class="container">
                                <div class="image-caption">
                                    <div class="font-alt caption-text">
                                        <a href="{{ $slider->link }}">{{ $slider->title }}</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>

            </div>

        </section>

        <div class="main">

            <section class="module" id="news">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <h2 class="module-title font-alt">latest projects</h2>
                            {{--<div class="module-subtitle font-serif">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</div>--}}
                        </div>

                        @foreach($projects as $item)
                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <div class="post mb-20">
                                    <div class="post-thumbnail"><a href="#"><img src="{{ image_url($item->image, 80,46,true) }}" alt="{{ $item->title }}"/></a></div>
                                    <div class="post-header font-alt">
                                        <h2 class="post-title"><a href="#">{{ $item->title }}</a></h2>
                                        <div class="post-meta">{{--By&nbsp;<a href="#">{{ $item->summary }}</a>&nbsp;|--}} {{ $item->created_at->format('d-m-Y') }}
                                        </div>
                                    </div>
                                    <div class="post-entry">
                                        <p>{{ $item->summary }}</p>
                                    </div>
                                    <div class="post-more"><a class="more-link" href="#">Read more</a></div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>

            <section class="module" id="news">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <h2 class="module-title font-alt">company news</h2>
                            {{--<div class="module-subtitle font-serif">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</div>--}}
                        </div>

                        @foreach($news as $item)
                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <div class="post mb-20">
                                    <div class="post-thumbnail"><a href="#"><img src="{{ image_url($item->image, 80,46,true) }}" alt="{{ $item->title }}"/></a></div>
                                    <div class="post-header font-alt">
                                        <h2 class="post-title"><a href="#">{{ $item->title }}</a></h2>
                                        <div class="post-meta">{{--By&nbsp;<a href="#">{{ $item->summary }}</a>&nbsp;|--}} {{ $item->created_at->format('d-m-Y') }}
                                        </div>
                                    </div>
                                    <div class="post-entry">
                                        <p>{{ $item->summary }}</p>
                                    </div>
                                    <div class="post-more"><a class="more-link" href="#">Read more</a></div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>

            <section class="module pb-0" id="works">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <h2 class="module-title font-alt">Our projects photo album</h2>
                            <div class="module-subtitle font-serif"></div>
                        </div>
                    </div>
                </div>

                <ul class="works-grid works-grid-gut works-grid-3 works-hover-w" id="works-grid">

                    @foreach($albums as $album)
                        <li class="work-item illustration webdesign"><a href="#">
                                <div class="work-image"><img alt="{{ $album->title }}" src={{ image_url($album->image, 56,31, true) }} /></div>
                                <div class="work-caption font-alt">
                                    <h3 class="work-title">{{ $album->title }}</h3>
                                    {{--<div class="work-descr">Illustration</div>--}}
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </section>

            <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
        </div>

    </main>

@stop