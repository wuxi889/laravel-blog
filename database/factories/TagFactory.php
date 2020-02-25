<?php
/*
 * @Description: 
 * @Author: uSee
 * @Date: 2020-02-25 15:02:28
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-25 15:02:28
 * @FilePath: \laravel-blog\database\factories\TagFactory.php
 */

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tags;
use Faker\Generator as Faker;

$factory->define(Tags::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
    ];
});
