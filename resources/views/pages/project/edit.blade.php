@extends('layouts.base')

@section('page.title', 'Изменить проект')

@section('content')

    <div class="g-titlebar">
        <h1>Изменить проект</h1>
    </div>

    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('pages.project._form')

        <div class="g-hwrapper mt-4">
            <button type="submit" class="g-button">
                Сохранить
            </button>

            <a href="{{ route('projects.index') }}" class="g-button outlined">
                Отмена
            </a>
        </div>
    </form>

@endsection
