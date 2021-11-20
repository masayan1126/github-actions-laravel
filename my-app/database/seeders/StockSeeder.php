<?php

namespace Database\Seeders;

use App\Models\ModelStock;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelStock::factory()
            ->count(100)
            ->create();
    }
}
