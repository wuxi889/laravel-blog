<?php
/*
 * @Description: Index 控制器
 * @Author: uSee
 * @Date: 2020-02-24 12:53:40
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-24 17:49:32
 * @FilePath: \laravel-blog\app\Http\Controllers\Index\Index.php
 */

namespace App\Http\Controllers\Index;

use App\Models\Articles;

class Index extends IndexBaseController
{
    /**
     * 主页
     *
     * @return void
     */
    public function index()
    {
        $a = [
            'author' => 'test',
            'original' => 1,
            'title' => 'fdns nfod nosncocso hcjrucma  d',
            'description' => 'fjdn iwhni 8dj b9snso j oso ojoajofus98fsn nlaodifn sdfspoias no afdsfsd f',
        ];
        $m = new Articles();
        $m->create($a);
        return view('index/index');
    }

    /**
     * 关于我们
     *
     * @return void
     */
    public function about()
    {
    }

    /**
     * 联系我们
     *
     * @return void
     */
    public function contact()
    {
    }
}
