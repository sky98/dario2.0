<?php

use App\User;
use App\models\customers;
use App\models\debts;
use App\models\movements;
use Faker\Generator;


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (Generator $faker) {
    static $password;

    return [
        'nit' =>$faker->randomNumber($nbDigits = NULL, $strict = false),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'state' => 1,
        'role' => 'e',
        'password' => $password ?: $password = bcrypt('12345'),
        'token'=> str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(customers::class, function(Generator $faker){

    return [
    	'nit' =>$faker->randomNumber($nbDigits = NULL, $strict = false),
        'name' => $faker->name,
        'address' => $faker->address,
        'phone_number' => $faker->tollFreePhoneNumber,
    ];

});

$factory->define(debts::class, function(Generator $faker){
    return [
        'initial_balance' =>$faker->numberBetween($min = 100000, $max = 1000000),
        'current_balance' => $faker->numberBetween($min = 10000, $max = 100000),
        'customer_id' => $faker->numberBetween($min = 1, $max = 50),
    ];    
});

$factory->define(movements::class, function(Generator $faker){
   return [
        'type' =>$faker->numberBetween($min = 0, $max = 1),
        'value' =>$faker->numberBetween($min = 10000, $max = 100000),        
        'percentage' =>$faker->numberBetween($min = 0, $max = 100),
        'user_id' => 1,
        'customer_id' => $faker->numberBetween($min = 1, $max = 50),
    ]; 
});