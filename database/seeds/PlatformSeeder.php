<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('platforms')->insert([
            [
                'platform' => "X-BOX 360"
            ],
            [
                'platform' => "X-BOX ONE"
            ],
            [
                'platform' => "PS3"
            ],
            [
                'platform' => "PS4"
            ],
        ]);
    }
}