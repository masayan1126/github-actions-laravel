<?php

namespace Database\Seeders;

use App\Models\ModelUser;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelUser::factory()
            ->count(5)
            ->create();
    }
}
