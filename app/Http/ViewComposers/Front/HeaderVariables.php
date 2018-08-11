<?php

use App\About;
use App\News;
use App\Album;
use App\Project;
use App\Category;
use App\ScopeOfWork;
use Illuminate\Database\Eloquent\Builder;

$abouts = About::where('publish_at', '<=', now())->where(function (Builder $about) {
    $about->whereNull('expire_at')->orWhere('expire_at', '>=', now());
})->orderBy('priority', 'DESC')->get()->map(function (About $item) {
    return [
        'title' => $item->title,
        'link' => route('about.show', $item->id)
    ];
})->toArray();

$contact = [
    'title' => 'Contact',
    'link' => route('contact.show'),
];

array_push($abouts, $contact);

return [
    'front_menu' => [
        [
            'title' => 'News',
            'link' => route('news.index'),
            'sub' => Category::where('category_type', News::class)->orderBy('priority', 'DESC')->get()->map(function (Category $item) {
                return [
                    'title' => $item->title,
                    'link' => route('category.index', $item->id)
                ];
            })
        ],
        [
            'title' => 'Scope of Work',
            'link' => route('scope_of_work.index'),
            'sub' => ScopeOfWork::where('status', 'publish')->orderBy('priority', 'DESC')->get()->map(function (ScopeOfWork $item) {
                return [
                    'title' => $item->title,
                    'link' => route('scope_of_work.show', $item->link)
                ];
            })
        ],
        [
            'title' => 'About Us',
            'link' => '#',
            'sub' => $abouts
        ],
        [
            'title' => 'Projects',
            'link' => route('project.index'),
            'sub' => Category::where('category_type', Project::class)->orderBy('priority', 'DESC')->get()->map(function (Category $item) {
                return [
                    'title' => $item->title,
                    'link' => route('category.index', $item->id)
                ];
            })
        ],
        [
            'title' => 'Gallery',
            'link' => route('album.index'),
            'sub' => Category::where('category_type', Album::class)->orderBy('priority', 'DESC')->get()->map(function (Category $item) {
                return [
                    'title' => $item->title,
                    'link' => route('category.index', $item->id)
                ];
            })
        ],
    ]
];