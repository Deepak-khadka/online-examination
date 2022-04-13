<div class="container">

    <h2 class="counter">
        <div id="countdown"></div>
        <div id="counter"></div>
    </h2>

    <div id="counter_temp"></div>

<div class="jumbotron">
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

           var downloadTimer;

           function fn_start() {
               var timeleft = '{{ $this->minute }}';

               clearInterval(downloadTimer);

               downloadTimer = setInterval(function() {
                   document.getElementById("countdown").innerHTML = timeleft + " seconds remaining";
                   timeleft -= 1;
                   if (timeleft <= 0) {
                       clearInterval(downloadTimer);
                       @this.call('verifyAnswer')
                   }
               }, 1000);
           }

            Livewire.on('setCounter', () => {
                fn_start();
            })

           window.addEventListener('focus', () => {
               @this.call('verifyAnswer')
               fn_start();
               @this.set('warning_message', "You have found to be cheated so we skipped this question.")
            })
        }
    </script>

@endpush
