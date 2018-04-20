<nav id="nav" class="fixed-top navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">

        @if (auth()->user() and (auth()->user()->company_id != 0))
          <a class="navbar-brand" href="{{ auth()->user()->company_id}}/company" title="">
            {{ auth()->user()->company->name}} <small>by {{auth()->user()->company->user->name}}</small>
          </a>
        @else
          <a class="navbar-brand" href="/">Stack-Overflow <small>by Echovisti</small></a>

        @endif

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>



<nav id="nav" class="fixed-top navbar navbar-expand-lg navbar-light bg-light pl-5 pr-5 mb-5 text-white">

      @if (auth()->user() and (auth()->user()->company_id != 0))
        <a class="navbar-brand" href="{{ auth()->user()->company_id}}/company" title="">
          {{ auth()->user()->company->name}} <small>by {{auth()->user()->company->user->name}}</small>
        </a>
          {{-- expr --}}
      @else
        <a class="navbar-brand" href="/">Stack-Overflow <small>by Echovisti</small></a>

      @endif

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          @auth
            <a class="btn btn-outline-light mr-1" href="/company">Company</a>
            <a class="btn btn-outline-light mr-1" href="/{{auth()->user()->company_id}}/question">New Question</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-light mr-1" type="submit">Logout</button>
             </form>
          @else
            <a class="btn btn-outline-light mr-1" href="/login">Log In</a>
            <a class="btn btn-outline-light mr-1" href="/register">Sign up</a>
          @endauth
        </ul>
      </div>
  </nav>
