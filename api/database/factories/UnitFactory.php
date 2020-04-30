<?php

use Faker\Generator as Faker;
use Faker\Provider\en_GB\Address;

$factory->define(App\Unit::class, function (Faker $faker) {

    $faker->addProvider(new Address($faker));

    return [
        'address' => $faker->streetAddress,
        'postcode' => $faker->postcode,
        'name' => $faker->company,
        'status' => $faker->randomElement( ['available', 'charging'])
    ];
});
