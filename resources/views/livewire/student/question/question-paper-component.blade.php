<div>
    <div class="container">


        @if($this->startMessage)

            <div class="form-group row">
                <div class="col-sm-12">
                    <form wire:submit.prevent="verifyAnswer">
                        @csrf
                        <h1>Welcome To Our Exam System</h1>
                        <h3><strong style="color:red;">Please follow the term and condition!!</strong></h3>
                        <h2>Each question carry Equal marks</h2>
                        <div class="form-group row">
                            <div class="col-sm-3 ml-auto mr-auto">
                                <button type="submit" class="form-control btn btn-primary">Let\'s Start</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        @else

            <div class="jumbotron">
                <div id="countdown"></div>

                <h1>Welcome To Online Examination system</h1>
                <h2 >
                    During Giving Exam, Do not Open another tab
                </h2>
                <p style="color:red;">
                    @if(isset($this->warning_message))
                        {{ $this->warning_message }}
                    @endif
                </p>
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
                                            <input wire:model.defer="answer" class="form-check-input" type="radio" id="answer" value="{{ $key }}" required="required" name='answer'>
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

                    {{--<div class="form-group row">
                        <div class="col-sm-3 ml-auto mr-auto">

                            <button type="submit" class="form-control btn btn-primary" name="submit">Next</button>
                        </div>
                    </div>--}}
                </form>
            </div>
        @endif

    </div>
</div>

@push('scripts')

    <script type='text/javascript'>

        window.onload = function() {
            var interval;

            Livewire.on('setCounter', time => {
                var timer2 = time;
                $('#counter').attr('id', 'disabled');
                var interval = setInterval(function() {
                    var timer = timer2.split(':');
                    var minutes = parseInt(timer[0], 10);
                    var seconds = parseInt(timer[1], 10);
                    --seconds;
                    minutes = (seconds < 0) ? --minutes : minutes;
                    if (minutes < 0) clearInterval(interval);
                    seconds = (seconds < 0) ? 59 : seconds;
                    seconds = (seconds < 10) ? '0' + seconds : seconds;
                    if(minutes < 0) {
                        @this.call('verifyAnswer')
                    }

                    $('#countdown').html(minutes + ':' + seconds);
                    timer2 = minutes + ':' + seconds;
                }, 1000);
            })

            window.addEventListener('focus', () => {
                @this.call('verifyAnswer')
                @this.set('warning_message', "You have found to be cheated so we skipped this question.")
            })
        }
    </script>

@endpush

