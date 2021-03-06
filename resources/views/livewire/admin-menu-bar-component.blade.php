<div class="row bg-dark">
    <div class="col-sm-12">
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
            <a class="navbar-brand d-lg-none" href="#">Menu Bar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ request()->is('/admin') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.profile') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item {{ request()->is('admin/subjects*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.subjects') }}">Subjects</a>
                    </li>
                    <li class="nav-item {{ request()->is('admin/course*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.course') }}">Course</a>
                    </li>
                    <li class="nav-item {{ request()->is('admin/exam*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.exam') }}">Exam</a>
                    </li>
                  {{--  <li class="nav-item {{ request()->is('admin/question*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.question') }}">Question</a>
                    </li>--}}
                    <li class="nav-item {{ request()->is('admin/records*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.records') }}">View Record</a>
                    </li>
                    <li class="nav-item {{ request()->is('admin/result*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.result') }}">Result</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
