<div class="container">

        <form action="{{ route('student.question-list', ['examId' => encrypt($this->filter['exam_id']), 'subjectId' => encrypt( $this->filter['subject_id'])]) }}" method="POST">
            @csrf
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Exam :</label>
            <div class="col-sm-9">
                <select class="form-control" wire:model="filter.exam_id" name="exam_id" wire:change="getSubjectList">
                    <option>-- Select Exam ---</option>
                    @foreach($this->examList as $id => $exam)
                        <option
                            value="{{ $id }}">{{ ucfirst($exam) . ' for '. auth()->user()->course->name }}</option>
                    @endforeach
                </select>


            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Subject :</label>
            <div class="col-sm-9">
                <select class="form-control" name="subjects_id" wire:model="filter.subject_id">
                    <option >Select Subject</option>
                    @if(!empty($this->subjectList))
                        @foreach($this->subjectList->course->subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3 ml-auto mr-auto">

                <button type="submit" class="form-control btn btn-primary" name="submit">Start</button>
            </div>
        </div>

    </form>

</div>
