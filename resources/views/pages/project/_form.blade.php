<div class="mb-4">
    <label class="mb-1 d-block"><strong>Имя</strong></label>
    <input type="text"
           name="name"
           value="{{ old('name', $project->name ?? '') }}"
           class="g-input fullwidth"
           required>
</div>

<div class="mb-4">
    <label class="mb-1 d-block"><strong>Дедлайн</strong></label>
    <input type="date"
           name="deadline_date"
           value="{{ old('deadline_date', $project->deadline_date ?? '') }}"
           class="g-input">
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
