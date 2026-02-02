@extends('layouts.base')

@section('page.title', 'Проекты')

@section('content')

    <div class="g-titlebar">
        <h1>Проекты</h1>

        <a href="{{ route('projects.create') }}"
           class="g-button right">
            + Создать проект
        </a>
    </div>

    <div class="g-tablewrapper">
        <table class="g-table hoverable">
            <thead>
            <tr>
                <td>ID</td>
                <td>Имя</td>
                <td>Статус</td>
                <td>Дедлайн</td>
                <td>Действия</td>
            </tr>
            </thead>

            <tbody>
            @forelse ($projects as $project)
                <tr>
                    <td class="nowrap">
                        {{ $project->id }}
                    </td>

                    <td>
                        <strong>{{ $project->name }}</strong>
                    </td>

                    <td class="nowrap">
                        @if ($project->is_active)
                            <span class="g-status green">
                                Активный
                            </span>
                        @else
                            <span class="g-status red">
                                Неактивный
                            </span>
                        @endif
                    </td>

                    <td class="nowrap">
                        {{ $project->deadline_date ?? '—' }}
                    </td>

                    <td>
                        <a href="{{ route('projects.show', $project->id) }}"
                           class="g-actionicon"
                           title="Просмотр">
                            👁
                        </a>

                        <a href="{{ route('projects.edit', $project->id) }}"
                           class="g-actionicon"
                           title="Изменить">
                            ✏️
                        </a>

                        <form action="{{ route('projects.destroy', $project->id) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Delete this project?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="g-actionicon danger"
                                    title="Удалить">
                                🗑
                            </button>
                        </form>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="5" class="center">
                        <p class="mt-4 mb-4">Проекты не найдены</p>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
