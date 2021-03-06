<?php
/*
 * @Description: Index 控制器
 * @Author: uSee
 * @Date: 2020-02-24 12:53:40
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-26 17:00:03
 * @FilePath: \laravel-blog\app\Http\Controllers\Index\Index.php
 */

namespace App\Http\Controllers\Index;

use App\Models\Articles;
use App\Models\Categories;

class Index extends IndexBaseController
{
    /**
     * 主页
     *
     * @return void
     */
    public function index()
    {
        // 文章列表
        $articles = Articles::getNewest(config('blog.rows'));

        // 分类列表
        $categories = Categories::getList();

        return view('index/index', compact('articles', 'categories'));
    }

    /**
     * 关于我们
     *
     * @return void
     */
    public function about()
    {
        return view('index/about');
    }

    /**
     * 联系我们
     *
     * @return void
     */
    public function contact()
    {
        return view('index/contact');
    }
}
