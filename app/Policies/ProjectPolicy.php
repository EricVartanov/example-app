<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProjectPolicy
{
    /**
     * Просмотр списка проектов
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Просмотр одного проекта
     */
    public function view(User $user, Project $project): bool
    {
        return true;
    }

    /**
     * Создание проекта
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Обновление проекта
     */
    public function update(User $user, Project $project): bool
    {
        return $user->isAdmin() || $user->id === $project->owner_id || $user->id === $project->assignee_id;
    }

    /**
     * Удаление проекта
     */
    public function delete(User $user, Project $project): bool
    {
        return $user->isAdmin() || $user->id === $project->owner_id || $user->id === $project->assignee_id;
    }

    /**
     *  Возвращение проекта
     */
    public function restore(User $user, Project $project): bool
    {
        return $user->isAdmin() || $user->id === $project->owner_id;
    }

    /**
     * Окончательное удаление проекта
     */
    public function forceDelete(User $user, Project $project): bool
    {
        return $user->isAdmin() || $user->id === $project->owner_id;
    }
}
