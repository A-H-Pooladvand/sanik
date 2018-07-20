@extends('_layouts.front.index')

@section('content')
    <main>

        <div class="page-loader">
            <div class="loader">Loading...</div>
        </div>

        <div class="main">

            <section class="module" id="about">
                <div class="row position-relative m-0">
                    <div class="col-xs-12 col-md-6 side-image" data-background="{{ $about->image }}"></div>
                    <div class="col-xs-12 col-md-6 col-md-offset-6 side-image-text">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2 class="module-title font-alt align-left">{{ $about->title }}</h2>
                                <div class="module-subtitle font-serif align-left">{{ $about->summary }}</div>
                                <p>{{ $about->content }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

        <div class="scroll-up">
            <a href="#totop">
                <i class="fa fa-angle-double-up"></i>
            </a>
        </div>

    </main>


@endsection