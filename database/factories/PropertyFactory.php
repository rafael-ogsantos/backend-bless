<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Property;
use Faker\Generator as Faker;

use App\User;

$factory->define(Property::class, function (Faker $faker) {
    return [
    	'user_id' => function()
    	{
    		return User::all()->random();
    	},
        'title' => $faker->name,
        'description' => $faker->text,
        'price' => $faker->randomNumber(3),
        'latitude' => function() {
            $arr = ['31.5204', '31.530', '31.5209', '31.5104'];
            return $arr[array_rand($arr)];
        },
        'longitude' => function() {
            $arr = ['74.3587', '74.35', '74.358', '74.3487'];
            return $arr[array_rand($arr)];
        },
        'image' => "default.png",
        'region' => function() {
        	$arrayName = ['Delaware', 'Florida', 'Georgia', 'Maryland', 'North Carolina'];
            return $arrayName[array_rand($arrayName)];
        },
        'zip_code' => $faker->randomNumber(4),
        'extra_field' => $faker->text
    ];
});
