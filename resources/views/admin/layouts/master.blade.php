<!DOCTYPE html>
<html>
  @include('admin.layouts.partials.header')
<body>
<div class="container">
    <div class="row p-2 top-header">
        <div class="col-sm-3">
            <img src="../images/raj.png "style="width:200px">
        </div>
        <div class="col-sm-9 text-light">
            <h1>Online Examination System</h1>
            <span class="pl-5">...because  examination  test the ablility</span>
        </div>
    </div>

    <div class="row middle-header">
        <div class="col-sm-12 p-2 text-right">
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ auth()->user()->name }}
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="profile.php">Profile</a>
                </div>
            </div>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

@include('admin.layouts.partials.sidebar')

@yield('content')

@include('admin.layouts.partials.footer')
</body>
</html>
