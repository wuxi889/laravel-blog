<?php
/*
 * @Description: 
 * @Author: uSee
 * @Date: 2020-02-25 11:35:06
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-27 09:26:44
 * @FilePath: \laravel-blog\app\Http\Controllers\Index\IndexBaseController.php
 */

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexBaseController extends Controller
{
    /**
     * Request
     *
     * @var [Illuminate\Http\Request]
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-25
     */
    protected $request;

    /**
     * 构造方法
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
