<?php
require_once(__DIR__ . '/../../controladores/especialidades.controlador.php');
require_once(__DIR__ . '/../../modelos/especialidades.modelo.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = ControladorEspecialidades::ctrAgregarEspecialidad($_POST['nombre_especialidad']);
    
    if ($resultado) {
        echo "<div class='alert alert-success'>Especialidad agregada correctamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>Hubo un error al agregar la especialidad.</div>";
    }
}
?>

<div class="col-lg-6 mt-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Agregar Especialidad</h5>
        </div>

        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="nombre_especialidad" class="form-label">Nombre de la Especialidad</label>
                    <input type="text" id="nombre_especialidad" name="nombre_especialidad" class="form-control" placeholder="Nombre de la Especialidad" required>
                </div>

                <button class="btn btn-success" type="submit">Agregar</button>
            </form>
        </div>
    </div>
</div>
