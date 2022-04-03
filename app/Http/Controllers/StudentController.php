<?php

namespace App\Http\Controllers;

use App\Models\Question;

class StudentController extends Controller
{

    public function index()
    {
        return view('student.index1');
    }

    public function getQuestionsList($examId, $subjectId)
    {
        $data = [];
        $data['subject_id'] = decrypt($subjectId);
        $data['exam_id'] = decrypt($examId);

        return view('student.question.index', compact('data'));
    }

    public function test()
    {
        dd('here');
    }
}
