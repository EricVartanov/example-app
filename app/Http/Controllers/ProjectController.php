<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Список проектов
     */
    public function index()
    {
        return 'Список проектов';
    }

    /**
     * Форма создания проекта
     */
    public function create()
    {
        return 'Форма создания проекта';
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
        return 'Показать проект';
    }

    /**
     * Форма редактирования проекта
     */
    public function edit(string $id)
    {
        return 'Форма редактирования проекта';
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
