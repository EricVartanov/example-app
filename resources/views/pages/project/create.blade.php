@extends('layouts.base')

@section('page.title', 'Создать проект')

@section('content')

    <div class="g-titlebar">
        <h1>Создать проект</h1>
    </div>

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf

        @include('pages.project._form')

        <div class="g-hwrapper mt-4">
            <button type="submit" class="g-button">
                Создать
            </button>

            <a href="{{ route('projects.index') }}" class="g-button outlined">
                Отмена
            </a>
        </div>
    </form>

@endsection
