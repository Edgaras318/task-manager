<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Entity;

class EntitySeeder extends Seeder
{
    public function run()
    {
        // Create 10 sample entities
        Entity::factory()->count(10)->create();
    }
}
