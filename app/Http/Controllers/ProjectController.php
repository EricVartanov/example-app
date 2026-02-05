<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Список проектов
     */
    public function index(): View
    {
        Gate::authorize('viewAny', Project::class);

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
        Gate::authorize('create', Project::class);

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
    public function show(Project $project)
    {
        Gate::authorize('view', $project);

        $project->load([
            'assignee:id,username'
        ]);

        return view('pages.project.show', compact('project'));
    }

    /**
     * Форма редактирования проекта
     */
    public function edit(Project $project)
    {
        $users = User::select('id', 'username')->orderBy('username')->get();

        return view('pages.project.edit', compact(['project', 'users']));
    }

    /**
     * Обновить проект
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        Gate::authorize('update', $project);

        $project->update($request->validated());

        return redirect()
            ->route('projects.show', ['project' => $project])
            ->with('success', 'Проект обновлен');
    }

    /**
     * Удаление проекта
     */
    public function destroy(Project $project)
    {
        Gate::authorize('delete', $project);

        $project->delete();

        return redirect()
            ->route('projects.index')
            ->with('success', 'Проект удален');
    }
}
