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
Route::post('/subscribe', function (){
    $email=request('email');

    Newsletter::subscribe($email);
Session::flash('subscribed', 'Successfully subscribed');
    return redirect()->back();
});
Route::get('/',[
    'uses'=>'FrontEndController@index',
    'as'=>'index'
]);
Route::group(['prefix'=>'post'], function (){
    Route::get('/{slug}', [
        'uses'=>'FrontEndController@single',
        'as'=>'post.single'
    ]);

});
Route::get('/category/{id}',[
    'uses'=>'FrontEndController@category',
    'as'=>'category.single'
]);
Route::get('/tag/{id}',[
    'uses'=>'FrontEndController@tag',
    'as'=>'tag.single'
]);


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin', 'middleware'=>'auth'],function (){
    Route::get('/post/create',[
        'uses'=>'PostsController@create',
        'as'=>'post.create'
    ]);

    Route::post('/post/store',[
        'uses'=>'PostsController@store',
        'as'=>'post.store'
    ]);


    Route::get('/category/create',[
        'uses'=>'CategoriesController@create',
        'as'=>'category.create'
    ]);
    Route::post('/category/store',[
        'uses'=>'CategoriesController@store',
        'as'=>'category.store'
    ]);
    Route::get('/categories',[
        'uses'=>'CategoriesController@index',
        'as'=>'categories'
    ]);
    Route::get('/category/edit/{id}', [
        'uses'=>'CategoriesController@edit',
        'as'=>'category.edit'
    ]);
    Route::get('/post',[
        'uses'=>'PostsController@index',
            'as'=>'post'
    ]);
});


Route::get('/category/delete/{id}', [
    'uses'=>'CategoriesController@destroy',
    'as'=>'category.delete'
]);
Route::post('/category/update/{id}',[
    'uses'=>'CategoriesController@update',
    'as'=>'category.update'
]);
Route::get('/post/delete/{id}',[
    'uses'=>'PostsController@destroy',
    'as'=>'post.delete'
]);
Route::get('/posts/trashed',[
    'uses'=>'PostsController@trashed',
    'as'=>'posts.trash'
]);
Route::get('/posts/kill/{id}',[
    'uses'=>'PostsController@kill',
    'as'=>'posts.kill'
]);
Route::get('/post/restore/{id}',[
    'uses'=>'PostsController@restore',
    'as'=>'posts.restore'
]);
Route::get('/post/edit/{id}',[
    'uses'=>'PostsController@edit',
    'as'=>'posts.edit'
]);
Route::post('/post/update/{id}',[
    'uses'=>'PostsController@update',
    'as'=>'post.update'
]);

Route::get('/tags', [
    'uses'=>'TagsController@index',
    'as'=>'tags'
]);
Route::get('/tags/edit/{id}', [
    'uses'=>'TagsController@edit',
    'as'=>'tags.edit'
]);

Route::get('/tags/delete/{id}', [
    'uses'=>'TagsController@destroy',
    'as'=>'tags.delete'
]);

Route::post('/tags/update/{id}',[
    'uses'=>'TagsController@update',
    'as'=>'tags.update'
]);
Route::post('/tags/store', [
    'uses'=>'TagsController@store',
    'as'=>'tags.store'
]);
Route::get('/tags/create', [
    'uses'=>'TagsController@create',
    'as'=>'tag.create'
]);
Route::get('/users',[
    'uses'=>'UsersController@index',
    'as'=>'users'

]);
Route::get('/users/create',[
    'uses'=>'UsersController@create',
    'as'=>'users.create'

]);
Route::post('/users/store',[
    'uses'=>'UsersController@store',
    'as'=>'users.store'

]);
Route::get('/users/admin/{id}',[
    'uses'=>'UsersController@admin',
    'as'=>'users.admin'
]);
Route::get('/users/notAdmin/{id}',[
    'uses'=>'UsersController@notAdmin',
    'as'=>'users.notAdmin'
]);
Route::get('/users/profile',[
    'uses'=>'ProfilesController@index',
    'as'=>'user.profile'
]);
Route::post('/users/profile/update',[
    'uses'=>'ProfilesController@update',
    'as'=>'user.profile.update'
]);
Route::get('/users/delete/{id}',[
    'uses'=>'ProfilesController@destroy',
    'as'=>'user.delete'
]);
Route::get('/settings',[
    'uses'=>'SettingsController@index',
    'as'=>'settings'

]);
Route::post('/settings/update',[
    'uses'=>'SettingsController@update',
    'as'=>'settings.update'

]);

Auth::routes();
Route::group(['prefix'=>'admin'], function (){
    Route::get('/home', 'HomeController@index')->name('home');
});

