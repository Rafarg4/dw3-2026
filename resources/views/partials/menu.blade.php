<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">

        <a class="navbar-brand" href="{{ route('dashboard') }}">
            Sistema Académico
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menuPrincipal">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuPrincipal">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('profesores.*') ? 'active' : '' }}" href="{{ route('profesores.index') }}">
                        Profesores
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('materias.*') ? 'active' : '' }}" href="{{ route('materias.index') }}">
                        Materias
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('horarios.*') ? 'active' : '' }}" href="{{ route('horarios.index') }}">
                        Horarios
                    </a>
                </li>

            </ul>

            @auth
                <div class="d-flex align-items-center gap-3">
                    <span class="navbar-text">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-light">
                            Cerrar sesión
                        </button>
                    </form>
                </div>
            @endauth

        </div>
    </div>
</nav>
