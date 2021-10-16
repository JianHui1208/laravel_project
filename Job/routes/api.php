<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Projects
    Route::apiResource('projects', 'ProjectsApiController');
});

Route::get('/admin/users', 'API\UsersController@admin');
Route::get('/student/users', 'API\UsersController@student');
Route::get('/company/users', 'API\UsersController@company');
Route::get('/lecturer/users', 'API\UsersController@lecturer');

