<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">

        <a class="navbar-brand" href="{{ route('profesores.index') }}">
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
                    <a class="nav-link" href="{{ route('profesores.index') }}">
                        Profesores
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('materias.index') }}">
                        Materias
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>