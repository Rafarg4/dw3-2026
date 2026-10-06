{{-- Una fila del detalle. $i es el índice de la fila y $fila sus datos --}}
<tr class="fila-detalle">
    <td>
        <select name="detalles[{{ $i }}][id_materia]"
            class="form-select form-select-sm {{ $errors->has("detalles.$i.id_materia") ? 'is-invalid' : '' }}">
            <option value="">Seleccione una materia</option>
            @foreach ($materias as $materia)
                <option value="{{ $materia->id }}" {{ ($fila['id_materia'] ?? '') == $materia->id ? 'selected' : '' }}>
                    {{ $materia->nombre }} ({{ $materia->codigo }})
                    @if ($materia->profesor)
                        - {{ $materia->profesor->nombre }} {{ $materia->profesor->apellido }}
                    @endif
                </option>
            @endforeach
        </select>
        @if ($errors->has("detalles.$i.id_materia"))
            <div class="invalid-feedback">{{ $errors->first("detalles.$i.id_materia") }}</div>
        @endif
    </td>
    <td>
        <input type="time" name="detalles[{{ $i }}][hora_inicio]"
            class="form-control form-control-sm {{ $errors->has("detalles.$i.hora_inicio") ? 'is-invalid' : '' }}"
            value="{{ substr($fila['hora_inicio'] ?? '', 0, 5) }}">
        @if ($errors->has("detalles.$i.hora_inicio"))
            <div class="invalid-feedback">{{ $errors->first("detalles.$i.hora_inicio") }}</div>
        @endif
    </td>
    <td>
        <input type="time" name="detalles[{{ $i }}][hora_fin]"
            class="form-control form-control-sm {{ $errors->has("detalles.$i.hora_fin") ? 'is-invalid' : '' }}"
            value="{{ substr($fila['hora_fin'] ?? '', 0, 5) }}">
        @if ($errors->has("detalles.$i.hora_fin"))
            <div class="invalid-feedback">{{ $errors->first("detalles.$i.hora_fin") }}</div>
        @endif
    </td>
    <td class="text-end">
        <button type="button" class="btn btn-sm btn-outline-danger btn-quitar">Quitar</button>
    </td>
</tr>
