<?php

namespace App\Http\Controllers\Category\Front;

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index($id)
    {
        $category = Category::where('id', $id)->firstOrFail();

        $this->seo()->setTitle($category->title);
        $this->seo()->setDescription($category->title);

        $news = $category->news()
            ->where('status', 'publish')
            ->where('publish_at', '<=', now())
            ->where(function (Builder $news) {
                $news->whereNull('expire_at')->orWhere('expire_at', '>=', now());
            })->get(["id", "title", "summary", "image", "created_at"]);

        return view('tag.front.index', compact('news'));
    }
}
