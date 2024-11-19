<?php
require_once(__DIR__ . '/../../controladores/planEntrenamiento.controlador.php');
require_once(__DIR__ . '/../../modelos/planEntrenamiento.modelo.php');

// Assuming $pagina[1] holds the trainer ID
$entrenador = ControladorPlanEntrenamiento::ctrMostrarPlanEntrenamiento("id_plan", $pagina[1]); 
?>

<div class="col-lg-6 mt-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Editar Plan de Entrenamiento</h5>
        </div>

        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" 
                           value="<?php echo isset($_POST['nombre_plan']) ? htmlspecialchars($_POST['nombre_plan']) : htmlspecialchars($entrenador['nombre_plan']); ?>" 
                           id="nombre" name="nombre_plan" 
                           class="form-control" placeholder="Nombre" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <input type="text" 
                           value="<?php echo isset($_POST['descripcion_plan']) ? htmlspecialchars($_POST['descripcion_plan']) : htmlspecialchars($entrenador['descripcion_plan']); ?>" 
                           id="descripcion" name="descripcion_plan" 
                           class="form-control" placeholder="Descripcion" required>
                </div>

                <div class="mb-3">
                    <label for="codigoo" class="form-label">Codigo</label>
                    <input type="text" 
                           value="<?php echo isset($_POST['codigo']) ? htmlspecialchars($_POST['codigo']) : htmlspecialchars($entrenador['codigo']); ?>" 
                           id="codigoo" name="codigo" 
                           class="form-control" placeholder="Codigo" required>
                </div>

                <div class="mb-3">
                    <label for="duracion_semanas_plan" class="form-label">Duracion de semanas del plan</label>
                    <input type="text" 
                           value="<?php echo isset($_POST['duracion_semanas_plan']) ? htmlspecialchars($_POST['duracion_semanas_plan']) : htmlspecialchars($entrenador['duracion_semanas_plan']); ?>" 
                           id="duracion" name="duracion_semanas_plan" 
                           class="form-control" placeholder="Duracion de semanas del plan" required>
                </div>

                <div class="mb-3">
                    <label for="sesiones" class="form-label">Sesiones semanales</label>
                    <input type="text" 
                           value="<?php echo isset($_POST['sesiones_semanales_plan']) ? htmlspecialchars($_POST['sesiones_semanales_plan']) : htmlspecialchars($entrenador['sesiones_semanales_plan']); ?>" 
                           id="sesiones" name="sesiones_semanales_plan" 
                           class="form-control" placeholder="Sesiones semanales" required>
                </div>

                <div class="mb-3">
                    <label for="plan" class="form-label">Plan del entrenador</label>
                    <input type="text" 
                           value="<?php echo isset($_POST['entrenador_plan']) ? htmlspecialchars($_POST['entrenador_plan']) : htmlspecialchars($entrenador['entrenador_plan']); ?>" 
                           id="plan" name="entrenador_plan" 
                           class="form-control" placeholder="Plan del entrenador" required>
                </div>

                <?php
                // Only call ctrEditarEntrenador if the form is submitted
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $editar = new ControladorPlanEntrenamiento();
                    $editar->ctrEditarPlanEntrenamiento(
                        $pagina[1], // id_entrenador
                        $_POST['nombre_plan'],
                        $_POST['descripcion_plan'],
                        $_POST['codigo'],
                        $_POST['duracion_semanas_plan'],
                        $_POST['sesiones_semanales_plan'],
                        $_POST['entrenador_plan']
                    );
                }
                ?>

                <button class="btn btn-success" type="submit">Guardar</button>
            </form>
        </div>
    </div>
</div>
