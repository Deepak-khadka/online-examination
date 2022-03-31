@if(!empty($this->message['success']))

    <div class="alert alert-success">
        {{ $this->message['success'] }}
    </div>

@endif

@if(!empty($this->message['error']))

    <div class="alert alert-success">
        {{ $this->message['error'] }}
    </div>

@endif
