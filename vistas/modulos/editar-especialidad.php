<?php
require_once(__DIR__ . '/../../controladores/especialidades.controlador.php');
require_once(__DIR__ . '/../../modelos/especialidades.modelo.php');
?>

<?php
$especialidad = ControladorEspecialidades::ctrMostrarEspecialidades("id_especialidad", $pagina[1]); // Assuming $pagina[1] holds the specialty ID
?>

<div class="col-lg-6 mt-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Editar Especialidad</h5>
        </div>

        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre Especialidad</label>
                    <input type="text" 
                           value="<?php echo isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : htmlspecialchars($especialidad['nombre_especialidad']); ?>" 
                           id="nombre" name="nombre" 
                           class="form-control" placeholder="Nombre" required>
                </div>

                <?php
                // Only call ctrEditarEspecialidad if the form is submitted
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $editar = new ControladorEspecialidades();
                    $editar->ctrEditarEspecialidad($pagina[1], $_POST['nombre']);
                }
                ?>

                <button class="btn btn-success" type="submit">Guardar</button>
            </form>
        </div>
    </div>
</div>
