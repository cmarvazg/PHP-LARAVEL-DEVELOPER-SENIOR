<!-- Mostrar lista de empleados -->
<h1>Listado de Empleados</h1>

@if ($empleados->isEmpty())
    <p>No hay empleados registrados.</p>
@else
    <ul>
        @foreach ($empleados as $empleado)
            <li>
                <a href="{{ route('empleados.show', $empleado) }}">{{ $empleado->nombre }}</a>
            </li>
        @endforeach
    </ul>
@endif
