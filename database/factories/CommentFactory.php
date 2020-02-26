<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Comments::class, function (Faker $faker) {
    return [
        'article_id' => $faker->numberBetween(1, 100),
        'parent_id' => $faker->numberBetween(0, 10),
        'ip' => $faker->ipv4(),
        'comment' => $faker->text(),
        'status' => 1,
    ];
});
