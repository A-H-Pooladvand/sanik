<?php

namespace App\Http\Controllers\Main\Front;

use App\Album;
use App\Http\Controllers\Controller;
use App\News;
use App\Project;
use App\Slider;
use Cache;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function show(Request $request)
    {

        $this->seo()->setTitle('Sanik-Group');
        $this->seo()->setDescription('Sanik-Group');

        $sliders = Cache::remember('_front_sliders', 1, function () {
            return Slider::latest()->take(5)->get(['title', 'image', 'description', 'link']);
        });

        $news = Cache::remember('_front_news', 1, function () {
            return News::with('categories:id,title')
                ->latest()
                ->where('status', 'publish')
                ->where('publish_at', '<=', now())
                ->where(function (Builder $news) {
                    $news->whereNull('expire_at')->orWhere('expire_at', '>=', now());
                })
                ->take(3)
                ->get(['id', 'title', 'summary', 'image', 'created_at']);
        });

        $projects = Cache::remember('_front_projects', 1, function () {
            return Project::with('categories:id,title')
                ->latest()
                ->where('status', 'publish')
                ->where('publish_at', '<=', now())
                ->where(function (Builder $news) {
                    $news->whereNull('expire_at')->orWhere('expire_at', '>=', now());
                })
                ->take(3)
                ->get(['id', 'title', 'summary', 'image', 'created_at']);
        });

        $albums = Cache::remember('_front_albums', 1, function () {
            return Album::latest()->take(6)->get();
        });

        return view('main.front.index', compact('sliders', 'news', 'albums', 'projects'));
    }
}
