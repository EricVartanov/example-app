<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'deadline_date' => ['required', 'date'],
            'is_active' => ['boolean'],
            'assignee_id' => ['required', 'exists:users,id']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Введите название проекта',
            'assignee_id.exists' => 'Выбран некорректный ответственный',
            'assignee_id.required' => 'Укажите ответственного проекта',
            'deadline_date.after' => 'Дедлайн должен быть в будущем',
            'deadline_date.required' => 'Укажите дедлайн',
        ];
    }
}
