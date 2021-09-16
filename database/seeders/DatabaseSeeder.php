<?php

namespace Database\Seeders;

use App\Models\Income;
use App\Models\Spending;
use App\Models\OrderList;
use App\Models\listorder;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Income::factory()->count(12)->create(['resource_id' => 1]);

        // listorder::factory()->count(250)->create(['resource_id' => 1]);

        // Spending::factory()->count(10)->create(['resource_id' => 2]);
        // Spending::factory()->count(10)->create(['resource_id' => 3]);
        // Spending::factory()->count(10)->create(['resource_id' => 4]);
        // Spending::factory()->count(10)->create(['resource_id' => 5]);
        // Spending::factory()->count(10)->create(['resource_id' => 6]);
    }
}
