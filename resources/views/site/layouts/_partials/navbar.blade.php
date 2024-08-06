<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="{{ route('site.index') }}">
        <img src="{{ asset('img/logo.png') }}" class="img-fluid" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('site.sobrenos') }}">Sobre Nós</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('site.contato') }}">Contato</a>
            </li>
        </ul>
    </div>
</nav>
