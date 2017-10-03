
 @include('partials._header')

            <div id="app">
                @include('partials._messages')
                @yield('content')
            </div>


   @include('partials._footer')