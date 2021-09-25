<?php

namespace Database\Seeders;

use App\Models\ModelUser;
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
        ModelUser::factory(10)->create();
    }
}
