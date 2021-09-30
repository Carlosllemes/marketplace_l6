<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\ProductImage::class, function (Faker $faker) {

    return ['image' => 'gallery-04.jpg',];

});
