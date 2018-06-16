<?php

use App\Album;
use App\News;
use App\Project;
use Illuminate\Database\Eloquent\Builder;

return [

    'latest_news' => Cache::remember('_footer_news', 1, function () {
        return News::with('categories:id,title')
            ->latest()
            ->where('status', 'publish')
            ->where('publish_at', '<=', now())
            ->where(function (Builder $news) {
                $news->whereNull('expire_at')->orWhere('expire_at', '>=', now());
            })
            ->take(5)
            ->get(['id', 'title', 'summary', 'image', 'created_at']);
    }),

    'latest_projects' => Cache::remember('_footer_projects', 1, function () {
        return Project::with('categories:id,title')
            ->latest()
            ->where('status', 'publish')
            ->where('publish_at', '<=', now())
            ->where(function (Builder $news) {
                $news->whereNull('expire_at')->orWhere('expire_at', '>=', now());
            })
            ->take(5)
            ->get(['id', 'title', 'summary', 'image', 'created_at']);
    }),

    'latest_albums' => Cache::remember('_footer_albums', 1, function () {
        return Album::latest()->take(5)->get();
    })

];