{{--
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
--}}

@extends('common.master')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row middle-header">
        <div class="col-sm-12 p-2 text-right">
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        </div>
    </div>
    <div class="row p-5" style="background: #fafafa;">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
            <form method="post" action="{{ route('register') }}">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">User Name :-</label>
                    <div class="col-sm-7">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name', 'required']) !!}

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Password :-</label>
                    <div class="col-sm-7">
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter Password', 'required']) !!}

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Confirm Password :-</label>
                    <div class="col-sm-7">
                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password', 'required']) !!}

                        @error('confirm_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Email Address :-</label>
                    <div class="col-sm-7">
                        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email', 'required']) !!}

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Mobile Number :-</label>
                    <div class="col-sm-7">
                        {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => 'Enter Mobile Number', 'required']) !!}

                        @error('mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Address :-</label>
                    <div class="col-sm-7">
                        {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Enter Address', 'required']) !!}

                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">City :-</label>
                    <div class="col-sm-7">
                        {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'Enter City', 'required']) !!}

                        @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Pin :-</label>
                    <div class="col-sm-7">

                        {!! Form::number('pin', null, ['class' => 'form-control', 'placeholder' => 'Enter Pin', 'required']) !!}

                        @error('pin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Select Course :-</label>
                    <div class="col-sm-7">

                        {!! Form::select('course_id', $data['courses'], null, ['class' => 'form-control', 'placeholder' => 'Select Course', 'required']) !!}

                        @error('course_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <br>
                <div class="form-group row">
                    <div class="col-sm-4 ml-auto">
                        <button class="btn btn-primary" type="submit">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
