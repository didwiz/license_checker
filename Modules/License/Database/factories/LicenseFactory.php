<?php

use Faker\Generator as Faker;
use App\Library\Util;


$factory->define(\Modules\License\Entities\License::class, function (Faker $faker) {
    return [
                'number' =>Util::randStringGenerator(15),
                'name' => $faker->name,
                'subscription_date' => $faker->date(),
                'expiry_date' => $faker->date(),
                'status' => $faker->biasedNumberBetween($min = 0, $max = 6),
                'state_id' => $faker->biasedNumberBetween($min = 0, $max = 50),
    ];
});
