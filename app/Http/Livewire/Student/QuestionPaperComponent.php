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

    public $index = -1;

    public $score = 0;

    public $questionList = [];

    public $question;

    public $answer;

    public $hour = 0;

    public $minute;

    public $warning_message;

    public $startMessage = true;

    public $timerSection = [
        'startTime' => null,
        'fixedTimerMinute' => null,
        'seconds' => null,
        'minutes' => null,
        'distanceToMaintain' => null,
    ];

    public function render()
    {

        if ($this->startMessage) {
            return view('livewire.student.question.question-paper-component');
        }

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
        $this->startMessage = false;
        ++$this->index;
    }

    public function resetAnswer(): void
    {
        $this->answer = null;
    }

    /* Verify and reset the answer and change the question */
    public function verifyAnswer(): void
    {
        // Reset Minutes for next question
        $this->timerSection['minutes'] = null;
        // $this->timerSection['seconds'] = null; if null it's delaying like 1 sec

        if($this->index >= 0) {
            $this->saveResult();
            $this->createStudentReport();
        }

        $this->changeQuestionIndex();
        $this->setTimer();
        $this->warning_message = '';

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
        $this->minute = $exam->exam_duration;

        $this->timerSection['startTime'] = now()->getPreciseTimestamp(3);
        $this->timerSection['countDownDate'] = now()->addMinutes($exam->exam_duration)->getPreciseTimestamp(3);

        $this->timerSection['fixedTimerMinute'] = (int) $exam->exam_duration;
    }

    public function countdownTimer(): void
    {
        // Find the distance between now and the count down date
        $this->timerSection['distanceToMaintain'] = $this->timerSection['startTime'] - now()->getPreciseTimestamp(3);

        // Time calculations for minutes and seconds
        $this->timerSection['seconds'] = abs( floor( ($this->timerSection['distanceToMaintain'] % (1000 * 60)) / 1000 ) );

        if (( (int) $this->timerSection['seconds'] ) === 60) {
            $this->timerSection['minutes'] = abs( floor( ($this->timerSection['distanceToMaintain'] % (1000 * 60 * 60)) / (1000* 60) ) );
        }


        // If the count down is over, go to next question
        if ($this->timerSection['fixedTimerMinute'] === $this->timerSection['minutes']) {
            $this->verifyAnswer();
        }
    }

    private function getTime($exam_duration): void
    {
        if($exam_duration >= 60) {
            ++$this->hour;
            $exam_duration -= 60;
            $this->getTime($exam_duration);
        }else {
            $this->minute = $exam_duration;
        }
    }


}
