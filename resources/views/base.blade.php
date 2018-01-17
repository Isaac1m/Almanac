
 <!doctype html>
<html lang="{{ app()->getLocale() }}">
 @include('partials._header')
<body>
            <div id="app">
                @include('partials._messages')
                @yield('content')
            </div>


   @include('partials._footer')
   </body>
</html>