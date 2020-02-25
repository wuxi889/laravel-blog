<?php
/*
 * @Description: 
 * @Author: uSee
 * @Date: 2020-02-25 15:03:05
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-25 17:13:18
 * @FilePath: \laravel-blog\database\factories\ArticleTagFactory.php
 */

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ArticleTags;
use Faker\Generator as Faker;

$factory->define(ArticleTags::class, function (Faker $faker) {
    return [
        'article_id' => rand(1, 300),
        'tag_id' => rand(1, 20)
    ];
});
