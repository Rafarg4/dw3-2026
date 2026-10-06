@php
    // Filas del detalle: lo que volvió con error, o lo guardado, o una fila vacía
    $filas = old('detalles');
    if ($filas === null) {
        $filas = isset($horario)
            ? $horario->detalles->map(function ($d) {
                return ['id_materia' => $d->id_materia, 'hora_inicio' => $d->hora_inicio, 'hora_fin' => $d->hora_fin];
            })->all()
            : [];
    }
    if (count($filas) === 0) {
        $filas = [[]];
    }
    $estadoActual = old('estado', $horario->estado ?? 'ACTIVO');
@endphp

{{-- Cabecera --}}
<div class="row">
    <div class="col-md-4 mb-3">
        <label for="dia" class="form-label">
            Día <span class="text-danger">*</span>
        </label>
        <select id="dia" name="dia" class="form-select @error('dia') is-invalid @enderror">
            <option value="">Seleccione un día</option>
            @foreach ($dias as $valor => $texto)
                <option value="{{ $valor }}" {{ old('dia', $horario->dia ?? '') == $valor ? 'selected' : '' }}>
                    {{ $texto }}
                </option>
            @endforeach
        </select>
        @error('dia')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label for="estado" class="form-label">Estado</label>
        <select id="estado" name="estado" class="form-select">
            <option value="ACTIVO" {{ $estadoActual == 'ACTIVO' ? 'selected' : '' }}>ACTIVO</option>
            <option value="INACTIVO" {{ $estadoActual == 'INACTIVO' ? 'selected' : '' }}>INACTIVO</option>
        </select>
    </div>
</div>

<div class="mb-3">
    <label for="observacion" class="form-label">Observación</label>
    <input type="text" id="observacion" name="observacion" class="form-control"
        value="{{ old('observacion', $horario->observacion ?? '') }}" placeholder="Opcional">
</div>

<hr>

{{-- Detalle --}}
<div class="d-flex justify-content-between align-items-center mb-2">
    <h2 class="h6 fw-bold mb-0">Materias del día</h2>
    <button type="button" id="btn-agregar" class="btn btn-sm btn-success">
        + Agregar materia
    </button>
</div>

@error('detalles')
    <div class="alert alert-danger py-2">{{ $message }}</div>
@enderror

<div class="table-responsive">
    <table class="table align-middle detalle-table">
        <thead>
            <tr>
                <th>Materia</th>
                <th width="150">Hora inicio</th>
                <th width="150">Hora fin</th>
                <th width="90"></th>
            </tr>
        </thead>
        <tbody id="detalle-body" data-siguiente="{{ max(array_keys($filas)) + 1 }}">
            @foreach ($filas as $i => $fila)
                @include('horarios._fila', ['i' => $i, 'fila' => $fila])
            @endforeach
        </tbody>
    </table>
</div>

<template id="fila-template">
    @include('horarios._fila', ['i' => '__INDEX__', 'fila' => []])
</template>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cuerpo = document.getElementById('detalle-body');
        const plantilla = document.getElementById('fila-template').innerHTML;

        document.getElementById('btn-agregar').addEventListener('click', function () {
            const indice = cuerpo.dataset.siguiente++;
            cuerpo.insertAdjacentHTML('beforeend', plantilla.replaceAll('__INDEX__', indice));
        });

        cuerpo.addEventListener('click', function (e) {
            if (!e.target.classList.contains('btn-quitar')) return;
            if (cuerpo.querySelectorAll('.fila-detalle').length === 1) {
                alert('El horario debe tener al menos una materia.');
                return;
            }
            e.target.closest('tr').remove();
        });
    });
</script>
