<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {

    $name = $faker->unique()->numberBetween(1, 5);

    return [
        'name' => 'Brand' . $name,
        'nationality' => $faker -> country
    ];
});
