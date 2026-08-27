<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar profesor</title>

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
    </style>
</head>
<body>
    <main class="container profesores-page">

        <header class="profesores-header">
            <div>
                <h1>Editar profesor</h1>
                <p>Modificar los datos del profesor</p>
            </div>
            <a href="{{ route('profesores.index') }}" class="btn btn-outline-secondary">
                Volver
            </a>
        </header>

        <section class="card profesores-card">
            <div class="card-body p-4">

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <strong>Verifique los siguientes datos:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('profesores.update', $profesor->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control"
                                value="{{ old('nombre', $profesor->nombre) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" id="apellido" name="apellido" class="form-control"
                                value="{{ old('apellido', $profesor->apellido) }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="documento" class="form-label">Documento</label>
                            <input type="text" id="documento" name="documento" class="form-control"
                                value="{{ old('documento', $profesor->documento) }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" id="telefono" name="telefono" class="form-control"
                                value="{{ old('telefono', $profesor->telefono) }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            @php($estadoActual = old('estado', $profesor->estado))
                            <select id="estado" name="estado" class="form-select">
                                <option value="ACTIVO" {{ $estadoActual == 'ACTIVO' ? 'selected' : '' }}>ACTIVO</option>
                                <option value="INACTIVO" {{ $estadoActual == 'INACTIVO' ? 'selected' : '' }}>INACTIVO</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="{{ old('email', $profesor->email) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="especialidad" class="form-label">Especialidad</label>
                            <input type="text" id="especialidad" name="especialidad" class="form-control"
                                value="{{ old('especialidad', $profesor->especialidad) }}">
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('profesores.index') }}" class="btn btn-outline-secondary">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Guardar cambios
                        </button>
                    </div>
                </form>

            </div>
        </section>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
