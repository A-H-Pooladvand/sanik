@extends('_layouts.front.index')

@section('content')

    <div id="main-container">
        <div id="main-content">
            <section class="kopa-area kopa-area-16">
                <div class="container">
                    <div class="widget kopa-widget-listcourse">
                        <div class="widget-content module-listcourse-04">

                            @component('tag.front.news', ['data' => $news])@endcomponent

                            {{--@component('tag.front.news', ['data' => $projects])@endcomponent--}}

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@stop