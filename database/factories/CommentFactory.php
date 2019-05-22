<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content' => paragraphs(3, true),
        'created_at' => $faker -> date(),
        'updated_at' => $faker -> date()
    ];
});
