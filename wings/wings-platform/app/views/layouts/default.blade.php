<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div class="container">

    <header>
        @include('includes.header')
    </header>

    <div id="main" class="row">
        @if(Session::has('message'))
            <p class="alert">{{ Session::get('message') }}</p>
        @endif

        @yield('content')

    </div>

    <footer class="row">
        @include('includes.footer')
    </footer>

</div>
</body>
</html>