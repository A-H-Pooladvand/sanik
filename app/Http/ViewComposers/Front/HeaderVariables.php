<?php

use App\Album;
use App\Category;
use App\News;
use App\Project;
use Illuminate\Database\Eloquent\Builder;

return [

    'front_menu' => [
        [
            'title' => 'News',
            'link' => route('news.index'),
            'sub' => Category::where('category_type', News::class)->get()->map(function (Category $item) {
                return [
                    'title' => $item->title,
                    'link' => route('category.index', ['id' => $item->id, 'title' => $item->slug])
                ];
            })
        ],
        [
            'title' => 'Projects',
            'link' => route('project.index'),
            'sub' => Category::where('category_type', Project::class)->get()->map(function (Category $item) {
                return [
                    'title' => $item->title,
                    'link' => route('category.index', ['id' => $item->id, 'title' => $item->slug])
                ];
            })
        ],
        [
            'title' => 'Albums',
            'link' => route('project.index'),
            'sub' => Category::where('category_type', Album::class)->get()->map(function (Category $item) {
                return [
                    'title' => $item->title,
                    'link' => route('category.index', ['id' => $item->id, 'title' => $item->slug])
                ];
            })
        ],
        [
            'title' => 'About',
            'link' => route('about.show'),
        ],
        [
            'title' => 'Contact',
            'link' => route('contact.show'),
        ]
    ]

];