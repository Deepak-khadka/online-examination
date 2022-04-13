<?php

namespace App\Http\Livewire\Student;

use App\Foundation\Lib\Status;
use App\Models\Exam;
use Livewire\Component;

class DashboardComponent extends Component
{

    public $examList = [];

    public $subjectList = [];

    public $filter = [
        'subject_id' => '',
        'exam_id' => ''
    ];

    public function render()
    {
        if(auth()->user()->status === Status::ACTIVE) {
            $this->examList = auth()->user()->course->exams->pluck('name', 'id');
            return view('livewire.student.dashboard-component');
        }

        return view('livewire.student.unverified-message');
    }

    public function getSubjectList(): void
    {
        $this->subjectList = Exam::with('course.subjects')->find($this->filter['exam_id']);
    }

}
