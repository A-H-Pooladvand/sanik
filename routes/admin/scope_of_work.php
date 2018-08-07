<?php

Route::group(['prefix' => 'scope-of-works', 'as' => 'scope_of_work.', 'namespace' => 'ScopeOfWork\Admin'], function () {

    Route::get('/', 'ScopeOfWorkController@index')->name('index')->middleware('permission:read-scope-of-work');
    Route::post('items', 'ScopeOfWorkController@items')->name('items')->middleware('permission:read-scope-of-work');
    Route::get('create', 'ScopeOfWorkController@create')->name('create')->middleware('permission:create-scope-of-work');
    Route::post('/', 'ScopeOfWorkController@store')->name('store')->middleware('permission:create-scope-of-work');
    Route::get('{id}', 'ScopeOfWorkController@show')->name('show')->middleware('permission:read-scope-of-work');
    Route::get('edit/{id}', 'ScopeOfWorkController@edit')->name('edit')->middleware('permission:edit-scope-of-work');
    Route::put('{id}', 'ScopeOfWorkController@update')->name('update')->middleware('permission:edit-scope-of-work');
    Route::delete('{id}', 'ScopeOfWorkController@destroy')->name('destroy')->middleware('permission:delete-scope-of-work');

});