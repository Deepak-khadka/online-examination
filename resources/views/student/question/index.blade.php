@extends('student.layouts.master')

@section('content')

    <livewire:student.question-paper-component :data="$data" />

@endsection
