<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(2),
            'owner_id' => User::factory(),
            'assignee_id' => User::factory(),
            'is_active' => $this->faker->boolean(80),
            'deadline_date' => $this->faker->dateTimeBetween('now', '+3 months'),
        ];
    }
}
