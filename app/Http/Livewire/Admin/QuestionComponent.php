<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class QuestionComponent extends Component
{
    public $subject;

    public $exam;

    public $questionFilter = [
        'exam_id' => '',
        'subject_id' => '',
        'question' => ' '
    ];

    public function render()
    {
        return view('livewire.admin.question-component');
    }
}
