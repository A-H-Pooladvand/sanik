<?php

use App\News;
use App\Album;
use App\Project;
use App\Category;

return [
    'front_menu' => [
        [
            'title' => 'News',
            'link' => route('news.index'),
            'sub' => Category::where('category_type', News::class)->get()->map(function (Category $item) {
                return [
                    'title' => $item->title,
                    'link' => route('category.index', $item->id)
                ];
            })
        ],
        [
            'title' => 'Projects',
            'link' => route('project.index'),
            'sub' => Category::where('category_type', Project::class)->get()->map(function (Category $item) {
                return [
                    'title' => $item->title,
                    'link' => route('category.index', $item->id)
                ];
            })
        ],
        [
            'title' => 'Albums',
            'link' => route('album.index'),
            'sub' => Category::where('category_type', Album::class)->get()->map(function (Category $item) {
                return [
                    'title' => $item->title,
                    'link' => route('category.index', $item->id)
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