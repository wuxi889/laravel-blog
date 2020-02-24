<?php
/*
 * @Description: 模型基本控制器
 * @Author: uSee
 * @Date: 2020-02-24 13:26:57
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-24 17:14:02
 * @FilePath: \laravel-blog\app\Model\BaseModel.php
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Traits\Curd;

class BaseModel extends Model
{
    use Curd, SoftDeletes;

    /**
     * 构造方法
     *
     * @Description:
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-24
     */
    public function __construct()
    {
    }
}
