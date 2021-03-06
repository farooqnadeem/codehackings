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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post/{id}',['as'=>'home.post','uses'=>'AdminPostsController@post']);

Route::get('/admin',function()
{
    return view('admin.index');
});
Route::group(['middleware'=>'admin'],function ()
    {
        Route::resource('admin/users','AdminUsersController');
        Route::resource('admin/posts','AdminPostsController');
        Route::resource('admin/categories','AdminCategoriesController');
        Route::resource('admin/media','AdminMediasController');
        Route::get('admin/media/upload',['as'=>'admin.media.upload','uses'=>'AdminMediasController@store']);
        Route::resource('admin/comments','PostCommentsController');
        Route::resource('admin/comments/show','PostCommentsController');
        Route::resource('admin/comments/replies','CommentRepliesController');
    });

Route::group(['middleware'=>'auth'],function (){

    Route::Post('comment/reply','CommentRepliesController@createReply');

        });
//Route::resource('info','AjaxCallController');
//Route::post('changeStatus', array('as' => 'changeStatus', 'uses' => 'AjaxCallController@changeStatus'));




