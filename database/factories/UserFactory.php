<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 2017/9/3
 * Time: 上午11:08
 */

use Faker\Generator as Faker;

$factory->define(\App\Models\User::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
   static $password;
   return [
       'name' => $faker->name,
       'email' => $faker->unique()->safeEmail,
       'is_admin' => false,
       'password' => $password ?: $password = bcrypt('secret'),
       'remember_token' => str_random(10),
       'created_at' => $date_time,
       'updated_at' => $date_time
   ];
});