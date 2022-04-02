<div class="card border border-primary " style="margin-top: 20px">
    <div class="card-block">

        @include('admin.common.validation-message')

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

                    @error('questionFilter.question')
                    <span class="error">{{ $message }}</span>
                    @enderror

                </div>

                @for($i = 1; $i <= 4; $i++ )
                    <div class="form-group">
                        <label>Option {{ $i }}</label>
                        <input type="text" class="form-control" placeholder="Option A" autocomplete="off" wire:model="questionFilter.options.{{ $i }}" name="options">
                    </div>

                    @error('questionFilter.options'.$i)
                    <span class="error">{{ $message }}</span>
                    @enderror

                @endfor

                <div class="form-group">
                    <label>Correct Option</label>
                    <select class="form-control" wire:model="questionFilter.correct_option">
                        @for($i = 1; $i <= 4; $i++ )
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>

                    @error('questionFilter.correct_option')
                    <span class="error">{{ $message }}</span>
                    @enderror


                </div>
                <div>
                    <label ><strong><h3>Recheck The Question Before Adding</h3></strong></label>
                </div>
                <button type="submit" class="btn btn-primary" name="submit"> Add Question</button>
            </form>
        </div>
    </div>
</div>
