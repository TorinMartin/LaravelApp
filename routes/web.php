<?php

use Illuminate\Support\Facades\Input;
use YourSPACE\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::post('/posts', 'PostsController@store');

Route::post('/changetheme', 'themeController@change');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/controlpanel', 'HomeController@controlPanel')->name('controlpanel');

Route::get('/posts', 'PostsController@all');
Route::get('/posts/create', 'PostsController@create');

Route::get('/user/{user}', 'UserController@profile');
Route::get('/editprofile', 'UserController@editProfile');
Route::post('/editprofile', 'UserController@profileStore');

Route::group(['middleware' => 'postmoderator'], function () {
    Route::get('moderator', 'modController@modDashboard');
    Route::get('moderator/edit/{post}', 'modController@edit');
    Route::get('moderator/delete/{post}', 'modController@delete');
    Route::post('/moderator/edit/{post}', 'PostsController@adminStore');
});

Route::group(['middleware' => 'thememanager'], function () {
    Route::get('themes', 'themeController@themeDashboard');
    Route::get('themes/create', 'themeController@create');
    Route::get('themes/delete/{theme}', 'themeController@delete');
    Route::get('themes/edit/{theme}', 'themeController@edit');
    Route::post('themes/edit/{theme}', 'themeController@update');
    Route::post('themes/create', 'themeController@store');
});

Route::group(['middleware' => 'admin'], function () {
    Route::any('admin/search',function(){

        $q = Input::get ( 'q' );
        $users = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
        if(count($users) > 0) {
            return View::make('admin.manageusers')->with('users', $users);
        }
        else{
            Session()->flash('message', 'No Users Found');
            Session()->flash('alert-class', 'alert-danger');
            return View::make('admin.manageusers')->with('users', $users);
        }

    });
    Route::get('admin', 'adminController@adminDashboard');
    Route::get('admin/manageusers', 'adminController@manageusers');
    Route::get('admin/edituser/{user}', 'adminController@edituser');
    Route::get('admin/deleteuser/{user}', 'adminController@deleteuser');
    Route::post('/admin/edituser/{user}', 'UserController@adminStore');

});



/*Route::get('/admin', ['middleware' => 'admin', function(){
    Route::get('admin', 'adminController@adminDashboard');
}]);*/
