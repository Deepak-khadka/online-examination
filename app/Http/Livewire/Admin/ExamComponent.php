<?php

namespace App\Http\Livewire\Admin;

use App\Foundation\Lib\Status;
use App\Models\Course;
use App\Models\Exam;

class ExamComponent extends BaseComponent implements CrudComponent
{
    public $courseList = [];

    public $examList = [];

    public $exam;

    public $filter = [
        'course_id' => '',
        'name' => '',
        'exam_date' => '',
        'full_marks' => '',
        'exam_duration' => '',
        'terms_and_conditions' => ''
    ];

    protected $rules = [
        'filter.course_id' => 'required|integer',
        'filter.name' => 'required|string',
        'filter.exam_date' => 'required|date',
        'filter.full_marks' => 'required',
        'filter.exam_duration' => 'required',
        'filter.terms_and_conditions' => 'required|max:400'
    ];

    protected $messages = [
        'filter.course_id.required' => 'Select One Course',
        'filter.name.required' => 'Exam name is required',
        'filter.exam_date.required' => 'Exam date is required',
        'filter.full_marks.required' => 'Full Marks is required',
        'filter.exam_duration.required' => 'Exam duration is required',
        'filter.terms_and_conditions.required' => 'Terms and Conditions is required',
        'filter.terms_and_conditions.max' => 'Terms and Conditions should be less than 400 character'
    ];

    public function render()
    {
        $this->courseList = Course::where('is_active', '=', Status::ACTIVE)->pluck('name', 'id');
        $this->examList = Exam::with('course')->whereDate('exam_date', '>', now()->toDateString())->get();

        return view('livewire.admin.exam-component');
    }

    public function save(): void
    {
        $this->saveModel(Exam::class, $this->filter);
    }

    public function delete($id) : void
    {
        $this->deleteModel(Exam::class, $id);
    }

    public function update(): void
    {
        $this->updateModel(Exam::class, $this->filter);
    }
}
