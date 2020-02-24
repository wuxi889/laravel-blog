<?php
/*
 * @Description: 
 * @Author: uSee
 * @Date: 2020-02-24 12:52:42
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-24 17:42:51
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

Route::group(['name' => 'index', 'namespace' => 'Index'], function () {
    Route::get('/', 'Index@index');
    Route::get('/about', 'Index@about');
    Route::get('/contact', 'Index@contact');
});
