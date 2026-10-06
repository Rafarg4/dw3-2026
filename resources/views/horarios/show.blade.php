<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Datos del horario</title>

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
        }

        .detalle-table thead th {
            background-color: #f5f7fa;
            color: #495057;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
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
    </style>
</head>
<body>
    @include('partials.menu')
    <main class="container profesores-page">

        <header class="profesores-header">
            <div>
                <h1>Horario del {{ $horario->dia_nombre }}</h1>
                <p>Materias asignadas para el día</p>
            </div>
            <a href="{{ route('horarios.index') }}" class="btn btn-outline-secondary">
                Volver
            </a>
        </header>

        <section class="card profesores-card">
            <div class="card-body p-4">

                <dl class="row mb-0">
                    <dt class="col-md-6 text-muted fw-normal">Día</dt>
                    <dd class="col-md-6 fw-bold">{{ $horario->dia_nombre }}</dd>
                </dl>

                <dl class="row mb-0">
                    <dt class="col-md-6 text-muted fw-normal">Observación</dt>
                    <dd class="col-md-6 fw-bold">{{ $horario->observacion ?? '-' }}</dd>
                </dl>

                <dl class="row mb-0">
                    <dt class="col-md-6 text-muted fw-normal">Estado</dt>
                    <dd class="col-md-6">
                        @if ($horario->estado === 'ACTIVO')
                            <span class="estado-activo">ACTIVO</span>
                        @else
                            <span class="estado-inactivo">INACTIVO</span>
                        @endif
                    </dd>
                </dl>

                <hr>

                <h2 class="h6 fw-bold mb-3">Materias del día</h2>

                <div class="table-responsive">
                    <table class="table table-striped align-middle detalle-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Materia</th>
                                <th>Código</th>
                                <th>Profesor</th>
                                <th>Hora inicio</th>
                                <th>Hora fin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($horario->detalles as $detalle)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ optional($detalle->materia)->nombre }}</td>
                                    <td>{{ optional($detalle->materia)->codigo }}</td>
                                    <td>
                                        @if ($detalle->materia && $detalle->materia->profesor)
                                            {{ $detalle->materia->profesor->nombre }} {{ $detalle->materia->profesor->apellido }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $detalle->hora_inicio ? substr($detalle->hora_inicio, 0, 5) : '-' }}</td>
                                    <td>{{ $detalle->hora_fin ? substr($detalle->hora_fin, 0, 5) : '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        No hay materias asignadas.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <hr>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('horarios.edit', $horario->id) }}" class="btn btn-warning">
                        Editar
                    </a>
                    <a href="{{ route('horarios.index') }}" class="btn btn-outline-secondary">
                        Volver
                    </a>
                </div>

            </div>
        </section>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
