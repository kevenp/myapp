<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 2017/9/3
 * Time: 下午4:11
 */
use Faker\Generator as Faker;
/**  */
$factory->define(App\Models\Status::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    return [
        'content' => $faker->text(),
        'created_at' => $date_time,
        'updated_at' => $date_time
    ];
});