<?php
/*
 * @Description:
 * @Author: uSee
 * @Date: 2020-02-24 13:54:34
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-24 17:29:12
 * @FilePath: \laravel-blog\database\factories\ArticleFactory.php
 */

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Articles;
use App\Model\ArticleContent;
use Faker\Generator as Faker;

$factory->define(Articles::class, function (Faker $faker) {
    return [
        'author' => $faker->name(),
        'original' => $faker->numberBetween(0, 1),
        'title' => $faker->sentence(mt_rand(4, 8)),
        'description' => $faker->text(),
    ];
});

/**
 * 回调关联
 */
$factory->afterCreating(Articles::class, function ($article, $faker) {
    $article->content()->save(factory(ArticleContent::class)->make());
});
