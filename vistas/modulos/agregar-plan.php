<?php
require_once(__DIR__ . '/../../controladores/planEntrenamiento.controlador.php');
require_once(__DIR__ . '/../../modelos/planEntrenamiento.modelo.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibimos los datos del formulario y los enviamos al controlador
    $resultado = ControladorPlanEntrenamiento::ctrAgregarPlanEntrenamiento(
        $_POST['nombre_plan'],
        $_POST['descripcion_plan'],
        $_POST['codigo'],
        $_POST['duracion_semanas_plan'],
        $_POST['sesiones_semanales_plan'],
        $_POST['entrenador']
    );

    // Resultado del proceso
    if ($resultado) {
        echo "<div class='alert alert-success'>Plan de entrenamiento agregado correctamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>Hubo un error al agregar el plan de entrenamiento.</div>";
    }
}
?>

<div class="col-lg-6 mt-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Agregar Plan de Entrenamiento</h5>
        </div>

        <div class="card-body">
            <!-- Formulario para agregar un nuevo plan -->
            <form method="POST">
                <div class="mb-3">
                    <label for="nombre_plan" class="form-label">Nombre del Plan</label>
                    <input type="text" class="form-control" id="nombre_plan" name="nombre_plan" placeholder="Nombre del Plan" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion_plan" class="form-label">Descripción del Plan</label>
                    <textarea class="form-control" id="descripcion_plan" name="descripcion_plan" rows="3" placeholder="Descripción del Plan" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="codigo" class="form-label">Código del Plan</label>
                    <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código del Plan" required>
                </div>

                <div class="mb-3">
                    <label for="duracion_semanas_plan" class="form-label">Duración en Semanas</label>
                    <input type="number" class="form-control" id="duracion_semanas_plan" name="duracion_semanas_plan" placeholder="Duración en Semanas" required>
                </div>

                <div class="mb-3">
                    <label for="sesiones_semanales_plan" class="form-label">Sesiones Semanales</label>
                    <input type="number" class="form-control" id="sesiones_semanales_plan" name="sesiones_semanales_plan" placeholder="Sesiones Semanales" required>
                </div>
                <div class="mb-3">
                    <label for="entrenador" class="form-label">Entrenador</label>
                    <input type="number" class="form-control" id="entrenador" name="entrenador" placeholder="Entrenador" required>
                </div>

                

                <button type="submit" class="btn btn-success">Guardar Plan</button>
            </form>
        </div>
    </div>
</div>
