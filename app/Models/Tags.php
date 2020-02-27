<?php
/*
 * @Description: 标签模型
 * @Author: uSee
 * @Date: 2020-02-24 13:28:16
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-27 16:40:24
 * @FilePath: \laravel-blog\app\Models\Tags.php
 */

namespace App\Models;

class Tags extends BaseModel
{
    protected $fillable = ['name'];

    public function articles()
    {
        return $this->hasManyThrough(Articles::class, ArticleTags::class, 'tag_id', 'id', 'id', 'article_id');
    }
}
