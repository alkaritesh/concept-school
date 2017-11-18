<?php

use Faker\Generator as Faker;
use SchoolDays\Models\School;

$factory->define(School::class, function (Faker $faker) {
    return [
        'name'=>$faker->sentence,
        'code'=>$faker->uuid,
        'address'=>$faker->streetAddress,
        'board'=>$faker->sentence,
        'registration_number'=>$faker->uuid,
        'pincode'=>$faker->postcode,
        'logo'=>$faker->imageUrl,
        'founder'=>$faker->name,
        'founded_in'=>$faker->year
    ];
});
