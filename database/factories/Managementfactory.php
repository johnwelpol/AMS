<?php

use Faker\Generator as Faker;
use App\Modules\Management\Model\Apartment;
use App\Modules\Authentication\Model\User;
use App\Modules\Management\Model\Room;
use App\Modules\Management\Model\BillingStatus;
use App\Modules\Management\Model\Tenant;

// $factory->define(Model::class, function (Faker $faker) {
//     return [
//         //
//     ];
// });



$factory->define(/**
 * @param Faker $faker
 * @return array
 */
    Apartment::class, function (Faker $faker) {
        return array(
            'name' => "$faker->name",
            'description' => "$faker->sentences()",
            'longitude' => $faker->randomFloat(),
            'latitude' => $faker->randomFloat(),
            'user_id' => function () {
                return User::all()->random();
            },
        );
});

$factory->define(Room::class, function (Faker $faker) {
    return [
        'room_name' => $faker->name,
        'description' => $faker->sentences(),
        'apartment_id' => function () {
            return Apartment::all()->random();
        },
    ];
});

// $factory->define(BillingStatus::class, function (Faker $faker) {
//     return [
//         'status_id' => $faker->numberBetween(0,1),
//         'total' => $faker->randomFloat(),
//         'due_date' => $faker->dateTimeBetween('+30 years', 'now') ,
//         'room_id' => function () {
//             return Room::all()->random();
//         },
//     ];
// });

$factory->define(Tenant::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'middle_name' => $faker->name,
        'last_name' => $faker->name,
        'contact_number' => $faker->phoneNumber ,
        'email' => $faker->unique()->safeEmail,
        'room_id' => function () {
            return Room::all()->random();
        },
    ];
});
