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
                                    </div>
                                    <div class="form-group">
                                        <label for="exam_date">Exam Date</label>
                                        <input type="date" id="exam_date" wire:model="filter.exam_date" class="form-control datepicker" placeholder="Exam Date" name="exam_date">
                                    </div>
                                    <div class="form-group">
                                        <label for="full_marks">Full Marks</label>
                                        <input type="text" id="full_marks" wire:model="filter.full_marks" class="form-control" placeholder="Full Marks" name="full_marks">
                                    </div>
                                    <div class="form-group">
                                        <label for="exam_duration">Exam Duration in Minutes</label>
                                        <input type="text" id="exam_duration" wire:model="filter.exam_duration" class="form-control" placeholder="Exam Duration" name="exam_duration">
                                    </div>
                                    <div class="form-group">
                                        <label for="terms_and_conditions">Terms and Conditions</label>
                                        <textarea class="form-control" wire:model="filter.terms_and_conditions" id="terms_and_conditions" name="terms_and_conditions" placeholder="Terms and Conditions" ></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary"> Add Exam</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="card border border-primary">
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
                                                <span  class="btn btn-danger" wire:click.prevent="delete({{ $exam->id }})"><i class="fa fa-trash"></i></span>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>




