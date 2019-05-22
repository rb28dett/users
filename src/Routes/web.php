<?php

Route::group([
        'middleware' => ['web', 'rb28dett.base', 'rb28dett.auth'],
        'prefix'     => config('rb28dett.settings.base_url'),
        'namespace'  => 'RB28DETT\Users\Controllers',
        'as'         => 'rb28dett::',
    ], function () {
        Route::get('users/{user}/delete', 'UserController@confirmDelete')->name('users.destroy.confirm');
        Route::get('users/{user}/roles/manage', 'UserController@manageRoles')->name('users.roles.manage');
        Route::post('users/{user}/roles/manage', 'UserController@updateRoles');
        Route::resource('users', 'UserController');
    });
