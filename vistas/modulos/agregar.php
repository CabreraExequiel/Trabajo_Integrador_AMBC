<?php


// Llamar al método para agregar entrenadores
$controladorEntrenadores = new ControladorEntrenadores();
$controladorEntrenadores->ctrAgregarEntrenadores();
?>

<div class="col-lg-6 mt-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Agregar entrenador</h5>
        </div><!-- end card header -->

        <div class="card-body">
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="dni_entrenador" class="form-label">DNI</label>
                    <input type="number" id="dni_entrenador" name="dni" class="form-control" placeholder="DNI" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="nombre_entrenador" class="form-label">Nombre</label>
                    <input type="text" id="nombre_entrenador" name="nombre" class="form-control" placeholder="Nombre" autocomplete="given-name" required>
                </div>
                <div class="mb-3">
                    <label for="apellido_entrenador" class="form-label">Apellido</label>
                    <input type="text" id="apellido_entrenador" name="apellido" class="form-control" placeholder="Apellido" autocomplete="family-name" required>
                </div>
                <div class="mb-3">
                    <label for="telefono_entrenador" class="form-label">Teléfono</label>
                    <input type="number" id="telefono_entrenador" name="telefono" class="form-control" placeholder="Teléfono" autocomplete="tel" required>
                </div>
                <div class="mb-3">
                    <label for="email_entrenador" class="form-label">Email</label>
                    <input type="email" id="email_entrenador" name="email" class="form-control" placeholder="Email" autocomplete="email" required>
                </div>
                <div class="mb-3">
                    <label for="especialidades" class="form-label">Especialidades</label>
                    <input type="text" id="especialidades" name="especialidades" class="form-control" placeholder="Especialidades" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="fecha_contratacion" class="form-label">Fecha de Contratación</label>
                    <input type="date" id="fecha_contratacion" name="fecha_contratacion" class="form-control" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select id="estado" name="estado" class="form-control" autocomplete="off" required>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
                <button class="btn btn-success" type="submit">Guardar</button>
            </form>

        </div>
    </div>
</div>
