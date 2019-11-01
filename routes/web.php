<?php

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

//Auth::routes();
Auth::routes(['verify' => true]);

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
    Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register');
    Route::POST('/logout', 'Auth\AdminController@logout')->name('admin.logout');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::resource('categories','CategoriesController');
    Route::resource('posts', 'PostsController');
    Route::resource('tags','TagsController');
    Route::resource('user', 'UserAdminController');
    //Route::get('user/', 'ResultsController@UserSearch')->name('admin-user.result');
    Route::get('banned-users','UserAdminController@banned')->name('banned-users.index');
    Route::PUT('restore-users/{user}','UserAdminController@restore')->name('restore-users');
    Route::get('trashed-posts', 'PostsController@trashed')->name('trashed-posts.index');
    Route::PUT('restore-post/{post}', 'PostsController@restore')->name('restore-posts');
    Route::get('trashed-profiles', 'PostsController@trashed')->name('trashed-profiles.index');
    Route::PUT('restore-profile/{profile}', 'PostsController@restore')->name('restore-profiles');
    Route::get('results/{post}', 'ResultsController@show')->name('posts.show');
    Route::get('results/', 'ResultsController@search')->name('admin-posts.result');
    Route::get('results/{post}/comments', 'CommentsController@index');
});


Route::get('/home', 'LandingPageController@index')->middleware('verified');
Route::get('/', 'AuthLPController@index')->name('home.show');

Route::get('/verified', 'HomeController@verify');


Route::middleware(['auth'])->group(function(){
    //user profile
    Route::resource('user/profile', 'UserController');
    Route::get('user/profile/{profile}', 'ProfileController@show')->name('profile.show');
});




Route::get('results', 'ResultsController@index')->name('posts.result');
Route::get('results/{post}', 'ResultsController@show')->name('posts.show');

Route::get('results/{post}/comments', 'CommentController@index');
Route::get('comments/{comment}/replies', 'CommentController@show');
//show saved posts
Route::POST('comments/{post}', 'CommentController@store')->name('comment.store'); 
//Route::get('/uploads/{image}', 'CommentController@imageShow');



Route::get('check/link', 'PromptController@index')->name('prompt.show');


Route::POST('save/{id}', 'FavouriteController@savePost')->name('posts.save');
Route::POST('unsave/{id}', 'FavouriteController@unSavePost');


Route::get('/login/facebook', 'SocialAuthFacebookController@redirect');
Route::get('/login/facebook/callback', 'SocialAuthFacebookController@callback');

Route::get('/login/google', 'SocialAuthGoogleController@redirect');
Route::get('/login/google/callback', 'SocialAuthGoogleController@callback');



