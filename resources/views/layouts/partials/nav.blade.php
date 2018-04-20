<nav id="nav" class="fixed-top navbar navbar-expand-lg navbar-light bg-light pl-5 pr-5 mb-5 text-white">

      @if (auth()->user() and (auth()->user()->company_id != 0))
        <a class="navbar-brand" href="/{{ auth()->user()->company_id}}/company" title="">
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
