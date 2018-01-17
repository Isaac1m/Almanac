
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Almanac @yield('title')</title>

         <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{!! asset('summernote/dist/summernote.css') !!}" rel="stylesheet">

         <!-- Material Design Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('mdb/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Material Design Bootstrap -->
        <link href="{{ asset('mdb/css/mdb.css') }}" rel="stylesheet">
        @yield('styles')
       
    </head>
    <body>

            <div id="app">
                @include('partials._messages')
                @yield('content')
            </div>


        <script src="{{ asset('js/app.js') }}"> </script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        
        <script type="text/javascript" src="{{ asset('mdb/js/jquery.min.js') }}"></script>

        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="{{ asset('mdb/js/bootstrap.min.js') }}"></script>

        <!-- Material Design Bootstrap -->
        <script type="text/javascript" src="{{ asset('mdb/js/mdb.js') }}"></script>
            @yield('scripts')
        <footer>
            <div class="footer-copyright">
                <div class="container">
                <p>Copyright {{date('Y')}}, <a href=" {{ route('home') }}">Almanac</a> All rights reserved.</p>
                </div>
            </div>
        </footer>
    </body>
</html>