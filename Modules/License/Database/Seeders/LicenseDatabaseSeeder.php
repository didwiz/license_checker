<?php

namespace Modules\License\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\License\Entities\License;
use App\Library\Util;
class LicenseDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");

        $faker = \Faker\Factory::create();

        for($i = 0; $i < 10; $i++) {
            License::create([
                'number' =>Util::randStringGenerator(15),
                'name' => $faker->name,
                'subscription_date' => $faker->date(),
                'expiry_date' => $faker->date(),
                'status' => $faker->biasedNumberBetween($min = 0, $max = 6),
                'state_id' => $faker->biasedNumberBetween($min = 0, $max = 50),
            ]);
        }
    }
}
