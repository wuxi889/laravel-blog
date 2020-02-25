<?php
/*
 * @Description: 文章标签关联表
 * @Author: uSee
 * @Date: 2020-02-25 12:27:32
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-25 15:24:23
 * @FilePath: \laravel-blog\app\Models\ArticleTags.php
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleTags extends Model
{
    public function getUpdatedAtColumn()
    {
        return null;
    }

    public function getCreatedAtColumn()
    {
        return null;
    }
}
