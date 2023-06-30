<!-- Mostrar información del empleado -->
<h1>Información del Empleado</h1>

<p><strong>Nombre:</strong> {{ $empleado->nombre }}</p>
<p><strong>Email:</strong> {{ $empleado->email }}</p>
<p><strong>Puesto:</strong> {{ $empleado->puesto }}</p>
<p><strong>Fecha de Nacimiento:</strong> {{ $empleado->fecha_nacimiento->format('d/m/Y') }}</p>
<p><strong>Domicilio:</strong> {{ $empleado->domicilio }}</p>

<h2>Habilidades</h2>

@if ($empleado->skills->isEmpty())
    <p>No hay habilidades registradas para este empleado.</p>
@else
    <ul>
        @foreach ($empleado->skills as $skill)
            <li>{{ $skill->nombre }} (Calificación: {{ $skill->calificacion }})</li>
        @endforeach
    </ul>
@endif
