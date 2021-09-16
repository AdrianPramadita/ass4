<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\support\facades\DB;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->insert([

            ['name_resource' => 'Restorant'],
            ['name_resource' => 'Listrik'],
            ['name_resource' => 'Air'],
            ['name_resource' => 'Telephone'],
            ['name_resource' => 'Internet'],
            ['name_resource' => 'Pajak'],
        ]
        );
    }
}
