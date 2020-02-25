<?php
/*
 * @Description: 
 * @Author: uSee
 * @Date: 2020-02-24 12:52:42
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-25 18:08:31
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
Route::group(['domain' => env('APP_URL'), 'namespace' => 'Index'], function () {
    Route::get('/', 'Index@index');
    Route::get('/about', 'Index@about');
    Route::get('/contact', 'Index@contact');

    // 文章
    Route::get('/article/{id}', 'Article@index')->where('id', '[1-9][0-9]*')->name('article.content');

    // 分类
    Route::get('/category/{id}', 'Category@index')->where('id', '[1-9][0-9]*')->name('category.index');
    
    // 标签
    Route::get('/tag/{id}', 'Tag@index')->where('id', '[1-9][0-9]*')->name('tag.index');
});

// 后台路由
Route::group(['domain' => env('APP_ADMIN_URL'), 'namespace' => 'Admin'], function () {
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
    });

    // 登录登出操作
    Route::get('/login', 'Auth@showLogin')->name('login');
    Route::post('/login', 'Auth@login');
    Route::get('/logout', 'Auth@logout')->name('logout');
});
