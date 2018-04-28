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
    const GENERATED_DATA_LIMIT=5;
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");

        for ($i = 0; $i < self::GENERATED_DATA_LIMIT; $i++) {
            factory(License::class)->create();
        }
    }
}
