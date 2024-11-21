<?php
require_once(__DIR__ . '/../../controladores/entrenadores.controlador.php');
require_once(__DIR__ . '/../../modelos/entrenadores.modelo.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = ControladorEntrenadores::ctrAgregarEntrenador(
        $_POST['dni_entrenador'],
        $_POST['nombre_entrenador'],
        $_POST['apellido_entrenador'],
        $_POST['telefono_entrenador'],
        $_POST['email_entrenador'],
        $_POST['especialidades'],
        $_POST['fecha_contratacion'],
        $_POST['estado']
    );

    if ($resultado) {
        echo "<div class='alert alert-success'>Entrenador agregado correctamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>Hubo un error al agregar el entrenador.</div>";
    }
}
?>

<div class="col-lg-6 mt-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Agregar Entrenador</h5>
        </div>

        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" id="dni" name="dni_entrenador" class="form-control" placeholder="DNI" required>
                </div>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre_entrenador" class="form-control" placeholder="Nombre" required>
                </div>

                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" id="apellido" name="apellido_entrenador" class="form-control" placeholder="Apellido" required>
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" id="telefono" name="telefono_entrenador" class="form-control" placeholder="Teléfono" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email_entrenador" class="form-control" placeholder="Email" required>
                </div>

                <div class="mb-3">
                    <label for="especialidades" class="form-label">Especialidades</label>
                    <input type="text" id="especialidades" name="especialidades" class="form-control" placeholder="Especialidades" required>
                </div>

                <div class="mb-3">
                    <label for="fecha_contratacion" class="form-label">Fecha de Contratación</label>
                    <input type="date" id="fecha_contratacion" name="fecha_contratacion" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <input type="text" id="estado" name="estado" class="form-control" placeholder="Estado" required>
                </div>

                <button class="btn btn-success" type="submit">Agregar</button>
            </form>
        </div>
    </div>
</div>
