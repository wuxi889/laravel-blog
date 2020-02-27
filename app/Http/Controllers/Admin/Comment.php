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

    public function update(CommentValidRequest $request, int $id)
    {
        $comment = $this->model->find($id);
        $comment->status = $request->status;

        return $comment->save()
            ? redirect('/comment')->with('success', '审核评论成功.') 
            :redirect('/comment')->with('error', '审核评论失败');
    }
}
