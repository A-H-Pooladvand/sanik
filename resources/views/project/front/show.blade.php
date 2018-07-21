@extends('_layouts.front.index')


@section('content')

    <main>
        <div class="page-loader">
            <div class="loader">Loading...</div>
        </div>
        <div class="main">
            <section class="module-small">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-8">
                            <div class="post">
                                <div class="post-thumbnail">
                                    <img src="{{ image_url($project->image, 75, 42, true) }}" class="img-rounded" alt="Blog Featured Image"/>
                                </div>
                                <div class="post-header font-alt">
                                    <h1 class="post-title">{{ $project->title }}</h1>
                                    <h5>{{ $project->summary }}</h5>
                                    <div class="post-meta">{{ $project->created_at->format('Y-d-m') }}
                                </div>
                            </div>
                            <div class="post-entry">
                                <p>{{ $project->content }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-md-3 col-md-offset-1 sidebar">

                        <div class="widget">
                            <h5 class="widget-title font-alt">Categories</h5>
                            <ul class="icon-list">
                                @foreach($categories as $category)
                                    <li><a href="{{ route('category.index', $category->id) }}">{{ $category->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="widget">
                            <h5 class="widget-title font-alt">Latest Projects</h5>
                            <ul class="widget-posts">
                                @foreach($latestProjects as $latestProject)
                                    <li class="clearfix">
                                        <div class="widget-posts-image">
                                            <a href="{{ route('news.show', $latestProject->id) }}">
                                                <img src="{{ image_url($latestProject->image, 6, 3, true) }}" alt="Post Thumbnail"/>
                                            </a>
                                        </div>
                                        <div class="widget-posts-body">
                                            <div class="widget-posts-title">
                                                <a href="{{ route('news.show', $latestProject->id) }}">
                                                    {{ str_limit($latestProject->title, 25) }}
                                                </a>
                                            </div>
                                            <div class="widget-posts-meta">{{ $latestProject->created_at->format('d F') }}</div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @if(!empty($project->tags))
                            <div class="widget">
                                <h5 class="widget-title font-alt">Tag</h5>
                                <div class="tags font-serif">
                                    @foreach($project->tags as $tag)
                                        <a href="{{ route('tag.index', $tag->slug) }}" rel="tag">{{ $tag->title }}</a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                </div>
                </div>

            </section>
        </div>
        <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>

@stop
