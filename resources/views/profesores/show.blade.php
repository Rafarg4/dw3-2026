<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Datos del profesor</title>

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
    <main class="container profesores-page">

        <header class="profesores-header">
            <div>
                <h1>Datos del profesor</h1>
                <p>Información registrada del profesor</p>
            </div>
            <a href="{{ route('profesores.index') }}" class="btn btn-outline-secondary">
                Volver
            </a>
        </header>

        <section class="card profesores-card">
            <div class="card-body p-4">

                <dl class="row mb-0">
                    <dt class="col-md-6 text-muted fw-normal">Nombre</dt>
                    <dd class="col-md-6 fw-bold">{{ $profesor->nombre }}</dd>
                </dl>

                <dl class="row mb-0">
                    <dt class="col-md-6 text-muted fw-normal">Apellido</dt>
                    <dd class="col-md-6 fw-bold">{{ $profesor->apellido }}</dd>
                </dl>

                <dl class="row mb-0">
                    <dt class="col-md-6 text-muted fw-normal">Documento</dt>
                    <dd class="col-md-6 fw-bold">{{ $profesor->documento ?? '-' }}</dd>
                </dl>

                <dl class="row mb-0">
                    <dt class="col-md-6 text-muted fw-normal">Teléfono</dt>
                    <dd class="col-md-6 fw-bold">{{ $profesor->telefono ?? '-' }}</dd>
                </dl>

                <dl class="row mb-0">
                    <dt class="col-md-6 text-muted fw-normal">Estado</dt>
                    <dd class="col-md-6">
                        @if ($profesor->estado === 'ACTIVO')
                            <span class="estado-activo">ACTIVO</span>
                        @else
                            <span class="estado-inactivo">INACTIVO</span>
                        @endif
                    </dd>
                </dl>

                <dl class="row mb-0">
                    <dt class="col-md-6 text-muted fw-normal">Email</dt>
                    <dd class="col-md-6 fw-bold">{{ $profesor->email ?? '-' }}</dd>
                </dl>

                <dl class="row mb-0">
                    <dt class="col-md-6 text-muted fw-normal">Especialidad</dt>
                    <dd class="col-md-6 fw-bold">{{ $profesor->especialidad ?? '-' }}</dd>
                </dl>

                <hr>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('profesores.edit', $profesor->id) }}" class="btn btn-warning">
                        Editar
                    </a>
                    <a href="{{ route('profesores.index') }}" class="btn btn-outline-secondary">
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
