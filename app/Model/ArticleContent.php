<?php
/*
 * @Description: 文章内容模型
 * @Author: uSee
 * @Date: 2020-02-24 14:11:13
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-24 14:12:54
 * @FilePath: \laravel-blog\app\Model\ArticleContent.php
 */

namespace App\Model;

class ArticleContent extends BaseModel
{
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
        return $this->belongsTo('App\Model\Articles', 'article_id', 'id');
    }
}
