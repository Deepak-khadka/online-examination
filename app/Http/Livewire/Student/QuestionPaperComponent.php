<?php

namespace App\Http\Livewire\Student;

use App\Models\Question;
use App\Models\Result;
use App\Models\StudentExam;
use Livewire\Component;

class QuestionPaperComponent extends Component
{
    public $data = [];

    public $index = 0;

    public $score = 0;

    public $questionList = [];

    public $question;

    public $answer;

    public $timer = 300;

    public function render()
    {
        $this->questionList = Question::where('exam_id', '=', $this->data['exam_id'])->where('subject_id', '=', $this->data['subject_id'])->get();

        $totalQuestionList = count($this->questionList);

        if ($totalQuestionList > $this->index) {

            if ($this->verifyStudentParticipation()) {
                return view('livewire.student.question.already-done');
            }

            $this->question = $this->questionList[$this->index];
            return view('livewire.student.question.question-paper-component');
        }

        $this->saveExamCompleted();

        return view('livewire.student.question.success');
    }

    public function changeQuestionIndex(): void
    {
        $this->index = ++$this->index;
    }

    public function resetAnswer(): void
    {
        $this->answer = null;
    }

    /* Verify and reset the answer and change the question */
    public function verifyAnswer(): void
    {
        $this->saveResult();
        $this->changeQuestionIndex();
        $this->resetAnswer();
    }

    /* This helps to increment the result or score */
    private function saveResult(): void
    {
        if ((int)$this->question['correct_option'] === (int)$this->answer) {
            $this->score = ++$this->score;
        }
    }

    /* Create student done exam */
    private function saveExamCompleted(): void
    {
        $this->createStudentReport();

        StudentExam::create([
            'user_id' => auth()->id(),
            'exam_id' => $this->question['exam_id'],
            'subject_id' => $this->question['subject_id'],
        ]);
    }

    /* Create Student Report */
    private function createStudentReport(): void
    {
        $result = \DB::table('subjects')
            ->select('course.name as course_name')
            ->join('course', 'course.id', '=', 'subjects.course_id')
            ->where('subjects.id', '=', $this->question['subject_id'])->first();

        Result::create([
            'exam_id' => $this->question['exam_id'],
            'subject_id' => $this->question['subject_id'],
            'course_name' => $result->course_name,
            'user_id' => auth()->user()->id,
            'score' => $this->score
        ]);
    }

    /* Verify is student already given exam or not */
    private function verifyStudentParticipation() :bool
    {
        return StudentExam::where('user_id', '=', auth()->id())
            ->where('exam_id', '=', $this->data['exam_id'])
            ->where('subject_id', '=', $this->data['subject_id'])->exists();
    }
}
