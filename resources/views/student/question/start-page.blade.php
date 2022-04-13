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
