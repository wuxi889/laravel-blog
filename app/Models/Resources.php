<?php
/*
 * @Description: 资源模型
 * @Author: uSee
 * @Date: 2020-02-24 13:29:40
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-28 10:03:42
 * @FilePath: \laravel-blog\app\Models\Resources.php
 */

namespace App\Models;

class Resources extends BaseModel
{
    protected $fillable = [
        'name',
        'hash',
        'mime',
        'path'
    ];
}
