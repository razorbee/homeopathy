<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Disease::class, function (Faker $faker) {
    static $avater;
    return [
        'disease'          =>  $faker->disease,
     
    ];
});
