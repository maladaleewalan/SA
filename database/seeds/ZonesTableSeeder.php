<?php

use Illuminate\Database\Seeder;
use App\Zone;
class ZonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zone = new zone;
        $zone->name = "หน้า";
        $zone->cost = 100;
        $zone->save();

        $zone = new zone;
        $zone->name = "หลัง";
        $zone->cost = 80;
        $zone->save();
    }
}
