<?php

use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator as Breadcrumb;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

/** USERS */

# users
Breadcrumbs::register('users', function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('لیست کاربران', route('admin.user.index'));
});

# User > Create
Breadcrumbs::register('user-create', function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->parent('users');
    $breadcrumbs->push('افزودن کاربر', route('admin.user.create'));
});

# User > Show
Breadcrumbs::register('user-show', function (Breadcrumb $breadcrumbs, $user) {
    $breadcrumbs->parent('users');
    $breadcrumbs->push('مشاهده کاربر', route('admin.user.show', $user->id));
});

# Users > Show > Edit
Breadcrumbs::register('user-edit', function (Breadcrumb $breadcrumbs, $user) {
    $breadcrumbs->parent('user-show', $user);
    $breadcrumbs->push('ویرایش کاربر', route('admin.user.edit', $user->id));
});

# User > Show > Edit-Permission
Breadcrumbs::register('user-edit-permission', function (Breadcrumb $breadcrumbs, $user) {
    $breadcrumbs->parent('user-show', $user);
    $breadcrumbs->push('ویرایش دسترسی های فردی کاربر', route('admin.user.permission.edit', $user->id));
});

/** ROLES */

# Roles
Breadcrumbs::register('roles', function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('لیست نقش ها', route('admin.role.index'));
});

# Role > Create
Breadcrumbs::register('role-create', function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->parent('roles');
    $breadcrumbs->push('افزودن نقش', route('admin.role.create'));
});

# Role > Show
Breadcrumbs::register('role-show', function (Breadcrumb $breadcrumbs, $role) {
    $breadcrumbs->parent('roles');
    $breadcrumbs->push('مشاهده نقش', route('admin.role.show', $role->id));
});

# Roles > Show > Edit
Breadcrumbs::register('role-edit', function (Breadcrumb $breadcrumbs, $role) {
    $breadcrumbs->parent('role-show', $role);
    $breadcrumbs->push('ویرایش نقش', route('admin.role.edit', $role->id));
});

/** Tag */

# Tags
Breadcrumbs::register('tags', function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('لیست کلمات کلیدی', route('admin.tag.index'));
});

# Tag > Create
Breadcrumbs::register('tag-create', function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->parent('tags');
    $breadcrumbs->push('افزودن کلمه کلیدی', route('admin.tag.create'));
});

# Tag > Show
Breadcrumbs::register('tag-show', function (Breadcrumb $breadcrumbs, $tag) {
    $breadcrumbs->parent('tags');
    $breadcrumbs->push('مشاهده کلمه کلیدی', route('admin.tag.show', $tag->id));
});

# Tags > Show > Edit
Breadcrumbs::register('tag-edit', function (Breadcrumb $breadcrumbs, $tag) {
    $breadcrumbs->parent('tag-show', $tag);
    $breadcrumbs->push('ویرایش کلمه کلیدی', route('admin.tag.edit', $tag->id));
});

/** News */

# News
Breadcrumbs::register('news', function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('لیست اخبار', route('admin.news.index'));
});

# News > Create
Breadcrumbs::register('news-create', function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->parent('news');
    $breadcrumbs->push('افزودن اخبار', route('admin.news.create'));
});

# News > Show
Breadcrumbs::register('news-show', function (Breadcrumb $breadcrumbs, $news) {
    $breadcrumbs->parent('news');
    $breadcrumbs->push('مشاهده اخبار', route('admin.news.show', $news->id));
});

# News > Show > Edit
Breadcrumbs::register('news-edit', function (Breadcrumb $breadcrumbs, $news) {
    $breadcrumbs->parent('news-show', $news);
    $breadcrumbs->push('ویرایش اخبار', route('admin.news.edit', $news->id));
});

/** News Category */

# Categories
Breadcrumbs::register('news-categories', function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('لیست دسته بندی اخبار', route('admin.news.category.index'));
});

# Category > Create
Breadcrumbs::register('news-category-create', function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->parent('news-categories');
    $breadcrumbs->push('افزودن دسته بندی اخبار', route('admin.news.category.create'));
});

# Category > Show
Breadcrumbs::register('news-category-show', function (Breadcrumb $breadcrumbs, $category) {
    $breadcrumbs->parent('news-categories');
    $breadcrumbs->push('مشاهده دسته بندی اخبار', route('admin.news.category.show', $category->id));
});

# Categories > Show > Edit
Breadcrumbs::register('news-category-edit', function (Breadcrumb $breadcrumbs, $category) {
    $breadcrumbs->parent('news-category-show', $category);
    $breadcrumbs->push('ویرایش دسته بندی اخبار', route('admin.news.category.edit', $category->id));
});

/** Album */

# Album
Breadcrumbs::register('album', function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('لیست آلبوم تصاویر', route('admin.album.index'));
});

# Album > Create
Breadcrumbs::register('album-create', function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->parent('album');
    $breadcrumbs->push('افزودن آلبوم تصاویر', route('admin.album.create'));
});

# Album > Show
Breadcrumbs::register('album-show', function (Breadcrumb $breadcrumbs, $album) {
    $breadcrumbs->parent('album');
    $breadcrumbs->push('مشاهده آلبوم تصاویر', route('admin.album.show', $album->id));
});

# Album > Show > Edit
Breadcrumbs::register('album-edit', function (Breadcrumb $breadcrumbs, $album) {
    $breadcrumbs->parent('album-show', $album);
    $breadcrumbs->push('ویرایش آلبوم تصاویر', route('admin.album.edit', $album->id));
});

/** Album Category */

# Categories
Breadcrumbs::register('album-categories', function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('لیست دسته بندی آلبوم تصاویر', route('admin.album.category.index'));
});

# Category > Create
Breadcrumbs::register('album-category-create', function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->parent('album-categories');
    $breadcrumbs->push('افزودن دسته بندی آلبوم تصاویر', route('admin.album.category.create'));
});

# Category > Show
Breadcrumbs::register('album-category-show', function (Breadcrumb $breadcrumbs, $category) {
    $breadcrumbs->parent('album-categories');
    $breadcrumbs->push('مشاهده دسته بندی آلبوم تصاویر', route('admin.album.category.show', $category->id));
});

# Categories > Show > Edit
Breadcrumbs::register('album-category-edit', function (Breadcrumb $breadcrumbs, $category) {
    $breadcrumbs->parent('album-category-show', $category);
    $breadcrumbs->push('ویرایش دسته بندی آلبوم تصاویر', route('admin.album.category.edit', $category->id));
});


/** Page */

# Pages
Breadcrumbs::register('pages', function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('لیست صفحات', route('admin.page.index'));
});

# Page > Create
Breadcrumbs::register('page-create', function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->parent('pages');
    $breadcrumbs->push('افزودن صفحه', route('admin.page.create'));
});

# Page > Show
Breadcrumbs::register('page-show', function (Breadcrumb $breadcrumbs, $page) {
    $breadcrumbs->parent('pages');
    $breadcrumbs->push('مشاهده صفحه', route('admin.page.show', $page->id));
});

# Pages > Show > Edit
Breadcrumbs::register('page-edit', function (Breadcrumb $breadcrumbs, $page) {
    $breadcrumbs->parent('page-show', $page);
    $breadcrumbs->push('ویرایش صفحه', route('admin.page.edit', $page->id));
});

/** Slider */

# Sliders
Breadcrumbs::register('sliders', function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('لیست اسلاید ها', route('admin.slider.index'));
});

# Slider > Create
Breadcrumbs::register('slider-create', function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->parent('sliders');
    $breadcrumbs->push('افزودن اسلایدر', route('admin.slider.create'));
});

# Slider > Show
Breadcrumbs::register('slider-show', function (Breadcrumb $breadcrumbs, $slider) {
    $breadcrumbs->parent('sliders');
    $breadcrumbs->push('مشاهده اسلایدر', route('admin.slider.show', $slider->id));
});

# Sliders > Show > Edit
Breadcrumbs::register('slider-edit', function (Breadcrumb $breadcrumbs, $slider) {
    $breadcrumbs->parent('slider-show', $slider);
    $breadcrumbs->push('ویرایش اسلایدر', route('admin.slider.edit', $slider->id));
});

# Audibles
Breadcrumbs::register('contact', function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('تماس با ما', route('admin.contact.contacts.index'));
});

# Audible > Show
Breadcrumbs::register('contact-show', function (Breadcrumb $breadcrumbs, $contact) {
    $breadcrumbs->parent('contact');
    $breadcrumbs->push('مشاهده تماس با ما', route('admin.contact.contacts.show', $contact->id));
});

# Audibles > Show > Edit
Breadcrumbs::register('audible-edit', function (Breadcrumb $breadcrumbs, $audible) {
    $breadcrumbs->parent('audible-show', $audible);
    $breadcrumbs->push('ویرایش کوتاه و شنیدنی', route('admin.audible.edit', $audible->id));
});