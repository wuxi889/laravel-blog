<?php
/*
 * @Description: Article 控制器
 * @Author: uSee
 * @Date: 2020-02-24 13:32:02
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-25 17:14:19
 * @FilePath: \laravel-blog\app\Http\Controllers\Index\Article.php
 */

namespace App\Http\Controllers\Index;

use App\Models\Articles;

class Article extends IndexBaseController
{
    public function index($id)
    {
        $article = Articles::getContent($id);

        // 检查文章是否存在
        if (!$article) return abort(404);

        return view('article.item', compact('article'));
    }
}
