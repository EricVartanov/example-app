<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Список проектов
     */
    public function index(): View
    {
        //$projects = project::query()->with('owner')->get();
        $projects = collect([
            (object) [
                'id' => 1,
                'name' => 'CRM System',
                'owner_id' => 1,
                'assignee_id' => 2,
                'is_active' => true,
                'deadline_date' => '2026-03-01',
                'created_at' => '2026-01-10 10:00:00',
                'updated_at' => '2026-01-15 12:30:00',
            ],
            (object) [
                'id' => 2,
                'name' => 'Landing Page',
                'owner_id' => 1,
                'assignee_id' => null,
                'is_active' => false,
                'deadline_date' => '2026-02-15',
                'created_at' => '2026-01-12 09:20:00',
                'updated_at' => '2026-01-20 18:00:00',
            ],
        ]);

        return view('pages.project.index', compact('projects'));
    }

    /**
     * Форма создания проекта
     */
    public function create()
    {
        return view('pages.project.create');
    }

    /**
     * Создать проект
     */
    public function store(Request $request)
    {
        return 'Создать проект';
    }

    /**
     * Показ одного проекта
     */
    public function show(string $id)
    {
        $project = (object) [
            'id' => 1,
            'name' => 'CRM System',
            'owner_id' => 1,
            'assignee_id' => 2,
            'is_active' => true,
            'deadline_date' => '2026-03-01',
            'created_at' => '2026-01-10 10:00:00',
            'updated_at' => '2026-01-15 12:30:00',
        ];

        return view('pages.project.show', compact('project'));
    }

    /**
     * Форма редактирования проекта
     */
    public function edit(string $id)
    {
        $project = (object) [
            'id' => 1,
            'name' => 'CRM System',
            'owner_id' => 1,
            'assignee_id' => 2,
            'is_active' => true,
            'deadline_date' => '2026-03-01',
            'created_at' => '2026-01-10 10:00:00',
            'updated_at' => '2026-01-15 12:30:00',
        ];

        return view('pages.project.edit', compact('project'));
    }

    /**
     * Обновить проект
     */
    public function update(Request $request, string $id)
    {
        return 'Обновить проект';
    }

    /**
     * Удаление проекта
     */
    public function destroy(string $id)
    {
        return 'Удалить проект';
    }
}
