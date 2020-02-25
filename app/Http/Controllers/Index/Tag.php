<?php
/*
 * @Description: Tag 控制器
 * @Author: uSee
 * @Date: 2020-02-24 13:32:52
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-25 17:20:18
 * @FilePath: \laravel-blog\app\Http\Controllers\Index\Tag.php
 */

namespace App\Http\Controllers\Index;

use App\Models\Articles;
use App\Models\Tags;

class Tag extends IndexBaseController
{
    public function index($id)
    {
        $tag = Tags::exists($id);

        // 检查标签是否存在
        if (!$tag) return abort(404);

        $articles = Articles::getListByTag($id);
        return view('tag.list', compact('tag', 'articles'));
    }
}
