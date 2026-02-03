<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Список проектов
     */
    public function index(): View
    {
        $projects = Project::all();

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
        $project = Project::where('id', $id)->firstOrFail();

        return view('pages.project.show', compact('project'));
    }

    /**
     * Форма редактирования проекта
     */
    public function edit(string $id)
    {
        $project = Project::where('id', $id)->firstOrFail();

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
        $project = Project::where('id', $id)->first();

        if (!empty($project)) {
            $project->delete();
        }

        return redirect()->route('projects.index')->with('success', 'Проект удален');
    }
}
