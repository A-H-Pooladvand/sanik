@extends('_layouts.admin.index')

@section('content')

    @script(datepicker/datepicker.js)
    @style(datepicker/datepicker.css)

    <form action="{{ $form['action'] }}" method="post" id="form">
        {{ method_field($form['method'] ?? 'POST') }}

        <div class="row">

            <div class="col-sm-8">

                <div class="form-group">
                    <label for="input_title" class="control-label">عنوان</label>
                    <input id="input_title" name="title" type="text" class="form-control" value="{{ $scope->title ?? '' }}">
                </div>


                <div class="form-group">
                    <label for="input_summary" class="control-label">خلاصه مطلب</label>
                    <textarea name="summary" id="input_summary" cols="30" rows="4" class="form-control">{{ $scope->summary ?? '' }}</textarea>
                </div>

                <div class="form-group">
                    @script(tinymce/tinymce.js)
                    <label for="input_body" class="control-label">محتوا</label>
                    <textarea name="body" id="input_body" class="tinymce">{{ $scope->body ?? '' }}</textarea>
                </div>

            </div>

            <div class="col-sm-4">

                <div class="form-group">
                    <label for="image" class="control-label">تصویر شاخص</label>
                    <div class="input-group">
                <span class="input-group-btn">
                <a id="file-manager" data-input="image" data-preview="image-preview" class="btn btn-primary">
                <i class="fa fa-picture-o"></i>
                <span>انتخاب</span>
                </a>
                </span>
                        <input id="image" readonly class="form-control" type="text" name="image">
                    </div>
                </div>

                <div class="form-group">
                    <img id="image-preview" class="thumbnail {{ !empty($scope->image) ? '' : 'hidden' }}" width="100%" src="{{ image_url($scope->image ?? '', 37,23,true) }}">
                </div>

                <div class="form-group">
                    <label for="input_status" class="control-label">وضعیت</label>
                    <br>
                    @component('_components.bootstrap-select--single')

                        @slot('name') status @endslot
                        @slot('search') false @endslot

                        @slot('options')
                            <option {{ !empty($scope->status) && $scope->status === 'publish' ? 'selected' : '' }} value="publish">انتشار</option>
                            <option {{ !empty($scope->status) && $scope->status === 'draft' ? 'selected' : '' }} value="draft">پیشنویس</option>
                        @endslot

                    @endcomponent
                </div>


            </div>

        </div>

    </form>

    @push('scripts')
        <script>

            $('#file-manager').filemanager('image');

            $(function () {
                $('#image-preview').change(function () {
                    $(this).removeClass('hidden');
                });
            });

        </script>
    @endpush

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            @if(!empty($scope))
                {{ Breadcrumbs::render('scope-of-work-edit', $scope) }}
            @else
                {{ Breadcrumbs::render('scope-of-work-create') }}
            @endif
        </div>

        <div class="text-right">
            <button type="button" class="btn btn-info btn-ajax">ذخیره</button>
        </div>

    </div>

@stop