<?php
/*
 * @Description:
 * @Author: uSee
 * @Date: 2020-02-24 13:54:34
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-25 15:15:04
 * @FilePath: \laravel-blog\database\factories\ArticleFactory.php
 */

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Articles::class, function (Faker $faker) {
    return [
        'author' => $faker->name(),
        'original' => $faker->numberBetween(0, 1),
        'category_id' => rand(1, 10),
        'title' => $faker->sentence(mt_rand(4, 8)),
        'description' => $faker->text()
    ];
});
