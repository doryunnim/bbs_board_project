<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt('password'),
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Qna_article::class, function (Faker $faker) {
    $date = $faker->dateTimeThisMonth;

    return [
        'title' => $faker->sentence(),
        'content' => $faker->paragraph(),
        'created_at' => $date,
        'updated_at' => $date,
    ];
});

$factory->define(App\Qna_comment::class, function (Faker $faker){
    $articleIds = App\Qna_article::pluck('id')->toArray();
    $userIds = App\User::pluck('id')->toArray();

    return [
        'content' => $faker->paragraph,
        'commentable_type' => App\Qna_article::class,
        'commentable_id' => function() use ($faker, $articleIds){
            return $faker->randomElement($articleIds);
        },
        'user_id' => function() use ($faker, $userIds){
            return $faker->randomElement($userIds);
        },
    ];
});