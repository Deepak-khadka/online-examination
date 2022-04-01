<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exam extends Model
{
    use HasFactory;

    protected $table = 'exam';

    protected $fillable = [
        'course_id' ,
        'name' ,
        'exam_date' ,
        'full_marks',
        'exam_duration',
        'terms_and_conditions'
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
