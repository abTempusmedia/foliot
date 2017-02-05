<?php

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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Student::class, function (Faker\Generator $faker) {
    
    $faker = Faker\Factory::create('hr_HR');

    return [
    
        'name' => $faker->firstName,
        'lastname' => $faker->lastName,
        'parrent_name_1' => $faker->name,
        'parrent_name_2' => $faker->name,
        'birth_date' => $faker->date,
        'address' => $faker->address,
        'school' => $faker->company,
        'email' => $faker->unique()->safeEmail,
        'telephone' => $faker->phoneNumber,
        'mobile' => $faker->phoneNumber,
        'single_childe' => $faker->boolean($chanceOfGettingTrue = 70),
        'note' => $faker->text,
       
    ];
});
