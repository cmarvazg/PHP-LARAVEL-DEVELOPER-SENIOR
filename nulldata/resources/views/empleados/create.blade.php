<!-- Formulario de registro de empleado -->
<h1>Registrar Empleado</h1>

<form action="{{ route('empleados.store') }}" method="POST">
    @csrf

    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
        @error('nombre')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <!-- Resto de los campos del formulario -->

    <div>
        <label for="skills">Skills:</label>
        <button type="button" id="add-skill">Agregar Skill</button>
        <div id="skills-container">
            <div class="skill-row">
                <input type="text" name="skills[0][nombre]" placeholder="Nombre del skill" required>
                <input type="number" name="skills[0][calificacion]" placeholder="Calificación (1-5)" min="1" max="5" required>
            </div>
        </div>
        @error('skills')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">Registrar</button>
</form>

<script>
    document.getElementById('add-skill').addEventListener('click', function () {
        var skillsContainer = document.getElementById('skills-container');
        var skillRow = document.createElement('div');
        skillRow.classList.add('skill-row');
        skillRow.innerHTML = `
            <input type="text" name="skills[${skillsContainer.childElementCount}][nombre]" placeholder="Nombre del skill" required>
            <input type="number" name="skills[${skillsContainer.childElementCount}][calificacion]" placeholder="Calificación (1-5)" min="1" max="5" required>
        `;
        skillsContainer.appendChild(skillRow);
    });
</script>
