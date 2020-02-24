<?php
/*
 * @Description: 文章模型
 * @Author: uSee
 * @Date: 2020-02-24 13:26:52
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-24 17:09:57
 * @FilePath: \laravel-blog\app\Model\Articles.php
 */

namespace App\Model;

class Articles extends BaseModel
{
    protected $table = 'articles';

    public function content()
    {
        return $this->hasOne('App\Model\ArticleContent', 'article_id', 'id');
    }
}
