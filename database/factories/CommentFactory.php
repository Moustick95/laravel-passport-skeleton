<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Comment;
use Faker\Generator as Faker;

use Faker\Provider\Lorem;

$factory->define(Comment::class, function (Faker $faker) {
    $faker->addProvider(new Lorem($faker));
    return [
        'content' => $faker -> paragraph(5, true),
        'created_at' => $faker -> date(),
        'updated_at' => $faker -> date()
    ];
});
