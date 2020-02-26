<?php
/*
 * @Description: 标签模型
 * @Author: uSee
 * @Date: 2020-02-24 13:28:16
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-26 11:39:19
 * @FilePath: \laravel-blog\app\Models\Tags.php
 */

namespace App\Models;

class Tags extends BaseModel
{
    protected $fillable = ['name'];

    public function articles()
    {
        return $this->hasManyThrough('App\Models\Articles', 'App\Models\ArticleTags', 'tag_id', 'id', 'id', 'article_id');
    }
}
