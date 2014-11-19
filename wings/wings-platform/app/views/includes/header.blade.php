<a id="logo" href="/"><h1>WINGS</h1></a>
<nav id="toolbarmenu">
    <ul class="nav">
        @if(!Auth::check())
            <li>{{ HTML::link('login/register', 'Register') }}</li>
            <li>{{ HTML::link('login/', 'Login') }}</li>
        @else
            <li>{{ HTML::link('login/logout', 'logout') }}</li>
        @endif
    </ul>
</nav>
<nav id="mainmenu">
    <ul class="nav">
        <li><a href="/">Home</a></li>
        <li><a href="/learn">Learn</a></li>
        <li><a href="/discover">Discover</a></li>
        <li><a href="/support">Support</a></li>
    </ul>
</nav>