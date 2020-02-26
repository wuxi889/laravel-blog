<?php
/*
 * @Description: Article 控制器
 * @Author: uSee
 * @Date: 2020-02-24 13:32:02
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-26 18:34:11
 * @FilePath: \laravel-blog\app\Http\Controllers\Index\Article.php
 */

namespace App\Http\Controllers\Index;

use App\Http\Requests\CommentSubmitRequest;
use App\Models\Articles;
use App\Models\Comments;

class Article extends IndexBaseController
{
    public function index(int $id)
    {
        $article = Articles::getContent($id);

        // 检查文章是否存在
        if (!$article) return abort(404);

        // 获取评论
        $comments_temp = Comments::getList($id)->toArray();

        // 处理评论
        $comments = [];
        foreach ($comments_temp as $v) {
            // 直接评论文章
            if ($v['parent_id'] == 0) {
                $comments[$v['id']] = $v;
                continue;
            }

            // 评论已审核评论
            if (isset($comments[$v['parent_id']]))$comments[$v['parent_id']]['children'][$v['id']] = $v;
        }

        // 当前ip
        $ip = $this->request->ip();

        return view('article.item', compact('article', 'comments', 'ip'));
    }

    public function comment(CommentSubmitRequest $request, int $id)
    {
        // 还要验证 文章 是否存在

        // 保存评论内容
        $comment = new Comments();
        $comment->article_id = $id;
        $comment->parent_id = $request->parent_id;
        $comment->ip = $request->ip;
        $comment->comment = $request->comment;
        $comment->status = 0;
        $comment->save();
        die('fdfsd');
    }
}
