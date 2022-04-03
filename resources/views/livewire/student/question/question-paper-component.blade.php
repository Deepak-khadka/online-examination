<div class="container">

    <div class="jumbotron">

        <h1>Welcome To Online Examination system</h1>
        <h2 style="color:red;">During Giving Exam, Do not Open another tab</h2>
        <form wire:submit.prevent="verifyAnswer">
            <div class="card">
                <div class="card-header">
                    <strong>Question - {{ $this->question->question }}</strong>
                </div>
                <div class="card-body">

                    <div class="row">

                        <div class="col-6">
                            <div class="form-check">
                               @foreach($this->question->options as $key => $option)
                                    <input wire:model="answer" class="form-check-input" type="radio" id="answer" value="{{ $key }}" required="required" name='answer'>
                                    <label for="answer">{{ $option }}</label>
                                    <br>
                                @endforeach
                                <br>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <div class="col-sm-3 ml-auto mr-auto">
                    <button type="submit" class="form-control btn btn-primary" name="submit">Next</button>
                </div>
            </div>
        </form>
    </div>

</div>

@push('scripts')

    <script type='text/javascript'>

        window.onload = function() {
            window.addEventListener('focus', () => {
                window.location.replace("{{ route('test') }}" );
            })
        }
    </script>

@endpush
