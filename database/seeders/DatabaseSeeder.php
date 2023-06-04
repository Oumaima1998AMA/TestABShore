<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\TaskFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        TaskFactory::factory()->count(10)->create();
    }
}
