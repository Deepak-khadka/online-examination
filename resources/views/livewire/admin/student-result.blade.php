<div>
    <center><strong>Please Select Exam and Enter Student Name To View Result of Student!! </strong></center>

    <div class="row p-5" style="background: #fafafa;">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">

            <form wire:submit.prevent="showReport">
                <div class="form-group row">

                </div>

                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Select Exam:</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="exam_name" wire:model="filter.exam_id">
                            <option value="">Select exam</option>
                            @foreach($data['exam'] as $exam)
                                <option value="{{ $exam['id'] }}">{{ $exam->course->name . ' - '. $exam['name'] }}</option>
                            @endforeach

                        </select>

                        @error('filter.exam_id')
                        <span class="error">
                                    {{ $message }}
                                </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Enter Name of student:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="" name="student_name"
                               placeholder="Enter Name of Student" wire:model="filter.student_name">

                        @error('filter.student_name')
                        <span class="error">
                                    {{ $message }}
                                </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 ml-auto">
                        <button class="btn btn-primary" name="submit" type="submit">View</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    @if(count($this->results) > 0)

        <div class="form-group row">
            <table class="table" border="1px solid black">
                <thead>
                <tr>
                    <th>SN</th>
                    <th>SUBJECTS</th>
                    <th>SCORE</th>
                </tr>
                </thead>

                @php
                   $i = 1
                @endphp
                @foreach($this->results as $subject => $result)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $subject }}</td>
                        <td>{{ $result }}</td>
                    </tr>
                @endforeach
            </table>


            <div class="col-sm-3 ml-auto mr-auto">
                <a href="{{ route('admin.dashboard') }}" type="submit" class="form-control btn btn-primary" name="back">Proceed To Back</a>
            </div>
        </div>

    @elseif($this->resultNotFound)
        <h4><strong style="color:red;">Sorry!!<br> Please Enter Valid Name.</strong></h4>

    @endif
</div>
