<?php

Route::group(['prefix' => 'projects', 'as' => 'project.', 'namespace' => 'Project\Admin'], function () {

    Route::get('/', 'ProjectController@index')->name('index')->middleware('permission:read-project');
    Route::post('items', 'ProjectController@items')->name('items')->middleware('permission:read-project');
    Route::get('create', 'ProjectController@create')->name('create')->middleware('permission:create-project');
    Route::post('/', 'ProjectController@store')->name('store')->middleware('permission:create-project');
    Route::get('{id}', 'ProjectController@show')->name('show')->middleware('permission:read-project');
    Route::get('edit/{id}', 'ProjectController@edit')->name('edit')->middleware('permission:edit-project');
    Route::put('{id}', 'ProjectController@update')->name('update')->middleware('permission:edit-project');
    Route::delete('{id}', 'ProjectController@destroy')->name('destroy')->middleware('permission:delete-project');

    Route::group(['prefix' => 'categories/index', 'as' => 'category.', 'namespace' => 'Category'], function () {

        Route::get('/', 'CategoryController@index')->name('index')->middleware('permission:create-project|edit-project');
        Route::post('items', 'CategoryController@items')->name('items')->middleware('permission:create-project|edit-project');
        Route::get('create', 'CategoryController@create')->name('create')->middleware('permission:create-project|edit-project');
        Route::post('/', 'CategoryController@store')->name('store')->middleware('permission:create-project|edit-project');
        Route::get('{id}', 'CategoryController@show')->name('show')->middleware('permission:create-project|edit-project');
        Route::get('edit/{id}', 'CategoryController@edit')->name('edit')->middleware('permission:create-project|edit-project');
        Route::put('{id}', 'CategoryController@update')->name('update')->middleware('permission:create-project|edit-project');
        Route::delete('{id}', 'CategoryController@destroy')->name('destroy')->middleware('permission:create-project|edit-project');

    });

});