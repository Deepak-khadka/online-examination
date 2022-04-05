<?php

namespace App\Http\Livewire\Student;

use App\Models\Exam;
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

    public $hour = 0;

    public $minute;

    public $warning_message;

    public function render()
    {
        $this->questionList = Question::where('exam_id', '=', $this->data['exam_id'])->where('subject_id', '=', $this->data['subject_id'])->get();

        $totalQuestionList = count($this->questionList);

        if ($totalQuestionList > $this->index) {

            if ($this->verifyStudentParticipation()) {
                return view('livewire.student.question.already-done');
            }

            $this->setTimer();
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
        $this->createStudentReport();
        $this->setTimer();
    }

    /* This helps to increment the result or score */
    private function saveResult(): void
    {
        if ((int)$this->question['correct_option'] === (int)$this->answer) {
            $this->score = 1;
        }
    }

    /* Create student done exam */
    private function saveExamCompleted(): void
    {
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

        $this->resetAnswer();
        $this->score = 0;
    }

    /* Verify is student already given exam or not */
    private function verifyStudentParticipation() :bool
    {
        return StudentExam::where('user_id', '=', auth()->id())
            ->where('exam_id', '=', $this->data['exam_id'])
            ->where('subject_id', '=', $this->data['subject_id'])->exists();
    }

    private function setTimer(): void
    {
        $exam = Exam::where('id', $this->data['exam_id'])->first();

        $this->hour = 0;
        $this->minute = 0;
        $this->getTime($exam->exam_duration);
        $this->emit('setCounter', $this->hour.":".$this->minute);
    }

    private function getTime($exam_duration): void
    {
        if($exam_duration >= 60) {
            ++$this->hour;
            $exam_duration -= 60;
            $this->getTime($exam_duration);
        }else {
            $this->minute += $exam_duration;
        }
    }


}
