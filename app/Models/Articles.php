<?php
/*
 * @Description: 文章模型
 * @Author: uSee
 * @Date: 2020-02-24 13:26:52
 * @LastEditors: uSee
 * @LastEditTime: 2020-03-03 14:28:28
 * @FilePath: \laravel-blog\app\Models\Articles.php
 */

namespace App\Models;

class Articles extends BaseModel
{
    protected $fillable = ['author', 'original', 'title', 'description'];
    protected $guarded = ['id'];

    public function content()
    {
        return $this->hasOne(ArticleContents::class, 'article_id', 'id');
    }

    public function category()
    {
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }

    public function tags()
    {
        return $this->hasManyThrough(Tags::class, ArticleTags::class, 'article_id', 'id', 'id', 'tag_id');
    }

    /**
     * 获取最新文章
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-26
     * @param integer $rows
     * @return static
     */
    public static function getNewest(int $rows = 10)
    {
        return static::orderBy('created_at', 'DESC')->limit($rows)->get();
    }

    /**
     * 获取文章内容
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-25
     * @param integer $id
     * @return void
     */
    public static function getContent(int $id)
    {
        return static::with(['content', 'category', 'tags'])->where('id', $id)->first();
    }

    /**
     * 获取分类所有文章
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-25
     * @param integer $id
     * @return void
     */
    public static function getListByCategory(int $id)
    {
        return static::where('category_id', $id)->orderBy('created_at', 'DESC')->paginate(config('blog.rows'));
    }

    /**
     * 获取标签所有文章
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-25
     * @param integer $id [标签id]
     * @return void
     */
    public static function getListByTag(int $id)
    {
        return ArticleTags::leftjoin('articles AS a', 'a.id', '=', 'article_id')
            ->where('tag_id', $id)
            ->orderBy('a.created_at', 'DESC')
            ->paginate(config('blog.rows'));
    }
}
