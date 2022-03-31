@extends('common.master')

@section('content')
    <div class="container">
        <div class="row p-2 top-header">
            <div class="col-sm-3">
                <img src="{{ asset('image/raj.png') }} " style="width:200px">
            </div>
            <div class="col-sm-9 text-light">
                <h1>Online Examination System</h1>
                <span class="pl-5">...because  examination  test the ability</span>
            </div>
        </div>

        <div class="row middle-header">
            <div class="col-sm-12 p-2 text-right">
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            </div>
        </div>

        <div class="row p-5" style="background: #fafafa;">
            <div class="col-sm-6 ml-auto">
                <form method="post" action="{{ route('login') }}">
                    @csrf


                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Password :</label>
                        <div class="col-sm-9">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 ml-auto mr-auto">
                            <button type="submit" class="form-control btn btn-primary" name="submit">Login</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-3">

            </div>
        </div>

        <div class="row" style="background:black;">
            <div class="col-sm-12 p-3 text-right"style="color:white">
                <strong>Developed &amp; Designed By:</strong> CSIT Team<br>
                Kathford College
            </div>
        </div>
    </div>
@endsection
