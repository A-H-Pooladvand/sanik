@extends('_layouts.front.index')


@section('content')


    <div class="main">

        <section class="module">
            <div class="container">

                <div class="row multi-columns-row post-columns">
                    @foreach($projects as $project)
                        <div class="col-md-6 col-lg-6">
                            <div class="post">
                                <div class="post-thumbnail">
                                    <a href={{ route('project.show', $project->id) }}>
                                        <img class="img-rounded" src="{{ image_url($project->image, 55, 31, true) }}" alt="Blog-post Thumbnail"/>
                                    </a>
                                </div>
                                <div class="post-header font-alt">
                                    <h2 class="post-title">
                                        <a href={{ route('project.show', $project->id) }}>{{ $project->title }}</a>
                                    </h2>
                                    <div class="post-meta">{{ $project->created_at->format('Y-d-m') }}
                                    </div>
                                </div>
                                <div class="post-entry">
                                    <p>{{ str_limit($project->summary, 300) }}</p>
                                </div>
                                <div class="post-more"><a class="more-link" href={{ route('project.show', $project->id) }}>Read more</a></div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="text-center">
                    {{ $projects->links() }}
                </div>

            </div>
        </section>

    </div>

@stop
