<?php

Route::get('/', function () { 
    return view('welcome'); 
});

Route::get('/login', function () { 
    return view('login'); 
});

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Projects
    Route::delete('projects/destroy', 'ProjectsController@massDestroy')->name('projects.massDestroy');
    Route::resource('projects', 'ProjectsController');
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

Auth::routes();

Route::get('/Register/Company', [
    'uses'=>'Admin\RegisterController@createCompany',
    'as'=>'users.register.company'
]);

Route::post('/Register/Company/Store', [
    'uses'=>'Admin\RegisterController@storeCompany',
    'as'=>'users.store.company'
]);

Route::get('/Register/Students', [
    'uses'=>'Admin\RegisterController@createStudents',
    'as'=>'users.register.students'
]);

Route::post('/Register/Students/Store', [
    'uses'=>'Admin\RegisterController@storeStudents',
    'as'=>'users.store.students'
]);

Route::get('/CreateJob',[
    'uses'=>'Company\JobController@create',
    'as'=>'company.create'
]);

Route::post('/CreateJob/store',[
    'uses'=>'Company\JobController@store',
    'as'=>'company.store'
]);

Route::post('/searchJob',[
    'uses'=>'company\JobController@search',
    'as'=>'home.search'
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
