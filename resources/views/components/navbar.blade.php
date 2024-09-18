@if (Route::currentRouteName() == 'welcome')
    <nav class="navbar navbar-expand-lg bg-body-tertiary nav-custom" data-bs-theme="dark">
    @else
        <nav class="navbar navbar-expand-lg bg-body-tertiary nav-custom-other fixed-top" data-bs-theme="dark">
@endif
<div class="container-fluid">
    <img class="img-custom" src="{{ asset('media/logo.png') }}" alt="">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link @if (Route::currentRouteName() == 'welcome') active @endif" aria-current="page"
                    href="{{ route('welcome') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (Route::currentRouteName() == 'article.index') active @endif"
                    href="{{ route('article.index') }}">Articoli</a>
            </li>
            @auth
            @if(Auth::user()->is_revisor)
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-success btn-sm position-relative w-sm-25" href="{{ route('revisor.index') }}" role="button">Zona revisore <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{App\Models\Article::toBeRevisedCount()}}
                    </span>
                    </a>
                </li>
                @endif
            @endauth
            <li class="nav-item dropdown" data-bs-theme="dark">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Categorie
                </a>
                <ul class="dropdown-menu">
                    @foreach ($categories as $category)
                        <li><a class="dropdown-item"
                                href="{{ route('article.byCategory', ['category' => $category]) }}">{{ $category->name }}</a>
                        </li>
                        @if (!$loop->last)
                            <hr class="dropdown-divider">
                        @endif
                    @endforeach
                </ul>
            </li>
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-fill"></i> {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" data-bs-theme="">
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item" type="submit"><i class="bi bi-person-fill-dash"></i>
                                    Logout</button>
                            </form>
                        </li>

                    </ul>
                </li>
            @else
                <li class="nav-item dropdown" data-bs-theme="dark">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-fill"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('register') }}"><i class="bi bi-person-plus-fill"></i>
                                Registrati</a></li>
                        <hr class="dropdown-divider">
                        <li><a class="dropdown-item" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right"></i>
                                Login</a></li>
                    </ul>
                </li>

            @endauth
        </ul>
        <form class="d-flex ms-auto" role="search" action="{{ route('article.search') }}" method="GET">
            <div class="input-group">
                <input type="search" name="query" class="form-control" placeholder="Search" aria-label="search">
                <button type="submit" class="input-group-text btn btn-outline-success" id="basic-addon2">
                    Search
                </button>
            </div>
        </form>
    </div>
</div>
</nav>
