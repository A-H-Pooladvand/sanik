<?php

Route::group(['prefix' => 'projects', 'as' => 'project.', 'namespace' => 'Project\Front'], function () {

    Route::get('/', 'ProjectController@index')->name('index');
    Route::get('{id}', 'ProjectController@show')->name('show');

});