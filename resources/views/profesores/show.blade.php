<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<div class="container profesores-page">

    <div class="profesores-header">

        <div>
            <h3>Datos del Profesor</h3>
            <p>Información registrada del profesor</p>
        </div>

        <div>

        </div>

    </div>


    <div class="card profesores-card">

        <div class="card-body p-4">

            <div class="row">

                <div class="col-md-6 mb-4">
                    <label class="text-muted">
                        Nombre
                    </label>

                    <div class="fw-bold">
                        {{ $profesor->nombre }}
                    </div>
                </div>


                <div class="col-md-6 mb-4">
                    <label class="text-muted">
                        Apellido
                    </label>

                    <div class="fw-bold">
                        {{ $profesor->apellido }}
                    </div>
                </div>

            </div>


            <div class="row">

                <div class="col-md-4 mb-4">

                    <label class="text-muted">
                        Documento
                    </label>

                    <div class="fw-bold">
                        {{ $profesor->documento ?? '-' }}
                    </div>

                </div>


                <div class="col-md-4 mb-4">

                    <label class="text-muted">
                        Teléfono
                    </label>

                    <div class="fw-bold">
                        {{ $profesor->telefono ?? '-' }}
                    </div>

                </div>


                <div class="col-md-4 mb-4">

                    <label class="text-muted">
                        Estado
                    </label>

                    <div>

                        @if ($profesor->estado === 'ACTIVO')

                            <span class="estado-activo">
                                ACTIVO
                            </span>

                        @else

                            <span class="estado-inactivo">
                                INACTIVO
                            </span>

                        @endif

                    </div>

                </div>

            </div>


            <div class="row">

                <div class="col-md-6 mb-4">

                    <label class="text-muted">
                        Email
                    </label>

                    <div class="fw-bold">
                        {{ $profesor->email ?? '-' }}
                    </div>

                </div>


                <div class="col-md-6 mb-4">

                    <label class="text-muted">
                        Especialidad
                    </label>

                    <div class="fw-bold">
                        {{ $profesor->especialidad ?? '-' }}
                    </div>

                </div>

            </div>


            <hr>


            <div class="d-flex justify-content-end gap-2">

                <a
                    href="{{ route('profesores.index') }}"
                    class="btn btn-outline-secondary">
                    Volver
                </a>
            </div>

        </div>

    </div>

</div>