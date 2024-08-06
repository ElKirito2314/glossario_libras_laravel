<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="{{ route('site.index') }}">
        <img src="{{ asset('img/logo.png') }}" class="img-fluid" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <div class="menu">
                @guest
                
                @if (Route::has('login'))
                    <li>
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
                
                @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}">{{ __('Cadastrar') }}</a>
                    </li>
                @endif
            @else
            <li><a href="{{ route('app.home') }}" >Home</a></li>
                <li>
                    <a href="#" role="button" >
                        {{ Auth::user()->name }}
                    </a>

                        <a href="{{ route('logout') }}" 
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right"></i>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                </li>
            @endguest
            </div>
        </ul>
    </div>
</nav>
