<?php
/*
 * @Description: Index 模块基础控制器
 * @Author: uSee
 * @Date: 2020-02-24 12:59:50
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-24 13:31:44
 * @FilePath: \laravel-blog\app\Http\Controllers\Controller.php
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
