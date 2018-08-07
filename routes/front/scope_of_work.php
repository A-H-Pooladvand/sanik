<?php

Route::group(['prefix' => 'scope-of-work', 'as' => 'scope_of_work.', 'namespace' => 'ScopeOfWork\Front'], function () {

    Route::get('/', 'ScopeOfWorkController@index')->name('index');
    Route::get('{slug}', 'ScopeOfWorkController@show')->name('show');

});