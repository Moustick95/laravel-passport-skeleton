<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Ticket;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'title' => $faker -> title,
        'description' => $faker -> sentence(10, true),
        'first_assigned' => $faker -> date(),
        'last_assigned' => $faker -> date(),
        'created_at' => $faker -> date(),
        'updated_at' => $faker -> date()
    ];
});
