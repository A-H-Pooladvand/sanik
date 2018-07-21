<?php

namespace App\Http\Controllers\Category\Front;

use App\News;
use App\Album;
use App\Project;
use App\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index($id)
    {
        $category = Category::where('id', $id)->firstOrFail();

        $this->seo()->setTitle($category->title);
        $this->seo()->setDescription($category->title);

        switch ($category->category_type) {
            case News::class:
                $news = $category->news_query()->paginate(10, ["id", "title", "summary", "image", "created_at"]);
                return view('news.front.index', compact('news'));
                break;
            case Project::class:
                $projects = $category->project_query()->paginate(10, ["id", "title", "summary", "image", "created_at"]);
                return view('project.front.index', compact('projects'));
                break;
            case Album::class:
                $albums = $category->album_query()->paginate(10);
                return view('album.front.index', compact('albums'));
                break;
            default:
                return abort(404);
        }
    }
}
