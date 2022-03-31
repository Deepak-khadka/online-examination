
@extends('admin.layouts.master')

@section('content')
<div class="row p-5" style="background: #fafafa;">
          <div class="col-sm-3">
            <div class="jumbotron jumbotron-fluid bg-primary text-center">
              <a href="course.php" class="text-light">
              <div class="container">
                <i class="fa fa-book"></i><br>
                Course
              </div>
            </a>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="jumbotron jumbotron-fluid bg-primary text-center">
              <a href="subjects.php" class="text-light">
              <div class="container">
                <i class="fa fa-book"></i><br>
                Subjects
              </div>
            </a>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="jumbotron jumbotron-fluid bg-primary text-center">
              <a href="exam.php" class="text-light">
              <div class="container">
                <i class="fa fa-book"></i><br>
                Exams
              </div>
            </a>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="jumbotron jumbotron-fluid bg-primary text-center">
              <a href="qustionmiddle.php" class="text-light">
              <div class="container">
                <i class="fa fa-book"></i><br>
                Question
              </div>
            </a>
            </div>
          </div>
        </div>

@endsection

