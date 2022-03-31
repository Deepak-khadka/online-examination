<?php

namespace App\Http\Livewire\Admin;

use App\Foundation\Lib\Status;
use App\Models\Course;
use Livewire\Component;

class CourseComponent extends Component
{
    public $filter = [
        'name' => ''
    ];

    public $message = [
        'success' => '',
        'error' => ''
    ];

    public $updateCourse = false;

    public $course;

    public $courseList = [];

    protected $rules = [
        'filter.name' => 'required',
    ];

    protected $messages = [
        'filter.name.required' => 'Course name cannot be empty.',
    ];
    public function render()
    {
        $this->courseList = Course::where('is_active', '=', Status::ACTIVE)->pluck('name', 'id');
        return view('livewire.admin.course-component');
    }

    public function submit(): void
    {
        $this->validate();

        Course::create([
            'name' => $this->filter['name'],
            'is_active' => Status::ACTIVE
        ]);

        $this->reset();
        $this->message['success'] = "Course Added Successfully";
    }

    public function deleteCourse($id): void
    {
        $course = Course::find($id);

        if($course) {
            $course->delete();
            $this->message['success'] = "Course Deleted Successfully";
        }
        else {
            $this->message['error'] = "Cannot find course";
        }


    }

    public function edit($id): void
    {
        $this->course = Course::find($id);
        $this->filter['name'] = $this->course['name'];
        $this->updateCourse = true;
    }

    public function toggleCourse(): void
    {
        $this->updateCourse = !($this->updateCourse === true);
        $this->reset();
    }

    public function update(): void
    {
       $this->validate();

        $this->course['name'] = $this->filter['name'];
        $this->course->update();

        $this->reset();
        $this->message['success'] = "Course Updated Successfully";

    }
}
