<?php

namespace App\Http\Controllers\ScopeOfWork\Admin;

use Auth;
use App\ScopeOfWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScopeOfWorkController extends Controller
{
    protected $form = [];

    public function index()
    {
        $this->form = ['action' => route('admin.scope_of_work.items'), 'link' => route('admin.scope_of_work.index')];

        return view('scope_of_work.admin.index', ['form' => $this->form]);
    }

    public function items(Request $request)
    {
        $scopeOfWorks = ScopeOfWork::select(['id', 'status', 'title', 'summary', 'created_at', 'updated_at']);

        $scopeOfWorks = $this->getGrid($request)->items($scopeOfWorks);
        $scopeOfWorks['rows'] = $scopeOfWorks['rows']->each(function ($item) {
            $item->status_farsi = $item->status_fa;
        });

        return $scopeOfWorks;
    }

    public function create()
    {
        $this->form = ['action' => route('admin.scope_of_work.store')];

        return view('scope_of_work.admin.form', ['form' => $this->form]);
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->validator());

        ScopeOfWork::create($this->fields($request));

        return ['message' => 'مطلب جدید با موفقیت ثبت شد.'];
    }

    public function show($id)
    {
        $scope = ScopeOfWork::with('author')->findOrFail($id);

        return view('scope_of_work.admin.show', compact('scope'));
    }

    public function edit($id)
    {
        $scope = ScopeOfWork::findOrFail($id);

        $this->form = ['action' => route('admin.scope_of_work.update', $scope['id']), 'method' => 'put'];

        return view('scope_of_work.admin.form', ['form' => $this->form, 'scope' => $scope]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->validator());

        $scopeOfWork = ScopeOfWork::find($id);

        $scopeOfWork->update($this->fields($request, $scopeOfWork));

        return ['message' => 'مطلب جدید با موفقیت ویرایش شد.'];
    }

    public function destroy($id)
    {
        $ids = explode(',', $id);

        ScopeOfWork::whereIn('id', $ids)->delete();
    }

    // Methods

    private function validator()
    {
        $rules = [
            'title' => 'required|max:191',
            'image' => 'required',
            'summary' => 'required|max:400',
            'body' => 'required',
        ];

        if (request()->method() === 'PUT')
            $rules['image'] = 'nullable';

        return $rules;
    }

    private function fields(Request $request, $scopeOfWork = null)
    {
        return [
            'user_id' => Auth::id(),
            'title' => $request['title'],
            'summary' => $request['summary'],
            'body' => $request['body'],
            'image' => empty($request['image']) ? $scopeOfWork['image'] : $request['image'],
            'status' => $request['status'],
        ];
    }
}
