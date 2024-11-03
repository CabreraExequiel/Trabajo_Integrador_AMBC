<?php
$entrenadores = ControladorEntrenadores::ctrMostrarEntrenadores("id_entrenadores", $pagina[1]); // Assuming $pagina[1] holds the trainer's ID
?>

<div class="col-lg-6 mt-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Editar Entrenador</h5>
        </div>

        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" value="<?php echo $entrenadores["nombre_entrenador"]; ?>" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" value="<?php echo $entrenadores["apellido_entrenador"]; ?>" id="apellido" name="apellido" class="form-control" placeholder="Apellido" required>
                </div>
                <div class="mb-3">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" value="<?php echo $entrenadores["dni_entrenador"]; ?>" id="dni" name="dni" class="form-control" placeholder="DNI" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" value="<?php echo $entrenadores["telefono_entrenador"]; ?>" id="telefono" name="telefono" class="form-control" placeholder="Teléfono" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" value="<?php echo $entrenadores["email_entrenador"]; ?>" id="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <label for="especialidades" class="form-label">Especialidades</label>
                    <input type="text" value="<?php echo $entrenadores["especialidades"]; ?>" id="especialidades" name="especialidades" class="form-control" placeholder="Especialidades" required>
                </div>
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select name="estado" id="estado" class="form-control" required>
                        <option value="activo" <?php echo $entrenadores["estado"] == 'activo' ? 'selected' : ''; ?>>Activo</option>
                        <option value="inactivo" <?php echo $entrenadores["estado"] == 'inactivo' ? 'selected' : ''; ?>>Inactivo</option>
                    </select>
                </div>

                <?php
                $editar = new ControladorEntrenadores();
                $editar->ctrEditarEntrenadores();
                ?>

                <button class="btn btn-success" type="submit">Guardar</button>
            </form>
        </div>
    </div>
</div>
