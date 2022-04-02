<div class="card border border-primary " style="margin-top: 20px">
    <div class="card-block">
        <div class="card-header bg-primary text-light">
            <h5><i class="fa fa-question-circle"></i> Add New Question for {{ $this->subject->name }}</h5>
        </div>
        <div class="card-body">

            <form wire:submit.prevent="submitQuestion">

                <div>
                    <label ><strong><h3>Please fill The Question Correctly</h3></strong></label>
                </div>
                <div class="form-group">
                    <label>Question</label>
                    <textarea class="form-control question_paper" wire:model="questionFilter.question" name="question" autocomplete="off" placeholder="Question here"></textarea>
                </div>
                <div class="form-group">
                    <label>Option A</label>
                    <input type="text" class="form-control" placeholder="Option A" required="" autocomplete="off" name="opt_a">
                </div>
                <div class="form-group">
                    <label>Option B</label>
                    <input type="text" class="form-control" placeholder="Option B" required="" autocomplete="off" name="opt_b">
                </div>
                <div class="form-group">
                    <label>Option C</label>
                    <input type="text" class="form-control" placeholder="Option C" required="" autocomplete="off" name="opt_c">
                </div>
                <div class="form-group">
                    <label>Option D</label>
                    <input type="text" class="form-control" placeholder="Option D" required="" autocomplete="off" name="opt_d">
                </div>
                <div class="form-group">
                    <label>Correct Option</label>
                    <select class="form-control" name="correct_option" required="">
                        <option value="">Select Correct Option</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </div>
                <div>
                    <label ><strong><h3>Recheck The Question Before Adding</h3></strong></label>
                </div>

                <input type="hidden" name="exam_id" value="">

                <input type="hidden" name="subject_id" value="">
                <button type="submit" class="btn btn-primary" name="submit"> Add Question</button>
            </form>
        </div>
    </div>
</div>
