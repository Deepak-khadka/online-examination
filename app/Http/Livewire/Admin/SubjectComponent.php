<?php

namespace App\Http\Livewire\Admin;

use App\Foundation\Lib\Status;
use App\Models\Course;
use App\Models\Subject;
use Livewire\Component;

class SubjectComponent extends Component
{
    public $filter = [
        'course_id' => '',
        'name' => '',
        'description' => '',
        'is_active' => '',
    ];

    public $message = [
        'success' => '',
        'error' => ''
    ];

    public $subjectList = [];

    public $courseList = [];

    protected $rules = [
        'filter.name' => 'required',
        'filter.course_id' => 'required',
        'filter.description' => 'required',
        'filter.is_active' => 'required',
    ];

    protected $messages = [
        'filter.name.required' => 'Subject name is required',
        'filter.course_id.required' => 'Course id is required',
        'filter.description.required' => 'Description is required',
        'filter.is_active.required' => 'Status is required',
    ];

    public function render()
    {
        $this->subjectList = Subject::with('course')->where('is_active', '=', Status::ACTIVE)->get();
        $this->courseList = Course::where('is_active', '=', Status::ACTIVE)->pluck('name', 'id');
        return view('livewire.admin.subject-component');
    }

    public function storeSubject(): void
    {
        $this->validate();

        $subject = Subject::create($this->filter);

        if($subject) {
            $this->message['success'] = "Subject Created Successfully";
        }
    }

    public function delete($id)
    {
        $subject = Subject::find($id);

        if($subject) {
            $subject->delete();
            $this->message['success'] = 'Subject Deleted Successfully';
        }
    }
}
