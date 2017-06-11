<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Aris\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Aris\News::class, function (Faker\Generator $faker) {
    
    static $password;
    
    $newstitle = $faker->sentence(5);
    $image = $faker->imageUrl;

    return [
		'title'	=>	$newstitle ,
		'slug'	=>	str_slug($newstitle) ,
		'featured_image'	=>	$image,
		'content'	=> '<p><img src="">' . $image . '</p>' . '<p>' . $faker->paragraph . '</p>' . '<p>' . $faker->paragraph . '</p>' ,
		'excerpt'	=>	$faker->paragraph ,
		'date'		=> $faker->date('Y-m-d')
    ];
});
