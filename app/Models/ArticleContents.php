<?php
/*
 * @Description: 文章内容模型
 * @Author: uSee
 * @Date: 2020-02-24 14:11:13
 * @LastEditors: uSee
 * @LastEditTime: 2020-03-03 14:25:32
 * @FilePath: \laravel-blog\app\Models\ArticleContents.php
 */

namespace App\Models;

use App\Services\MarkdownService;

class ArticleContents extends BaseModel
{
    protected $fillable = ['article_id', 'content'];

    /**
     * 关联文章方法
     *
     * @Description:
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-24
     * @return void
     */
    public function article()
    {
        return $this->belongsTo(Articles::class, 'article_id', 'id');
    }

    public function setContentAttribute($value)
    {
        // $markdown = new MarkdownService();
        // $this->attributes['content'] = $markdown->toHTML($value);
    }
}
