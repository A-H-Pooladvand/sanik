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
            <td>{{ $scope['title'] }}</td>
        </tr>

        <tr>
            <th>تصویر شاخص</th>
            <td>
                <img src="{{ image_url($scope['image'], 15,10) }}" width="150" height="100" alt="#">
            </td>
        </tr>

        <tr>
            <th>خلاصه</th>
            <td>{{ $scope['summary'] }}</td>
        </tr>

        <tr>
            <th>محتوا</th>
            <td>{!! $scope['body'] !!}</td>
        </tr>

        @permission('read-user')
        <tr>
            <th>مولف</th>
            <td>
                <a href="{{ route('admin.user.show', $scope->author->id) }}">{{ $scope->author->fullName() }}</a>
            </td>
        </tr>
        @endpermission

        <tr>
            <th>وضعیت</th>
            <td>{{ $scope['status_fa'] }}</td>
        </tr>

        <tr>
            <th>تاریخ ایجاد</th>
            <td>{{ $scope['created_at'] }}</td>
        </tr>

        <tr>
            <th>تاریخ ویرایش</th>
            <td>{{ $scope['updated_at'] }}</td>
        </tr>

        </tbody>
    </table>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            {{ Breadcrumbs::render('scope-of-work-show', $scope) }}
        </div>

        <div class="text-right">
            <a href="{{ route('admin.scope_of_work.edit', $scope->id) }}" class="btn btn-info">ویرایش</a>
        </div>

    </div>

@stop