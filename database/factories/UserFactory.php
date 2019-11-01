<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Category;
use App\Admin;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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

$factory->define(User::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);
    return [
        'name' => $faker->firstName($gender),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});



$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'image' => '../../image/image3.jpg',
        'category_id' => rand(1,3),
        'title' => $faker->sentence(rand(3,7)),
        'place' => $faker->address,
        'map' => 'https://goo.gl/maps/GzC177bmq8vvzh4p8',
        'date' => $faker->dateTimeBetween('+7 days', '+1 year'),
        'organizer' => $faker->name,
        'organizer_link' => 'http://www.vision-tokyo.com/',
        'published_at' => $faker->dateTimeBetween('-1day', '+7 days'),
        'description' => $faker->paragraph(rand(20,30))
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word(1)
    ];
});

$factory->define(App\Profile::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);
    return [
        'user_id' => App\User::all()->random()->id,
        'image' => 'image/image1.jpg',
        'gender' => $gender,
        'country' => $faker->country,
        'bod' => $faker->dateTimeBetween('-40 years', '-20years')->format('Y-m-d'),
        'instagram' => $faker->safeEmail,
        'description' => $faker->paragraph(rand(20,50))
    ];
});

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence(6),
        'user_id' => factory(App\User::class)->create()->id,
        'post_id' => factory(App\Post::class)->create()->id,
        'comment_id' => null
    ];
});




