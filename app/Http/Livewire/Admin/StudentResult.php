<?php

namespace App\Http\Livewire\Admin;

use App\Models\Exam;
use Livewire\Component;

class StudentResult extends Component
{
    public $results = [];

    public $resultNotFound = false;

    public $filter = [
        'student_name' => '',
        'exam_id' => ''
    ];


    protected $rules = [
        'filter.student_name' => 'required',
        'filter.exam_id' => 'required',
    ];

    protected $messages = [
        'filter.student_name.required' => 'Student name is required',
        'filter.exam_id.required' => 'Exam id is required',
    ];

    public function render()
    {
        $data = [];
        $data['exam'] = Exam::with('course')->get();
        return view('livewire.admin.student-result', compact('data'));
    }

    public function showReport()
    {
        $this->validate();

       $results =  \DB::table('result')->select('users.name as user_name', 'result.subject_id as subjectId', 'result.score', 'subjects.name as subject_name' )
           ->join('users', 'users.id', '=', 'result.user_id')
           ->join('subjects', 'subjects.id', '=', 'result.subject_id')
           ->where('exam_id', '=', $this->filter['exam_id'])
           ->where('users.name', 'like', '%'.$this->filter['student_name'].'%')
           ->get()
           ->groupBy('subject_name');

       if(count($results) > 0) {
           foreach ($results as $index => $resultQuestions) {
               $totalResult = 0;

               foreach ($resultQuestions as $answersheet) {

                   $totalResult = $answersheet->score === 1 ? $totalResult + 1 : $totalResult;

                   $this->results[$index] =  $totalResult;
               }
           }
       }
       else {
           $this->results = [];
           $this->resultNotFound = true;
       }

    }
}
