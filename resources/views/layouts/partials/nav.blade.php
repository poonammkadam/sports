{{--<div class="collapse bg-inverse" id="navbarHeader">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-sm-8 py-4">--}}
{{--                <h4 class="text-white">About</h4>--}}
{{--                <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>--}}
{{--            </div>--}}
{{--            <div class="col-sm-4 py-4">--}}
{{--                <h4 class="text-white">Contact</h4>--}}
{{--                <ul class="list-unstyled">--}}
{{--                    <li><a href="#" class="text-white">Follow on Twitter</a></li>--}}

{{--                    <li><a href="#" class="text-white">Like on Facebook</a></li>--}}

{{--                    <li><a href="#" class="text-white">Email me</a></li>--}}

{{--                </ul>--}}

{{--            </div>--}}

{{--        </div>--}}

{{--    </div>--}}

{{--</div>--}}

{{--    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--        <div class="container">--}}
{{--            <a class="navbar-brand btn btn-dark btn-sm" href="{{ url('/home') }}">--}}
{{--                My Account--}}
{{--            </a>--}}
{{--            <a class="navbar-brand btn btn-dark btn-sm" href="{{ url('/home') }}">--}}
{{--               Home--}}
{{--            </a>--}}
{{--            <a class="navbar-brand btn btn-dark btn-sm" href="{{ url('/registration') }}">--}}
{{--               Registration--}}
{{--            </a>--}}
{{--            <a class="navbar-brand btn btn-dark btn-sm" href="{{ url('/events') }}">--}}
{{--                Events--}}
{{--            </a>--}}
{{--            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--                <span class="navbar-toggler-icon"></span>--}}
{{--            </button>--}}

{{--            <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                <!-- Left Side Of Navbar -->--}}
{{--                <ul class="navbar-nav mr-auto">--}}

{{--                </ul>--}}

{{--                <!-- Right Side Of Navbar -->--}}
{{--                <ul class="navbar-nav ml-auto">--}}
{{--                    <!-- Authentication Links -->--}}
{{--                    @guest--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                        </li>--}}
{{--                        @if (Route::has('register'))--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                    @else--}}
{{--                        <li class="nav-item dropdown">--}}
{{--                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--                            </a>--}}

{{--                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                   onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                    {{ __('Logout') }}--}}
{{--                                </a>--}}

{{--                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                                    @csrf--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    @endguest--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </nav>--}}

<nav class="navbar navbar-expand-lg navbar-fixed-top">
    <div class="container-fluid">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#myPage">Logo</a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item"><a href="{{ url('/home') }}">HOME</a></li>
                <li class="nav-item"><a href="{{ url('/myprofile') }}"> My Account</a></li>
                <li class="nav-item"><a href="{{ url('/registration') }}">Registration</a></li>
                <li class="nav-item"><a href="{{ url('/events') }}">Event</a></li>
                <li class="nav-item"><a href="{{ url('/organiser') }}">Organiser</a></li>

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="dropdown">
                        <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>  <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a></li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
