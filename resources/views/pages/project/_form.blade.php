@php
    $deadlineDate = optional($project->deadline_date ?? '')->format('Y-m-d') ?? '';
@endphp

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <x-alert :type="'error'" :title="$error"/>
    @endforeach
@endif

<div class="mb-4">
    <label class="mb-1 d-block"><strong>Имя</strong></label>
    <input type="text"
           name="name"
           value="{{ old('name', $project->name ?? '') }}"
           class="g-input fullwidth"
           required>

    @error('name')
    <div style="color: red !important; font-size: 10px;">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-4">
    <label class="mb-1 d-block"><strong>Дедлайн</strong></label>
    <input type="date"
           name="deadline_date"
           value="{{ old('deadline_date', $deadlineDate) }}"
           class="g-input">

    @error('deadline_date')
    <div style="color: red !important; font-size: 10px;">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-4">
    <label class="mb-1 d-block"><strong>Ответственный</strong></label>

    <select name="assignee_id" class="g-input fullwidth" required>
        @foreach ($users as $user)
            <option value="{{ $user->id }}"
                {{ old('assignee_id', $project->assignee_id ?? null) == $user->id ? 'selected' : '' }}>
                {{ $user->username }}
            </option>
        @endforeach
    </select>

    @error('assignee_id')
    <div style="color: red !important; font-size: 10px;">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-4">
    <label>
        <input type="checkbox"
               name="is_active"
               value="1"
            {{ old('is_active', $project->is_active ?? false) ? 'checked' : '' }}>
        Активный проект
    </label>
</div>