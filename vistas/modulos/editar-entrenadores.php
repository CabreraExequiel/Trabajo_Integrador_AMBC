<?php
require_once(__DIR__ . '/../../controladores/entrenadores.controlador.php');
require_once(__DIR__ . '/../../modelos/entrenadores.modelo.php');

// Assuming $pagina[1] holds the trainer ID
$entrenador = ControladorEntrenadores::ctrMostrarEntrenadores("id_entrenadores", $pagina[1]); 
?>

<div class="col-lg-6 mt-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Editar Entrenador</h5>
        </div>

        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" 
                           value="<?php echo isset($_POST['dni_entrenador']) ? htmlspecialchars($_POST['dni_entrenador']) : htmlspecialchars($entrenador['dni_entrenador']); ?>" 
                           id="dni" name="dni_entrenador" 
                           class="form-control" placeholder="DNI" required>
                </div>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" 
                           value="<?php echo isset($_POST['nombre_entrenador']) ? htmlspecialchars($_POST['nombre_entrenador']) : htmlspecialchars($entrenador['nombre_entrenador']); ?>" 
                           id="nombre" name="nombre_entrenador" 
                           class="form-control" placeholder="Nombre" required>
                </div>

                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" 
                           value="<?php echo isset($_POST['apellido_entrenador']) ? htmlspecialchars($_POST['apellido_entrenador']) : htmlspecialchars($entrenador['apellido_entrenador']); ?>" 
                           id="apellido" name="apellido_entrenador" 
                           class="form-control" placeholder="Apellido" required>
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" 
                           value="<?php echo isset($_POST['telefono_entrenador']) ? htmlspecialchars($_POST['telefono_entrenador']) : htmlspecialchars($entrenador['telefono_entrenador']); ?>" 
                           id="telefono" name="telefono_entrenador" 
                           class="form-control" placeholder="Teléfono" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" 
                           value="<?php echo isset($_POST['email_entrenador']) ? htmlspecialchars($_POST['email_entrenador']) : htmlspecialchars($entrenador['email_entrenador']); ?>" 
                           id="email" name="email_entrenador" 
                           class="form-control" placeholder="Email" required>
                </div>

                <div class="mb-3">
                    <label for="especialidades" class="form-label">Especialidades</label>
                    <input type="text" 
                           value="<?php echo isset($_POST['especialidades']) ? htmlspecialchars($_POST['especialidades']) : htmlspecialchars($entrenador['especialidades']); ?>" 
                           id="especialidades" name="especialidades" 
                           class="form-control" placeholder="Especialidades" required>
                </div>

                <div class="mb-3">
                    <label for="fecha_contratacion" class="form-label">Fecha de Contratación</label>
                    <input type="date" 
                           value="<?php echo isset($_POST['fecha_contratacion']) ? htmlspecialchars($_POST['fecha_contratacion']) : htmlspecialchars($entrenador['fecha_contratacion']); ?>" 
                           id="fecha_contratacion" name="fecha_contratacion" 
                           class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <input type="text" 
                           value="<?php echo isset($_POST['estado']) ? htmlspecialchars($_POST['estado']) : htmlspecialchars($entrenador['estado']); ?>" 
                           id="estado" name="estado" 
                           class="form-control" placeholder="Estado" required>
                </div>

                <?php
                // Only call ctrEditarEntrenador if the form is submitted
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $editar = new ControladorEntrenadores();
                    $editar->ctrEditarEntrenador(
                        $pagina[1], // id_entrenador
                        $_POST['dni_entrenador'],
                        $_POST['nombre_entrenador'],
                        $_POST['apellido_entrenador'],
                        $_POST['telefono_entrenador'],
                        $_POST['email_entrenador'],
                        $_POST['especialidades'],
                        $_POST['fecha_contratacion'],
                        $_POST['estado']
                    );
                }
                ?>

                <button class="btn btn-success" type="submit">Guardar</button>
            </form>
        </div>
    </div>
</div>
