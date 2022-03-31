<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = [
         'course_id', 'name', 'description', 'is_active'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
