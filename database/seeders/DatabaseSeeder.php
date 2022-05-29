<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;

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
        // seed the roles
        $this->call(RoleSeeder::class);
    }
}
