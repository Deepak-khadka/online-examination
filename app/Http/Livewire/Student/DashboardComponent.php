<?php

namespace App\Http\Livewire\Student;

use App\Models\Exam;
use Livewire\Component;

class DashboardComponent extends Component
{

    public $examList = [];

    public $subjectList = [];

    public $startPage = false;

    public $filter = [
        'subject_id' => '',
        'exam_id' => ''
    ];

    public function render()
    {
        $this->examList = Exam::with('course')->get();
        return view('livewire.student.dashboard-component');
    }

    public function getSubjectList(): void
    {
        $this->subjectList = Exam::with('course.subjects')->find($this->filter['exam_id']);
    }

    public function showStarterPage(): void
    {
       $this->startPage = true;
    }
}
