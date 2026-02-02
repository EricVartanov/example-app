<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'owner_id',
        'is_active',
        'assignee_id',
        'deadline_date',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
            'deadline_date' => 'datetime:Y-m-d H:i:s',
        ];
    }

    //Владелец проекта
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    //Ответственный проекта
    public function assignee()
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }
}
