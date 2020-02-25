<?php
/*
 * @Description: Category 控制器
 * @Author: uSee
 * @Date: 2020-02-24 13:32:39
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-25 15:41:01
 * @FilePath: \laravel-blog\app\Http\Controllers\Index\Category.php
 */

namespace App\Http\Controllers\Index;

use App\Models\Articles;
use App\Models\Categories;

class Category extends IndexBaseController
{
    public function index($id)
    {
        $category = Categories::exists($id);

        // 检查分类是否存在
        if (!$category) return abort(404);

        $articles = Articles::getListByCategory($id);

        return view('category.list', compact('category', 'articles'));
    }
}
