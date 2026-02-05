<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Project;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;

class DevController extends Controller
{
    public function index(Request $request, string $action = null)
    {
        if ($action === null) {
            $result = '<p>Available actions:</p><ul>';
            foreach (array_diff(get_class_methods($this), get_class_methods(Controller::class)) as $method) {
                if ($method !== 'index') {
                    $result .= '<li><a href="/dev/' . $method . '">' . $method . '</a></li>';
                }
            }

            return $result . '</ul>';
        }

        if (method_exists($this, $action)) {
            return $this->{$action}($request);
        }

        return null;
    }

    public function test()
    {
    }

    //создание рандомных проектов без использования factory seeder
    public function addProject()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            Project::create([
                'name' => $faker->sentence(2),
                'owner_id' => $faker->numberBetween(1, 6),
                'is_active' => $faker->boolean(80),
                'assignee_id' => $faker->numberBetween(1, 6),
                'deadline_date' => $faker->dateTimeBetween('now', '+6 months'),
            ]);
        }
    }

    //получение всех проектов админов
    public function getAdminProjects()
    {
        return Project::query()
            ->whereHas('owner', function ($query) {
                $query->where('role', 'admin');
            })
            ->with('owner')
            ->get();
    }

    //проекты с просроченным дедлайном
    public function getExpired()
    {
        return Project::query()
            ->where('deadline_date', '<', now())
            ->orderBy('deadline_date', 'asc')
            ->get();
    }

    //берет рандомный проект и меняет на рандомные данные
    public function updateRandom()
    {
        $faker = Faker::create();

        return Project::query()
            ->inRandomOrder()
            ->firstOrFail()
            ->update([
                'name' => $faker->sentence(1),
                'owner_id' => $faker->numberBetween(1, 6),
                'is_active' => $faker->boolean(80),
                'assignee_id' => $faker->numberBetween(1, 6),
                'deadline_date' => $faker->dateTimeBetween('now', '+6 months'),
            ]);
    }

    //получить последние 3 проекта авторизованного или из общих проектов
    public function getMyLatestThree()
    {
        //для теста авторизованных
        //$user = User::find(1);
        //Auth::login($user);

        if (auth()->check()) {
            return Project::query()
                ->where('owner_id', auth()->id())
                ->latest()
                ->take(3)->get();
        }

        return Project::query()
            ->latest()
            ->take(3)
            ->get();
    }

    // возвращает массив со списком пользователей и кол-вом их проектов
    public function usersProjects()
    {
        return User::query()
            ->withCount('ownedProjects')
            ->pluck('owned_projects_count', 'username');
    }

    //возвращает кол-во проектов с истекшим сроком
    public function getExpiredProjectsCount()
    {
        return Project::expired()->count();
    }
}
