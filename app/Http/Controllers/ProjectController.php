<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Models\Project;
use App\Models\User;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Список проектов
     */
    public function index(): View
    {
        $projects = Project::all()->sortBy('id');

        return view('pages.project.index', compact('projects'));
    }

    /**
     * Форма создания проекта
     */
    public function create()
    {
        //С точки зрения бизнес логики это неправильно, но лучше так,
        // чем по умолчанию ответственного указывать создателя.
        //Передаю пользователей для выбора ответственного
        $users = User::select('id', 'username')->orderBy('username')->get();

        return view('pages.project.create', compact('users'));
    }

    /**
     * Создать проект
     */
    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();
        Project::create([
            ...$request->validated(),
            'owner_id' => auth()->id(),
        ]);

        return redirect()
            ->route('projects.index')
            ->with('success', 'Проект создан');
    }

    /**
     * Показ одного проекта
     */
    public function show(string $id)
    {
        $project = Project::with([
            'assignee:id,username',
            'owner:id,username',
        ])->findOrFail($id);

        return view('pages.project.show', compact('project'));
    }

    /**
     * Форма редактирования проекта
     */
    public function edit(string $id)
    {
        $project = Project::where('id', $id)->firstOrFail();
        $users = User::select('id', 'username')->orderBy('username')->get();

        return view('pages.project.edit', compact(['project', 'users']));
    }

    /**
     * Обновить проект
     */
    public function update(UpdateProjectRequest $request, string $id)
    {
        Project::create([
            ...$request->validated(),
            'owner_id' => auth()->id(),
        ]);

        return redirect()
            ->route('projects.show', ['project' => $id])
            ->with('success', 'Проект обновлен');
    }

    /**
     * Удаление проекта
     */
    public function destroy(string $id)
    {
        $project = Project::where('id', $id)->first();

        if ( ! empty($project)) {
            $project->delete();
        }

        return redirect()
            ->route('projects.index')
            ->with('success', 'Проект удален');
    }
}
