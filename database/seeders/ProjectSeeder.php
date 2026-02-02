<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory()->count(5)->create();

        Project::factory()
            ->count(10)
            ->create([
                'owner_id' => $users->random()->id,
                'assignee_id' => $users->random()->id,
            ]);
    }
}
