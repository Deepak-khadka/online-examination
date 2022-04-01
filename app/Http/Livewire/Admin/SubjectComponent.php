<?php

namespace App\Http\Livewire\Admin;

use App\Foundation\Lib\Status;
use App\Models\Course;
use App\Models\Subject;

class SubjectComponent extends BaseComponent
{
    public $filter = [
        'course_id' => '',
        'name' => '',
        'description' => '',
        'is_active' => '',
    ];

    public $editPage = false;

    public $subject;

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
        $this->subjectList = Subject::with('course')->get();
        $this->courseList = Course::where('is_active', '=', Status::ACTIVE)->pluck('name', 'id');
        return view('livewire.admin.subject-component');
    }

    public function storeSubject(): void
    {
        $this->validate();

        $subject = Subject::create($this->filter);

        $this->reset();

        if($subject) {
            $this->setSuccessMessage("Subject Created Successfully");
        }
    }


    public function edit($id): void
    {
        $this->subject = Subject::find($id);
        $this->editPage = true;

        $this->filter = [
            'name' => $this->subject['name'],
            'description' => $this->subject['description'],
            'is_active' => $this->subject['is_active'],
            'course_id' => $this->subject['course_id']
        ];
    }

    public function delete($id): void
    {
        $subject = Subject::find($id);

        if($subject) {
            $subject->delete();
            $this->setSuccessMessage('Subject Deleted Successfully');
        }
    }

    public function togglePage(): void
    {
        $this->editPage = !($this->editPage === true);
        $this->reset();
    }

    public function update(): void
    {
        $this->validate();

        $this->subject['name'] = $this->filter['name'];
        $this->subject['description'] = $this->filter['description'];
        $this->subject['is_active'] = $this->filter['is_active'];
        $this->subject['course_id'] = $this->filter['course_id'];
        $this->subject->update();

        $this->reset();

        $this->setSuccessMessage("Subject Updated Successfully");

    }
}
