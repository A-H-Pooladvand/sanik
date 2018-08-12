@extends('_layouts.front.index')


@section('content')

    <main>
        <div class="page-loader">
            <div class="loader">Loading...</div>
        </div>
        <div class="main">
            <section class="module-small">
                <div class="container">

                    <div class="post">

                        <div class="post-thumbnail text-center">

                            <div class="img--custom" style="background: url({{ image_url($scope->image, 108, 60) }}) no-repeat center center; width: 100%; height: 300px;background-size: 100% 100%;border-radius: 4px"></div>

                            {{--<img src="{{ image_url($scope->image, 108, 30, true) }}" class="img-rounded" alt="Blog Featured Image"/>--}}
                        </div>

                        <div class="post-header font-alt">
                            <h1 class="post-title">{{ $scope->title }}</h1>
                            <h5>{{ $scope->summary }}</h5>
                            <div class="post-meta">{{ $scope->created_at->format('Y-d-m') }}
                            </div>
                        </div>

                        <div class="post-entry">
                            <p>{!! $scope->body !!}</p>
                        </div>
                    </div>

                </div>

            </section>
        </div>
        <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>

@stop
