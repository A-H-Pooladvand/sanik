<?php

namespace App\Http\Controllers\Project\Admin;

use DB;
use Auth;
use App\Project;
use App\Category;
use App\Http\Helpers\Category\JEasyUi;
use App\Http\Helpers\DateConverter\DateConverter;
use App\Http\Helpers\Multimedia\Multimedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        return view('project.admin.index');
    }

    public function items(Request $request)
    {
        $project = Project::select(['id', 'status', 'title', 'summary', 'created_at', 'updated_at']);

        $project = $this->getGrid($request)->items($project);
        $project['rows'] = $project['rows']->each(function ($item) {
            $item->status_farsi = $item->status_fa;
        });
        return $project;
    }

    public function create()
    {
        $form = ['action' => route('admin.project.store')];

        $categories = Category::with('children')->where([
            'category_type' => Project::class,
            'parent_id' => null,
        ])->get()->toArray();

        $categories = JEasyUi::jsonFormat($categories);

        return view('project.admin.form', compact('form', 'categories'));
    }

    public function store(Request $request)
    {
        $this->convertDates($request);

        $this->validate($request, $this->validator());

        DB::transaction(function () use ($request) {

            $project = Project::create($this->fields($request));

            Multimedia::createOrUpdate($request, $project->galleries(), 0);

            $project->categories()->attach($request->categories);

            $this->tags($request->tags)->attach($project);

        });

        return ['message' => 'مطلب جدید با موفقیت ثبت شد.'];
    }

    public function show($id)
    {
        $project = Project::with('tags', 'user', 'author')->findOrFail($id);

        return view('project.admin.show', compact('project'));
    }

    public function edit($id)
    {
        $project = Project::with([
            'tags',
            'galleries',
            'categories',
        ])->findOrFail($id);

        $form = [
            'action' => route('admin.project.update', $project['id']),
            'method' => 'put'
        ];

        $categories = Category::with('children')->where([
            'category_type' => Project::class,
            'parent_id' => null,
        ])->get()->toArray();

        $categories = JEasyUi::jsonFormat($categories);

        $category_ids = implode(',', $project->categories->pluck('id')->toArray());

        return view('project.admin.form', compact('project', 'form', 'categories', 'category_ids'));
    }

    public function update(Request $request, $id)
    {
        $this->convertDates($request);

        $this->validate($request, $this->validator());

        DB::transaction(function () use ($request, $id) {

            $project = Project::find($id);

            $project->update($this->fields($request, $project));

            Multimedia::createOrUpdate($request, $project->galleries(), 0);

            $this->tags($request->tags)->sync($project);

            $project->categories()->sync($request->categories);

        });

        return ['message' => 'مطلب جدید با موفقیت ثبت شد.'];
    }

    public function destroy($id)
    {
        $ids = explode(',', $id);

        Project::whereIn('id', $ids)->delete();
    }

    // Methods

    private function validator()
    {
        $rules = [
            'title' => 'required|max:100',
            'image' => 'required',
            'summary' => 'required|max:250',
            'content' => 'required',
            'publish_at' => 'required',
            'categories' => 'required',
        ];


        if (request()->method() === 'PUT')
            $rules['image'] = 'nullable';

        return $rules;
    }

    private function fields(Request $request, $project = null)
    {
        return [
            'user_id' => Auth::id(),
            'title' => $request['title'],
            'summary' => $request['summary'],
            'content' => $request['content'],
            'image' => empty($request['image']) ? $project['image'] : $request['image'],
            'publish_at' => $request['publish_at'],
            'expire_at' => $request['expire_at'],
            'status' => $request['status'],
        ];
    }

    private function convertDates(Request $request)
    {
        if ( ! empty($request->expire_at)) {
            $request->merge(['expire_at' => DateConverter::toGregorian($request['expire_at'])]);
        }

        if ( ! empty($request->publish_at)) {
            $request->merge(['publish_at' => DateConverter::toGregorian($request['publish_at'])]);
        }
    }
}
