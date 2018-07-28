<?php

namespace App\Http\Controllers\Project\Front;

use Cache;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $this->seo()->setTitle('Projects');
        $this->seo()->setDescription('SANIK GROUP latest projects');

        $page = $request->has('page') ? $request->query('page') : 1;
        $projects = Cache::remember("_front_project_index_{$page}", 1, function () {
            return Project::latest()
                ->where('status', 'publish')
                ->where('publish_at', '<=', now())
                ->where(function (Builder $project) {
                    $project->whereNull('expire_at')->orWhere('expire_at', '>=', now());
                })->paginate(10, ["id", "title", "summary", "image", "created_at"]);
        });

        return view('project.front.index', compact('projects'));
    }

    public function show($id)
    {
        $project = Project::with('tags', 'galleries'/*, 'files'*/)
            ->where('status', 'publish')
            ->where('publish_at', '<=', now())
            ->where(function (Builder $project) {
                $project->whereNull('expire_at')->orWhere('expire_at', '>=', now());
            })->find($id);

        $categories = $project->categories()->latest()->take(5)->get(['id', 'title']);

        $latestProjects = Project::latest()
            ->where('status', 'publish')
            ->where('publish_at', '<=', now())
            ->where('expire_at', '>=', now())
            ->where('id', '<>', $project->id)
            ->take(5)->get();

        $this->seo()->setTitle($project->title);
        $this->seo()->setDescription($project->description);

        return view('project.front.show', compact('project', 'latestProjects', 'categories'));
    }
}
