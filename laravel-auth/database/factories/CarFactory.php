<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {

    $name = $faker -> unique() -> numberBetween(1, 30);
    
    return [
        'name' => 'Car' . $name,
        'model' => $faker -> word,
        'kw' => $faker -> numberBetween(500, 2000)
    ];
});
