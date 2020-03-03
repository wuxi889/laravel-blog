<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CommentValidRequest;
use App\Models\Comments;

class Comment extends AdminBaseController
{
    public function init()
    {
        $this->model = new Comments();
    }

    /**
     * 更新
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-27
     * @param CommentValidRequest $request
     * @param integer $id
     * @return void
     */
    public function update(CommentValidRequest $request, int $id)
    {
        $comment = $this->model->find($id);
        $comment->status = $request->status;

        return $comment->save()
            ? redirect()->route('comment.index')->with('success', '审核评论成功.') 
            :redirect()->route('comment.index')->with('error', '审核评论失败');
    }
}
