@extends('_layouts.front.index')

@section('content')

    <main>
        <div class="page-loader">
            <div class="loader">Loading...</div>
        </div>

        <section class="home-section home-full-height home-parallax home-fade" id="home">
            <div class="hero-slider">
                <ul class="slides">
                    @foreach($sliders as $slider)
                        <li class="bg-dark-30 bg-dark" style="background-image:url({{ image_url($slider->image, 192,108) }});">
                            <div class="titan-caption">
                                <div class="caption-content">
                                    {{--<div class="font-alt mb-30 titan-title-size-1">Hello &amp; welcome</div>--}}
{{--                                    <div class="font-alt mb-30 titan-title-size-2">{{ $slider->title }}</div>--}}
                                    {{--<a class="section-scroll btn btn-border-w btn-round" href="{{ $slider->link }}">Read More</a>--}}
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
                            <h2 class="module-title font-alt">
                                <strong>company news</strong>
                            </h2>
                        </div>

                        @foreach($news as $item)
                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <div class="post mb-20">
                                    <div class="post-thumbnail">
                                        <a href="{{ route('news.show', $item->id) }}">
                                            <img class="img-rounded" src="{{ image_url($item->image, 36,20,true) }}" alt="{{ $item->title }}"/>
                                        </a>
                                    </div>
                                    <div class="post-header font-alt">
                                        <h2 class="post-title"><a href="{{ route('news.show', $item->id) }}">{{ $item->title }}</a></h2>
                                        <div class="post-meta">{{ $item->created_at->format('d-m-Y') }}
                                        </div>
                                    </div>
                                    <div class="post-entry">
                                        <p>{{ $item->summary }}</p>
                                    </div>
                                    <div class="post-more"><a class="more-link" href="{{ route('news.show', $item->id) }}">Read more</a></div>
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
                            <h2 class="module-title font-alt">
                                <strong>latest projects</strong>
                            </h2>
                        </div>

                        @foreach($projects as $item)
                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <div class="post mb-20">
                                    <div class="post-thumbnail"><a href="{{ route('project.show', $item->id) }}">
                                            <img class="img-rounded" src="{{ image_url($item->image, 36,20,true) }}" alt="{{ $item->title }}"/></a></div>
                                    <div class="post-header font-alt">
                                        <h2 class="post-title"><a href="{{ route('project.show', $item->id) }}">{{ $item->title }}</a></h2>
                                        <div class="post-meta">{{ $item->created_at->format('d-m-Y') }}
                                        </div>
                                    </div>
                                    <div class="post-entry">
                                        <p>{{ $item->summary }}</p>
                                    </div>
                                    <div class="post-more"><a class="more-link" href="{{ route('project.show', $item->id) }}">Read more</a></div>
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
                            <h2 class="module-title font-alt">
                                <strong>Our projects photo album</strong>
                            </h2>
                            <div class="module-subtitle font-serif"></div>
                        </div>
                    </div>
                </div>

                <ul class="works-grid works-grid-gut works-grid-3 works-hover-w" id="works-grid">

                    @foreach($albums as $album)
                        <li class="work-item illustration webdesign">
                            <a href="{{ route('album.show', $album->id) }}">
                                <div class="work-image"><img class="img-rounded" alt="{{ $album->title }}" src={{ image_url($album->image, 50,27, true) }} /></div>
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