<?php

use App\Modules\Authentication\Model\User;
use Illuminate\Database\Seeder;
use App\Modules\Management\Model\Room;
use App\Modules\Management\Model\Tenant;
use App\Modules\Management\Model\Apartment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    factory(User::class, 2)->create();
        factory(Apartment::class, 10)->create();
        factory(Room::class, 30)->create();
        factory(Tenant::class, 10)->create();
    }
}
