<?php
/*
 * @Description: 评论模型
 * @Author: uSee
 * @Date: 2020-02-24 13:30:24
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-27 10:40:00
 * @FilePath: \laravel-blog\app\Models\Comments.php
 */

namespace App\Models;

class Comments extends BaseModel
{
    public static function getList(int $id)
    {
        return static::where(['article_id' => $id, 'status' => 1])->orderBy('parent_id', 'ASC')->orderBy('id', 'ASC')->get();
    }
}
