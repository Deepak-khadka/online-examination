<!DOCTYPE html>
<html>
  @include('admin.layouts.partials.header')
  @livewireStyles
<body>
<div class="container">
    <div class="row p-2 top-header">
        <div class="col-sm-3">
            <img src="{{ asset('image/raj.png') }}"style="width:200px">
        </div>
        <div class="col-sm-9 text-light">
            <h1>Online Examination System</h1>
            <span class="pl-5">...because  examination  test the ability</span>
        </div>
    </div>

    <div class="row middle-header">
        <div class="col-sm-12 p-2 text-right">
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ auth()->user()->name }}
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('admin.profile') }}">Profile</a>
                </div>
            </div>

            <div class="btn-group">
                <a class="btn btn-danger" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>

  @livewire('admin-menu-bar-component')

@yield('content')

@include('admin.layouts.partials.footer')
@livewireScripts
</body>
</html>
