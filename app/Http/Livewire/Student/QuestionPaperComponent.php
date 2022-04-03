<?php

namespace App\Http\Livewire\Student;

use App\Models\Question;
use Livewire\Component;

class QuestionPaperComponent extends Component
{
    public $data = [];

    public $index = 0;

    public $questionList = [];

    public $question;

    public $answer;

    public function render()
    {
        $this->questionList = Question::where('exam_id', '=', $this->data['exam_id'])->where('subject_id', '=', $this->data['subject_id'])->get();

        if( count($this->questionList) > $this->index) {
            $this->question = $this->questionList[$this->index];
            return view('livewire.student.question.question-paper-component');
        }

        return view('livewire.student.question.success');
    }

    public function changeQuestionIndex($index): void
    {
        $this->index =  ++$this->index;
    }

    public function resetAnswer(): void
    {
         $this->answer = null;
    }

    public function verifyAnswer()
    {
       $this->changeQuestionIndex($this->index);
       $this->resetAnswer();
    }
}
