<?php

namespace App\Modules\Management\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Management\Model\Tenant;

class ManagementDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();

        factory(Apartment::class, 10)->create();   
        factory(Room::class, 30)->create();
        factory(Tenant::class, 10)->create();
        // factory(BillingStatus::class, 30)->create();

        // $this->call("OthersTableSeeder");
    }
}
