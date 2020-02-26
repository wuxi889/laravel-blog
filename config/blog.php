<?php
/*
 * @Description: 博客配置文件
 * @Author: uSee
 * @Date: 2020-02-25 11:22:04
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-26 15:50:25
 * @FilePath: \laravel-blog\config\blog.php
 */

return [
    'title' => 'Laravel Blog',
    'keywords' => 'laravel,blog,博客',
    'description' => '这是一个基于 Laravel6.0 开发的练手博客...',
    'rows' => 10,
    'uploads' => [
        'storage' => 'public',
        'webpath' => '/storage',
    ],
];
