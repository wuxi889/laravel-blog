<?php
/*
 * @Description: 分类模型
 * @Author: uSee
 * @Date: 2020-02-24 13:28:09
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-25 15:20:25
 * @FilePath: \laravel-blog\app\Models\Categories.php
 */

namespace App\Models;

class Categories extends BaseModel
{    
    /**
     * 分类关联的文章
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-25
     * @return void
     */
    public function articles()
    {
        return $this->hasMany('App\Models\Articles', 'category_id', 'id');
    }

    /**
     * 分类列表
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-25
     * @return void
     */
    public static function getList()
    {
        return static::withCount('articles')->get();
    }
}
