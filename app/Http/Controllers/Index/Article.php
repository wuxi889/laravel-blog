<?php
/*
 * @Description: Article 控制器
 * @Author: uSee
 * @Date: 2020-02-24 13:32:02
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-28 11:01:29
 * @FilePath: \laravel-blog\app\Http\Controllers\Index\Article.php
 */

namespace App\Http\Controllers\Index;

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
        $comments = array_reverse($comments);

        // 当前ip
        $ip = $this->request->ip();

        // 标题
        $title = $article->title;

        return view('article.item', compact('article', 'comments', 'ip', 'title'));
    }

    public function comment(int $id)
    {
        // 验证内容
        $valid = $this->request->validate([
            'parent_id' => 'required|integer|min:0',
            'comment' => 'required|min:10|max:255',
        ]);
        
        // 还要验证 文章 是否存在
        $article = Articles::find($id);
        if (!$article) {
            return redirect('/');
        }
        
        // 验证父级回复是否存在
        if ($this->request->parent_id > 0) {
            $parent = Comments::where(['status' => 1, 'article_id' => $id, 'id' => $this->request->parent_id])->first();
            if (!$parent) return redirect('/');
        }

        // 保存评论内容
        $comment = new Comments();
        $comment->article_id = $id;
        $comment->parent_id = $this->request->parent_id;
        $comment->ip = $this->request->ip();
        $comment->comment = $this->request->comment;
        $comment->status = 0;
        $comment->save();
        
        if ($comment->save()) {
            return redirect('/article/' . $id)->with('success', '评论成功，请等待管理员审核');
        }
        else {
            return redirect('/article/' . $id)->with('error', '评论失败');
        }
    }
}
