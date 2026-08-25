<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h3 class="mb-0">
                Profesores
            </h3>
            <small class="text-muted">
                Administración de profesores
            </small>
        </div>
        <div>
            <a href="{{ route('profesores.create') }}"
                type="button"
                class="btn btn-primary">
                Nuevo Profesor
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Documento</th>
                            <th>Profesor</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Especialidad</th>
                            <th>Estado</th>
                            <th width="150">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($profesores as $profesor)
                            <tr>
                                <td>
                                    {{ $profesor->id }}
                                </td>
                                <td>
                                    {{ $profesor->documento }}
                                </td>
                                <td>
                                    {{ $profesor->apellido }},
                                    {{ $profesor->nombre }}
                                </td>
                                <td>
                                    {{ $profesor->telefono }}
                                </td>
                                <td>
                                    {{ $profesor->email }}
                                </td>
                                <td>
                                    {{ $profesor->especialidad }}
                                </td>
                                <td>
                                    @if ($profesor->estado == 'activo')
                                        <span class="badge bg-success">
                                            ACTIVO
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            {{ $profesor->estado }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <a
                                        href="{{ route('profesores.edit', $profesor->id) }}"
                                        class="btn btn-sm btn-warning"
                                        
                                    >
                                        Editar
                                    </a>
                                    <form method="POST" action="{{ route('profesores.destroy', $profesor->id) }}" style="display:inline;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este profesor?');">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td
                                    colspan="8"
                                    class="text-center text-muted py-4"
                                >
                                    No existen profesores registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
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

.profesores-header h3 {
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

.profesor-nombre {
    font-weight: 600;
    color: #212529;
}

.profesor-email {
    color: #6c757d;
}

.estado-activo {
    display: inline-block;
    padding: 5px 10px;
    border-radius: 20px;
    background-color: #d1e7dd;
    color: #0f5132;
    font-size: 12px;
    font-weight: 700;
}

.estado-inactivo {
    display: inline-block;
    padding: 5px 10px;
    border-radius: 20px;
    background-color: #e2e3e5;
    color: #41464b;
    font-size: 12px;
    font-weight: 700;
}

.btn-profesor-nuevo {
    border-radius: 8px;
    padding: 9px 18px;
    font-weight: 600;
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

.sin-registros {
    padding: 35px !important;
    text-align: center;
    color: #6c757d !important;
}

@media (max-width: 768px) {

    .profesores-header {
        flex-direction: column;
        align-items: stretch;
    }

    .btn-profesor-nuevo {
        width: 100%;
    }

    .profesores-table {
        min-width: 900px;
    }
}
</style>