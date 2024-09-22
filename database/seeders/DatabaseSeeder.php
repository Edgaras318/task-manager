<?php

namespace Database\Seeders;

use App\Models\Entity;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 sample entities
        Entity::factory()->count(10)->create();
    }
}
