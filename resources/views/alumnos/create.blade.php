```blade
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuevo alumno</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        .alumnos-page {
            padding-top: 20px;
            padding-bottom: 30px;
        }

        .alumnos-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            gap: 15px;
        }

        .alumnos-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
            color: #2c3e50;
        }

        .alumnos-header p {
            margin: 4px 0 0;
            color: #6c757d;
            font-size: 14px;
        }

        .alumnos-card {
            border: 0;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }
    </style>
</head>

<body>

    @include('partials.menu')

    <main class="container alumnos-page">

        <header class="alumnos-header">
            <div>
                <h1>Nuevo alumno</h1>
                <p>Registrar un nuevo alumno</p>
            </div>

            <a href="{{ route('alumnos.index') }}" class="btn btn-outline-secondary">
                Volver
            </a>
        </header>

        <section class="card alumnos-card">
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

                <form action="{{ route('alumnos.store') }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    {{-- Nombre y Apellido --}}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre" class="form-label">
                                Documento <span class="text-danger">*</span>
                            </label>
                     <input type="text"
                                id="documento"
                                name="documento"
                                class="form-control @error('documento') is-invalid @enderror"
                                value="{{ old('documento') }}"
                                placeholder="Ingrese el documento">

                            @error('documento')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nombre" class="form-label">
                                Nombre <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                id="nombre"
                                name="nombre"
                                class="form-control @error('nombre') is-invalid @enderror"
                                value="{{ old('nombre') }}"
                                placeholder="Ingrese el nombre">

                            @error('nombre')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="apellido" class="form-label">
                                Apellido <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                id="apellido"
                                name="apellido"
                                class="form-control @error('apellido') is-invalid @enderror"
                                value="{{ old('apellido') }}"
                                placeholder="Ingrese el apellido">

                            @error('apellido')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- NUEVO: Fecha de nacimiento --}}
                        <div class="col-md-6 mb-3">
                            <label for="fecha_nac" class="form-label">
                                Fecha de nacimiento <span class="text-danger">*</span>
                            </label>
                            <input type="date"
                                id="fecha_nac"
                                name="fecha_nac"
                                class="form-control @error('fecha_nac') is-invalid @enderror"
                                value="{{ old('fecha_nac') }}"
                                max="{{ date('Y-m-d') }}">

                            @error('fecha_nac')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    {{-- Email y Teléfono --}}
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">
                                Email <span class="text-danger">*</span>
                            </label>

                            <input type="email"
                                id="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}"
                                placeholder="correo@ejemplo.com">

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="telefono" class="form-label">
                                Teléfono
                            </label>

                            <input type="text"
                                id="telefono"
                                name="telefono"
                                class="form-control @error('telefono') is-invalid @enderror"
                                value="{{ old('telefono') }}"
                                placeholder="Ej: 0981 123 456">

                            @error('telefono')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    {{-- Dirección --}}
                    <div class="mb-3">

                        <label for="direccion" class="form-label">
                            Dirección
                        </label>

                        <input type="text"
                            id="direccion"
                            name="direccion"
                            class="form-control @error('direccion') is-invalid @enderror"
                            value="{{ old('direccion') }}"
                            placeholder="Ingrese la dirección">

                        @error('direccion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Observación --}}
                    <div class="mb-3">

                        <label for="observacion" class="form-label">
                            Observación
                        </label>

                        <textarea
                            id="observacion"
                            name="observacion"
                            rows="4"
                            class="form-control @error('observacion') is-invalid @enderror"
                            placeholder="Ingrese alguna observación">{{ old('observacion') }}</textarea>

                        @error('observacion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Foto --}}
                    <div class="mb-4">

                        <label for="foto" class="form-label">
                            Foto
                        </label>

                        <input type="file"
                            id="foto"
                            name="foto"
                            class="form-control @error('foto') is-invalid @enderror"
                            accept="image/jpeg,image/png,image/jpg">

                        <div class="form-text">
                            Formatos permitidos: JPG, JPEG y PNG.
                        </div>

                        @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <hr>

                    {{-- Botones --}}
                    <div class="d-flex justify-content-end gap-2">

                        <a href="{{ route('alumnos.index') }}"
                            class="btn btn-outline-secondary">
                            Cancelar
                        </a>

                        <button type="submit" class="btn btn-primary">
                            Guardar alumno
                        </button>

                    </div>

                </form>

            </div>
        </section>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
```