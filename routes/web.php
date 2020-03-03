<?php
/*
 * @Description: 
 * @Author: uSee
 * @Date: 2020-02-24 12:52:42
 * @LastEditors: uSee
 * @LastEditTime: 2020-03-03 13:35:15
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

// TODO:: 路由参数统一正则，可使用 pattern 方法在 RouteServiceProvider 的 boot 方法中定义
// 参考URI：https://learnku.com/docs/laravel/6.x/routing/5135#9f554e

// 前台路由
Route::group(['namespace' => 'Index', 'name' => 'index'], function () {
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
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'name' => 'admin'], function () {
    Route::get('/', function () {
        return redirect('/admin/article');
    });

    // 需要验证登录
    Route::middleware('auth')->group(function () {
        Route::resource('/article', 'Article')->names('article');
        Route::resource('/category', 'Category')->names('category');
        Route::resource('/tag', 'Tag')->names('tag');
        Route::resource('/comment', 'Comment')->names('comment');
        
        // 资源控制器
        Route::get('/resource', 'Resource@index')->name('resource');
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
