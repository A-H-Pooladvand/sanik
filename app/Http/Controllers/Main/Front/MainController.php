<?php

namespace App\Http\Controllers\Main\Front;

use App\Http\Controllers\Controller;
use App\News;
use App\Slider;
use Cache;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function show(Request $request)
    {

        $this->seo()->setTitle('صفحه اصلی');
        $this->seo()->setDescription('صفحه اصلی');

        $sliders = Cache::remember('_front_sliders', 1, function () {
            return Slider::latest()->take(5)->get(['title', 'image', 'description', 'link']);
        });

        $news = Cache::remember('_front_news', 1, function () {
            return News::with('categories:id,title')
                ->latest()
                ->where('status', 'publish')
                ->where('publish_at', '<=', now())
                ->where(function (Builder $news) {
                    $news->whereNull('expire_at')
                        ->orWhere('expire_at', '>=', now());
                })
                ->take(4)
                ->get(['id', 'title', 'summary', 'image', 'created_at']);
        });

        return view('main.front.index', compact('sliders', 'news'));
    }
}
