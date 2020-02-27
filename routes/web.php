<?php
/*
 * @Description: 
 * @Author: uSee
 * @Date: 2020-02-24 12:52:42
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-27 17:03:48
 * @FilePath: \laravel-blog\routes\web.php
 */

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

// 前台路由
Route::group(['domain' => env('APP_URL'), 'namespace' => 'Index', 'name' => 'index'], function () {
    Route::get('/', 'Index@index');
    Route::get('/about', 'Index@about');
    Route::get('/contact', 'Index@contact');

    // 文章
    Route::get('/article/{id}', 'Article@index')->where('id', '[1-9][0-9]*')->name('article.content');

    // 提交评论
    Route::post('/article/{id}', 'Article@comment')->where('id', '[1-9][0-9]*');

    // 分类
    Route::get('/category/{id}', 'Category@index')->where('id', '[1-9][0-9]*')->name('category.list');
    
    // 标签
    Route::get('/tag/{id}', 'Tag@index')->where('id', '[1-9][0-9]*')->name('tag.list');
});

// 后台路由
Route::group(['domain' => env('APP_ADMIN_URL'), 'namespace' => 'Admin', 'name' => 'admin'], function () {
    Route::get('/', function () {
        return redirect('/article');
    });

    // 需要验证登录
    Route::middleware('auth')->group(function () {
        Route::resource('/article', 'Article');
        Route::resource('/category', 'Category');
        Route::resource('/tag', 'Tag');
        Route::resource('/comment', 'Comment');
        Route::resource('/resource', 'Resource');
        
        // 资源控制器
        Route::get('/resource', 'Resource@index');
        Route::post('/resource/file', 'Resource@uploadFile');
        Route::delete('/resource/file', 'Resource@deleteFile');
        Route::post('/resource/folder', 'Resource@createFolder');
        Route::delete('/resource/folder', 'Resource@deleteFolder');
    });

    // 登录登出操作
    Route::get('/login', 'Auth@showLogin')->name('login');
    Route::post('/login', 'Auth@login');
    Route::get('/logout', 'Auth@logout')->name('logout');
});
