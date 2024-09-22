<?php

namespace Database\Factories;

use App\Models\Entity;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntityFactory extends Factory
{
    protected $model = Entity::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph,
            'creator' => $this->faker->name,
            'tester' => $this->faker->name,
            'assignee' => $this->faker->name,
            'status' => $this->faker->randomElement(['paused', 'in progress', 'testing', 'released']),
            'type' => $this->faker->randomElement(['task', 'bug']),
        ];
    }
}
