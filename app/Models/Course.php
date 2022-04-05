<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $table = 'course';

    protected $fillable = [
        'name', 'is_active'
    ];

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function exams(): HasMany
    {
        return $this->hasMany(Exam::class, 'course_id');
    }
}
