@extends('_layouts.admin.index')


@section('content')

    <table class="table table-striped table-show">
        <thead>
        <tr>
            <th>عنوان</th>
            <th>مشخصات</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <th>عنوان</th>
            <td>{{ $project['title'] }}</td>
        </tr>

        <tr>
            <th>تصویر شاخص</th>
            <td>
                <img src="{{ image_url($project['image'], 15,10) }}" width="150" height="100" alt="#">
            </td>
        </tr>

        <tr>
            <th>خلاصه</th>
            <td>{{ $project['summary'] }}</td>
        </tr>

        <tr>
            <th>محتوا</th>
            <td>{!! $project['content'] !!}</td>
        </tr>

        @permission('read-user')
        <tr>
            <th>مولف</th>
            <td>
                <a href="{{ route('admin.user.show', $project->author->id) }}">{{ $project->author->fullName() }}</a>
            </td>
        </tr>
        @endpermission

        <tr>
            <th>وضعیت</th>
            <td>{{ $project['status_fa'] }}</td>
        </tr>
        @if(!empty($project['tags']))

            <tr>
                <th>کلمات کلیدی</th>
                <td>
                    @foreach($project['tags'] as $item)
                        <span class="label label-info m-l-1-5">
                            <i class="fa fa-hashtag fa-fw"></i>
                            {{ $item['title'] }}
                        </span>
                    @endforeach
                </td>
            </tr>

        @endif

        @if(!empty($project->categories))
            <tr>
                <th>دسته بندی</th>
                <td>
                    @foreach($project->categories as $category)
                        <span class="badge">{{ $category->title }}</span>
                    @endforeach
                </td>
            </tr>
        @endif

        <tr>
            <th>تاریخ انتشار</th>
            <td>{{ $project['publish_at_fa'] }}</td>
        </tr>

        <tr>
            <th>تاریخ انقضا</th>
            <td>{{ $project['publish_at_fa'] }}</td>
        </tr>

        <tr>
            <th>تاریخ ایجاد</th>
            <td>{{ $project['created_at'] }}</td>
        </tr>

        <tr>
            <th>تاریخ ویرایش</th>
            <td>{{ $project['updated_at'] }}</td>
        </tr>

        </tbody>
    </table>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            {{ Breadcrumbs::render('project-show', $project) }}
        </div>

        <div class="text-right">
            <a href="{{ route('admin.project.edit', $project->id) }}" class="btn btn-info">ویرایش</a>
        </div>

    </div>

@stop