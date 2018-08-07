<?php

namespace App\Http\Controllers\ScopeOfWork\Front;

use App\Http\Controllers\Controller;
use App\News;
use App\ScopeOfWork;
use Cache;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ScopeOfWorkController extends Controller
{
    public function index()
    {
        $this->seo()->setTitle('scope of work');
        $this->seo()->setDescription('Our scope of work');

        $scope = Cache::remember("_front_scope_index_", 1, function () {
            return ScopeOfWork::latest()->where('status', 'publish')->paginate(9, ["id", 'link', "title", "summary", "image", "created_at"]);
        });

        return view('scope_of_work.front.index', compact('scope'));
    }

    public function show($slug)
    {
        $scope = ScopeOfWork::where('status', 'publish')->where('link', $slug)->first();

        $this->seo()->setTitle($scope->title);
        $this->seo()->setDescription($scope->description);

        return view('scope_of_work.front.show', compact('scope'));
    }
}
