<?php
/*
 * @Description: Index 控制器
 * @Author: uSee
 * @Date: 2020-02-24 12:53:40
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-24 17:49:32
 * @FilePath: \laravel-blog\app\Http\Controllers\Index\Index.php
 */

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;

class Index extends Controller
{
    /**
     * 主页
     *
     * @return void
     */
    public function index()
    {
        return view('index/index');
    }

    /**
     * 关于我们
     *
     * @return void
     */
    public function about()
    {
    }

    /**
     * 联系我们
     *
     * @return void
     */
    public function contact()
    {
    }
}
