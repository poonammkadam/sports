<nav class="navbar navbar-expand-lg navbar-fixed-top">
    <a class="navbar-brand" href="#">Logo</a>
        <button type="button" class="navbar-toggle collapsed ml-auto" data-toggle="collapse" data-target="#navbarNavDropdown" aria-expanded="false">
            <span class="glyphicon glyphicon-align-justify"></span>
          </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="nav navbar-nav navbar-right m-2">
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
                <li class="nav-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="nav-item"><a href="{{ url('/results') }}">Results</a></li>
                @if(Auth::check() && Auth::user()->isAdmin())
                  <li class="nav-item"><a href="{{ url('/admin') }}"> Dashboard</a></li>
                @else
                <li class="nav-item"><a href="{{ url('/events') }}">Event</a></li>
                    @if(auth()->user()->role == 'organiser')
                    <li class="nav-item"><a href="{{ url('/myorganisation') }}"> My Organisation</a></li>
                    @else
                        <li class="nav-item"><a href="{{ url('/myprofile') }}"> My Account</a></li>
                        <li class="nav-item"><a href="{{ url('/myresult') }}"> My Result</a></li>
                        <li class="nav-item"><a href="{{ url('/registration') }}">Registration</a></li>
                    @endif
                @endif

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{url('/logout')}}"
                              >
                                {{ __('Logout') }}
                            </a>

                    </li>
                @endguest
            </ul>
        </div>
</nav>
