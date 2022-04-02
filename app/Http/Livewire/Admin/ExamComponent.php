<?php

namespace App\Http\Livewire\Admin;

use App\Foundation\Lib\QuestionType;
use App\Foundation\Lib\Status;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Subject;

class ExamComponent extends BaseComponent implements CrudComponent
{
    public $courseList = [];

    public $examList = [];

    public $exam;

    public $displayExamSubjects = [];

    public $filter = [
        'course_id' => '',
        'name' => '',
        'exam_date' => '',
        'full_marks' => '',
        'exam_duration' => '',
        'terms_and_conditions' => ''
    ];

    public $showQuestionForm = false;

    public $subject;

    public $questionFilter = [
        'exam_id' => '',
        'subject_id' => '',
        'question' => '',
        'options' => '',
        'correct_option' => ''
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

    public function showSubjects($id): void
    {
       $this->displayExamSubjects = Exam::with('course.subjects')->find($id);
    }

    public function toggleDisplay(): void
    {
        $this->displayExamSubjects = [];
    }

    public function addQuestions($subjectId): void
    {
        $this->subject = Subject::find($subjectId);

        $this->questionFilter['exam_id'] = $this->displayExamSubjects['id'];
        $this->questionFilter['subject_id'] = $subjectId;
        $this->showQuestionForm = true;
    }

    /* This function used to save the question with respective to the exam id and subject id */
    public function submitQuestion(): void
    {
        $validatedData = $this->validate([
            'questionFilter.question' => 'required',
            'questionFilter.options' => 'required',
            'questionFilter.correct_option' => 'required|integer',
            'questionFilter.exam_id' => 'required|integer',
            'questionFilter.subject_id' => 'required|integer',
        ]);

        $validatedData['questionFilter']['question_type'] = QuestionType::OBJECTIVE;

        Question::create($validatedData['questionFilter']);

        $this->reset();

        $this->setSuccessMessage("Question Added Successfully");
    }

}
