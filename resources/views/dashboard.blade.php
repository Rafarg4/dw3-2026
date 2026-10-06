<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        .profesores-page {
            padding-top: 20px;
            padding-bottom: 30px;
        }

        .profesores-header {
            margin-bottom: 20px;
        }

        .profesores-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
            color: #2c3e50;
        }

        .profesores-header p {
            margin: 4px 0 0;
            color: #6c757d;
            font-size: 14px;
        }

        .modulo-card {
            display: block;
            height: 100%;
            border: 0;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            color: inherit;
            text-decoration: none;
            transition: box-shadow 0.2s ease, transform 0.2s ease;
        }

        .modulo-card:hover {
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
            transform: translateY(-2px);
        }

        .modulo-card .modulo-titulo {
            font-size: 18px;
            font-weight: 700;
            color: #2c3e50;
        }

        .modulo-card .modulo-total {
            font-size: 32px;
            font-weight: 700;
            color: #0d6efd;
        }
    </style>
</head>
<body>
    @include('partials.menu')

    @php
        $modulos = [
            ['titulo' => 'Profesores', 'descripcion' => 'Administración de profesores', 'ruta' => route('profesores.index'), 'total' => \App\Models\Profesor::count()],
            ['titulo' => 'Materias', 'descripcion' => 'Administración de materias', 'ruta' => route('materias.index'), 'total' => \App\Models\Materia::count()],
            ['titulo' => 'Horarios', 'descripcion' => 'Materias asignadas por día', 'ruta' => route('horarios.index'), 'total' => \App\Models\Horario::count()],
        ];
    @endphp

    <main class="container profesores-page">

        <header class="profesores-header">
            <h1>Dashboard</h1>
            <p>Bienvenido, {{ Auth::user()->name }}</p>
        </header>

        <div class="row g-4">
            @foreach ($modulos as $modulo)
                <div class="col-md-4">
                    <a href="{{ $modulo['ruta'] }}" class="card modulo-card">
                        <div class="card-body p-4">
                            <div class="text-muted small">{{ $modulo['descripcion'] }}</div>
                            <div class="d-flex justify-content-between align-items-baseline mt-2">
                                <span class="modulo-titulo">{{ $modulo['titulo'] }}</span>
                                <span class="modulo-total">{{ $modulo['total'] }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
