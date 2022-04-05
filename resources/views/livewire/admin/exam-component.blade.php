<div>
    <div class="row py-3" style="background: #fafafa;">
        <div class="container">

            @include('admin.common.message')

            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-2">
                    <div class="card border border-primary">
                        <div class="card-block">
                            <div class="card-header bg-primary text-light">
                                <h5><i class="fa fa-book"></i> Add New Exam</h5>
                            </div>
                            <div class="card-body">
                                <form  wire:submit.prevent="save">
                                    <div class="form-group">
                                        <label for="course_id">Course</label>
                                        <select class="form-control" wire:model="filter.course_id" id="course_id" name="course_id" required="">
                                            <option value="">Select Course</option>
                                            @foreach($this->courseList as $id => $course)
                                                <option value="{{ $id }}">{{ $course }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Exam Name</label>
                                        <input type="text" wire:model="filter.name" id="name" class="form-control" placeholder="Exam Name" name="name">

                                        @error('filter.name')
                                             <span class="error">{{ $message }}</span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="exam_date">Exam Date</label>
                                        <input type="date" id="exam_date" wire:model="filter.exam_date" class="form-control datepicker" placeholder="Exam Date" name="exam_date">

                                        @error('filter.exam_date')
                                        <span class="error">{{ $message }}</span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="full_marks">Full Marks</label>
                                        <input type="text" id="full_marks" wire:model="filter.full_marks" class="form-control" placeholder="Full Marks" name="full_marks">

                                        @error('filter.full_marks')
                                        <span class="error">{{ $message }}</span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="exam_duration">Exam Duration in Minutes</label>
                                        <input type="text" id="exam_duration" wire:model="filter.exam_duration" class="form-control" placeholder="Exam Duration in second" name="exam_duration">

                                        @error('filter.exam_duration')
                                        <span class="error">{{ $message }}</span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="terms_and_conditions">Terms and Conditions</label>
                                        <textarea class="form-control" wire:model="filter.terms_and_conditions" id="terms_and_conditions" name="terms_and_conditions" placeholder="Terms and Conditions" ></textarea>

                                        @error('filter.terms_and_conditions')
                                        <span class="error">{{ $message }}</span>
                                        @enderror

                                    </div>
                                    <button type="submit" class="btn btn-primary"> Add Exam</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-12">

                    <div class="card border border-primary">
                        @if(!empty($this->displayExamSubjects))

                            <div class="card-block">
                                <div class="card-header bg-primary text-light">
                                    <div class="row">
                                        <h5><i class="fa fa-book"></i> Subject Lists</h5>
                                    </div>
                                    <div class="pull-right">
                                        <span  class="btn btn-sm btn-primary" wire:click.prevent="toggleDisplay">Back</span>
                                    </div>

                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-stripped" style="font-size: 14px;">
                                        <thead>
                                        <th>Subject Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        </thead>
                                        <tbody>
                                        @foreach($this->displayExamSubjects->course->subjects as $subject)
                                            <tr>
                                                <td>{{ $subject->name }}</td>
                                                <td>{{ \App\Foundation\Lib\Status::$current[$subject->is_active] }}</td>
                                                <td class="flex" >
                                                    <i class="fa fa-plus btn btn-sm btn-secondary" style="cursor: pointer" title="Add Question" wire:click.prevent="addQuestions({{ $subject->id }})"></i>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @else
                            <div class="card-block">
                                <div class="card-header bg-primary text-light">
                                    <h5><i class="fa fa-book"></i> Exam Lists</h5>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-stripped" style="font-size: 14px;">
                                        <thead class="alert-danger">
                                        <th>Course Name</th>
                                        <th>Exam Name</th>
                                        <th>Exam Date</th>
                                        <th>Full Marks</th>
                                        <th>Exam Duration</th>
                                        <th>Action</th>
                                        </thead>
                                        <tbody>

                                        @foreach($this->examList as $exam)
                                            <tr>
                                                <td>{{ $exam->course->name }}</td>
                                                <td>{{ $exam->name }}</td>
                                                <td>{{ $exam->exam_date }}</td>
                                                <td>{{ $exam->full_marks }}</td>
                                                <td>{{ $exam->exam_duration }}</td>
                                                <td>
                                                    <span class="btn btn-sm btn-success" wire:click.prevent="showSubjects({{ $exam->id }})" style="cursor:pointer;" title="Show Subject"><i class="fa fa-eye"></i></span>
                                                    <span class="btn btn-sm btn-danger" wire:click.prevent="delete({{ $exam->id }})" style="cursor:pointer;" title="Delete"><i class="fa fa-trash"></i></span>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>

                    @if($this->showQuestionForm)
                        @include('livewire.admin.exam.question')
                    @endif
                </div>
            </div>

        </div>

    </div>
</div>




