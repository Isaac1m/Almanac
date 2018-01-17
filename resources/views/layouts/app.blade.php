<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Almanac @yield('title')</title>

    <!-- Styles -->

    <link href="{!! asset('summernote/dist/summernote.css') !!}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{  asset('css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}">
    
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-static-top" >
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Public site
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    {{--  Left Side of Navbar  --}}
                    <ul class="nav navbar-nav navbar-left">
                        <!-- Authentication Links -->
                        @guest

                        @else
                            <li class='nav-item'><a href="{{ route('faculties.index') }}">Faculties</a></li> 

                        @endguest
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                             <li><a href="{{ route('documents.create') }}"><span><i class="fa fa-plus fa-lg menu-icon"></i></span> Docs</a></li>
                              <li><a href="{{ route('faculties.create') }}"><span><i class="fa fa-plus fa-lg menu-icon"></i></span> Faculty</a></li>
                               <li><a href="{{ route('depts.create') }}"><span><i class="fa fa-plus fa-lg menu-icon"></i></span> Dept</a></li>
                            

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @include('partials._messages')
        @yield('content')
    </div>
    @include('partials._footer')
    @yield('scripts')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{!! asset('summernote/dist/summernote.min.js') !!}"></script>

<script>
	$(document).ready(function() {
		$('#summernote').summernote({
			height:150,
		});
	});
</script>
<script src="{{ asset('js/parsley.min.js') }}"></script>

</body>
</html>
