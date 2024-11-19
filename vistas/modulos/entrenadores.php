<?php

require_once(__DIR__ . '/../../controladores/entrenadores.controlador.php');
require_once(__DIR__ . '/../../modelos/entrenadores.modelo.php');

// Fetch the entrenadores data
$entrenadores = ControladorEntrenadores::ctrMostrarEntrenadores(null, null);

// If $entrenadores is not an array, set it as an empty array
if (!is_array($entrenadores)) {
    $entrenadores = [];
}
?>

<div class="col-xl-12 mt-3">
    <!-- Button to add a new trainer -->
    <a class="btn btn-dark" href="index.php?ruta=agregar-entrenador">
        <i class="fas fa-plus"></i> Agregar Entrenador
    </a>

    <div class="card mt-3">
        <div class="card-header">
            <h1 class="card-title mb-0">Entrenadores</h1>
        </div><!-- end card header -->

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Email</th>
                            <th scope="col">Especialidades</th>
                            <th scope="col">Fecha Contratación</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($entrenadores) > 0): ?>
                            <?php foreach ($entrenadores as $key => $value): ?>                                  
                                <tr>
                                    <td><?php echo htmlspecialchars($key + 1); ?></td>
                                    <td><?php echo htmlspecialchars($value["dni_entrenador"]); ?></td>
                                    <td><?php echo htmlspecialchars($value["nombre_entrenador"]); ?></td>
                                    <td><?php echo htmlspecialchars($value["apellido_entrenador"]); ?></td>
                                    <td><?php echo htmlspecialchars($value["telefono_entrenador"]); ?></td>
                                    <td><?php echo htmlspecialchars($value["email_entrenador"]); ?></td>
                                    <td><?php echo htmlspecialchars($value["especialidades"]); ?></td>
                                    <td><?php echo htmlspecialchars($value["fecha_contratacion"]); ?></td>
                                    <td><?php echo htmlspecialchars($value["estado"]); ?></td>
                                    <td>
                                        <!-- Button to edit trainer -->
                                        <a href="editar-entrenadores/<?php echo htmlspecialchars($value["id_entrenadores"]); ?>" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Form for deleting trainer -->
                                        <form action="eliminar-entrenador/<?php echo htmlspecialchars($value["id_entrenadores"]); ?>" method="POST" style="display:inline;">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este entrenador?');">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="10" class="text-center">No hay entrenadores disponibles.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div> 
        </div>
    </div>
</div>
