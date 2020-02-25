<?php
/*
 * @Description: 
 * @Author: uSee
 * @Date: 2020-02-25 14:57:06
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-25 14:57:06
 * @FilePath: \laravel-blog\database\factories\CategoryFactory.php
 */

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Categories::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
    ];
});