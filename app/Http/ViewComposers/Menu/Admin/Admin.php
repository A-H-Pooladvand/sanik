<?php
/**
 * Created by PhpStorm.
 * User: Amirhossein
 * Date: 2/6/2018
 * Time: 10:23 PM
 */

return [
    // Dashboard
    [
        'title' => 'داشبورد',
        'icon' => 'fa fa-fw fa-home',
        'link' => '#',
        'permission' => 'panel',
        'sub' => [
            [
                'title' => 'مشاهده سایت',
                'link' => route('home'),
                'permission' => 'admin-panel',
                'target' => '_blank',
            ]
        ]
    ],
    // User
    [
        'title' => 'کاربران',
        'icon' => 'fa fa-fw fa-user',
        'link' => '#',
        'permission' => 'user',
        'sub' => [
            [
                'title' => 'افزودن کاربر',
                'link' => route('admin.user.create'),
                'permission' => 'create-user'
            ],
            [
                'title' => 'لیست کاربران',
                'link' => route('admin.user.index'),
                'permission' => 'read-user'
            ],
            [
                'title' => 'افزودن نقش',
                'link' => route('admin.role.create'),
                'permission' => 'create-acl'
            ],
            [
                'title' => 'لیست نقش ها',
                'link' => route('admin.role.index'),
                'permission' => 'read-acl'
            ]
        ]
    ],
    // Slider
    [
        'title' => 'اسلایدر',
        'icon' => 'fa fa-fw fa-sliders',
        'link' => '#',
        'permission' => 'slider',
        'sub' => [
            [
                'title' => 'افزودن اسلایدر',
                'link' => route('admin.slider.create'),
                'permission' => 'create-slider'
            ],
            [
                'title' => 'لیست اسلاید ها',
                'link' => route('admin.slider.index'),
                'permission' => 'read-slider'
            ]
        ]
    ],
    // News
    [
        'title' => 'اخبار',
        'icon' => 'fa fa-fw fa-diamond',
        'link' => '#',
        'permission' => 'news',
        'sub' => [
            [
                'title' => 'افزودن مطلب',
                'link' => route('admin.news.create'),
                'permission' => 'create-news'
            ],
            [
                'title' => 'لیست مطالب',
                'link' => route('admin.news.index'),
                'permission' => 'read-news'
            ],
            [
                'title' => 'افزودن دسته بندی',
                'link' => route('admin.news.category.create'),
                'permission' => 'create-news|edit-news'
            ],
            [
                'title' => 'لیست دسته بندی ها',
                'link' => route('admin.news.category.index'),
                'permission' => 'create-news|edit-news'
            ]
        ]
    ],
    // Project
    [
        'title' => 'پروژه ها',
        'icon' => 'fa fa-fw fa-tasks',
        'link' => '#',
        'permission' => 'project',
        'sub' => [
            [
                'title' => 'افزودن پروژه',
                'link' => route('admin.project.create'),
                'permission' => 'create-project'
            ],
            [
                'title' => 'لیست پروژه ها',
                'link' => route('admin.project.index'),
                'permission' => 'read-project'
            ],
            [
                'title' => 'افزودن دسته بندی',
                'link' => route('admin.project.category.create'),
                'permission' => 'create-project|edit-project'
            ],
            [
                'title' => 'لیست دسته بندی ها',
                'link' => route('admin.project.category.index'),
                'permission' => 'create-project|edit-project'
            ]
        ]
    ],
    // Album
    [
        'title' => 'آلبوم تصاویر',
        'icon' => 'fa fa-fw fa-image',
        'link' => '#',
        'permission' => 'album',
        'sub' => [
            [
                'title' => 'افزودن آلبوم',
                'link' => route('admin.album.create'),
                'permission' => 'create-album'
            ],
            [
                'title' => 'لیست آلبوم ها',
                'link' => route('admin.album.index'),
                'permission' => 'read-album'
            ],
            [
                'title' => 'افزودن دسته بندی',
                'link' => route('admin.album.category.create'),
                'permission' => 'create-album|edit-album'
            ],
            [
                'title' => 'لیست دسته بندی ها',
                'link' => route('admin.album.category.index'),
                'permission' => 'create-album|edit-album'
            ]
        ]
    ],
    // Scope of Work
    [
        'title' => 'دامنه کار',
        'icon' => 'fa fa-fw fa-building-o',
        'link' => '#',
        'permission' => 'scope-of-work',
        'sub' => [
            [
                'title' => 'افزودن دامنه',
                'link' => route('admin.scope_of_work.create'),
                'permission' => 'create-scope-of-work'
            ],
            [
                'title' => 'لیست دامنه ها',
                'link' => route('admin.scope_of_work.index'),
                'permission' => 'read-scope-of-work'
            ]
        ]
    ],
    // Page
//    [
//        'title' => 'صفحات',
//        'icon' => 'fa fa-fw fa-sticky-note',
//        'link' => '#',
//        'permission' => 'page',
//        'sub' => [
//            [
//                'title' => 'افزودن صفحه',
//                'link' => route('admin.page.create'),
//                'permission' => 'create-page'
//            ],
//            [
//                'title' => 'لیست صفحات',
//                'link' => route('admin.page.index'),
//                'permission' => 'read-page'
//            ]
//        ]
//    ],
    // Book

    // Tags
    [

        'title' => 'کلمات کلیدی',
        'icon' => 'fa fa-fw fa-tags',
        'link' => '#',
        'permission' => 'tag',
        'sub' => [
            [
                'title' => 'افزودن کلمه کلیدی',
                'link' => route('admin.tag.create'),
                'permission' => 'create-tag'
            ],
            [
                'title' => 'لیست کلمات کلیدی',
                'link' => route('admin.tag.index'),
                'permission' => 'read-tag'
            ]
        ]
    ],
    // About
    [
        'title' => 'درباره ما',
        'icon' => 'fa fa-fw fa-info',
        'link' => '#',
        'permission' => 'about',
        'sub' => [
            [
                'title' => 'افزودن درباره ما',
                'link' => route('admin.about.create'),
                'permission' => 'create-about'
            ],
            [
                'title' => 'لیست درباره ما',
                'link' => route('admin.about.index'),
                'permission' => 'read-about'
            ]
        ]
    ],
    // Contact-us
    [
        'title' => 'تماس با ما',
        'icon' => 'fa fa-fw fa-phone',
        'link' => '#',
        'permission' => 'contact',
        'sub' => [
            [
                'title' => 'مشاهده تماس با ما',
                'link' => route('admin.contact.show', 1),
                'permission' => 'read-contact'
            ],
            [
                'title' => 'ویرایش تماس با ما',
                'link' => route('admin.contact.edit', 1),
                'permission' => 'edit-about'
            ],
            [
                'title' => 'پیام ها',
                'link' => route('admin.contact.contacts.index'),
                'permission' => 'edit-about'
            ]
        ]
    ]
];