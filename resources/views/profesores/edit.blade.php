<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<div class="container profesores-page">

    <div class="profesores-header">

        <div>
            <h3>Editar Profesor</h3>
            <p>Modificar los datos del profesor</p>
        </div>

        <div>
            <a
                href="{{ route('profesores.index') }}"
                class="btn btn-outline-secondary">
                Volver
            </a>
        </div>

    </div>

    <div class="card profesores-card">

        <div class="card-body p-4">

            @if ($errors->any())

                <div class="alert alert-danger">

                    <strong>
                        Verifique los siguientes datos:
                    </strong>

                    <ul class="mb-0 mt-2">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>
            @endif
            <form
                action="{{ route('profesores.update', $profesor->id) }}"
                method="POST">

                @csrf
                @method('PUT')


                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Nombre
                        </label>

                        <input
                            type="text"
                            name="nombre"
                            class="form-control"
                            value="{{ old('nombre', $profesor->nombre) }}"
                            required>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Apellido
                        </label>

                        <input
                            type="text"
                            name="apellido"
                            class="form-control"
                            value="{{ old('apellido', $profesor->apellido) }}"
                            required>

                    </div>

                </div>


                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Documento
                        </label>

                        <input
                            type="text"
                            name="documento"
                            class="form-control"
                            value="{{ old('documento', $profesor->documento) }}">

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Teléfono
                        </label>

                        <input
                            type="text"
                            name="telefono"
                            class="form-control"
                            value="{{ old('telefono', $profesor->telefono) }}">

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Estado
                        </label>

                        <select
                            name="estado"
                            class="form-select">

                            <option
                                value="ACTIVO"
                                {{ old('estado', $profesor->estado) == 'ACTIVO' ? 'selected' : '' }}>
                                ACTIVO
                            </option>

                            <option
                                value="INACTIVO"
                                {{ old('estado', $profesor->estado) == 'INACTIVO' ? 'selected' : '' }}>
                                INACTIVO
                            </option>

                        </select>

                    </div>

                </div>


                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email', $profesor->email) }}">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Especialidad
                        </label>

                        <input
                            type="text"
                            name="especialidad"
                            class="form-control"
                            value="{{ old('especialidad', $profesor->especialidad) }}">
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-end gap-2">
                    <a
                        href="{{ route('profesores.index') }}"
                        class="btn btn-outline-secondary">
                        Cancelar
                    </a>
                    <button
                        type="submit"
                        class="btn btn-primary">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>