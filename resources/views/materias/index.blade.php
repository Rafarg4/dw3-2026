<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profesores</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        .profesores-page {
            padding-top: 20px;
            padding-bottom: 30px;
        }

        .profesores-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            gap: 15px;
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

        .profesores-card {
            border: 0;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .profesores-card .card-body {
            padding: 0;
        }

        .profesores-table {
            margin-bottom: 0;
        }

        .profesores-table thead th {
            background-color: #f5f7fa;
            color: #495057;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            border-bottom: 1px solid #dee2e6;
            padding: 14px 12px;
            white-space: nowrap;
        }

        .profesores-table tbody td {
            padding: 13px 12px;
            vertical-align: middle;
            color: #343a40;
            font-size: 14px;
        }

        .profesores-table tbody tr {
            transition: background-color 0.2s ease;
        }

        .profesores-table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .estado-activo,
        .estado-inactivo {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .estado-activo {
            background-color: #d1e7dd;
            color: #0f5132;
        }

        .estado-inactivo {
            background-color: #e2e3e5;
            color: #41464b;
        }

        .acciones-profesor {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .acciones-profesor .btn {
            border-radius: 6px;
            padding: 5px 10px;
            font-size: 13px;
        }

        @media (max-width: 768px) {
            .profesores-header {
                flex-direction: column;
                align-items: stretch;
            }

            .profesores-table {
                min-width: 900px;
            }
        }
    </style>
</head>
<body>
    @include('partials.menu')
    <main class="container profesores-page">

        <header class="profesores-header">
            <div>
                <h1>Materia</h1>
                <p>Administración de materia</p>
            </div>
             <a href="{{ route('materias.create') }}" class="btn btn-primary">
                Nueva Materia
            </a>
        </header>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <section class="card profesores-card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle profesores-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nobmre</th>
                                <th>Profesor</th>
                                <th>Descripcion</th>
                                <th>Codigo</th>
                                <th>Estado</th>
                                <th width="150">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($materias as $mate)
                                <tr>
                                    <td>{{ $mate->id }}</td>
                                    <td>{{ $mate->nombre }}</td>
                                     <td>{{ $mate->profesor->nombre }} {{ $mate->profesor->apellido}}</td>
                                    <td>{{ $mate->descripcion }}</td>
                                    <td>{{ $mate->codigo }}</td>
                                    <td>
                                        @if ($mate->estado == 'ACTIVO')
                                            <span class="estado-activo">ACTIVO</span>
                                        @else
                                            <span class="estado-inactivo">{{ $mate->estado }}</span>
                                        @endif
                                    </td>
                                    <td>
                        
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        No existen materias registrados.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
