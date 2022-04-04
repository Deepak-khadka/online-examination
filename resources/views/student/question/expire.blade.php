@extends('student.layouts.master')

@section('content')

    <h5>
        You are not allowed to continue to this exam.

        <a href="{{ route('student.home') }}">Back to Home</a>
    </h5>

@endsection
