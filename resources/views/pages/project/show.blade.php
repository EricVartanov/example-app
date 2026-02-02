@extends('layouts.base')

@section('page.title', $project->name)

@section('content')
    <div class="g-titlebar">
        <h1>{{ $project->name }}</h1>
    </div>

    <table class="g-table">
        <tbody>
        <tr>
            <td><strong>ID</strong></td>
            <td>{{ $project->id }}</td>
        </tr>

        <tr>
            <td><strong>Статус</strong></td>
            <td>
                @if ($project->is_active)
                    <span class="g-status green">Активный</span>
                @else
                    <span class="g-status red">Неактивный</span>
                @endif
            </td>
        </tr>

        <tr>
            <td><strong>Дедлайн</strong></td>
            <td>{{ $project->deadline_date ?? '—' }}</td>
        </tr>

        <tr>
            <td><strong>Создано</strong></td>
            <td>{{ $project->created_at }}</td>
        </tr>

        <tr>
            <td><strong>Обновлено</strong></td>
            <td>{{ $project->updated_at }}</td>
        </tr>
        </tbody>
    </table>

    <a href="{{ route('projects.index') }}" class="g-button">
        ← Вернуться к проектам
    </a>

@endsection
