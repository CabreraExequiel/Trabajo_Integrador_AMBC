<?php

require_once(__DIR__ . '/../../controladores/especialidades.controlador.php');
require_once(__DIR__ . '/../../modelos/especialidades.modelo.php');

$especialidades = ControladorEspecialidades::ctrMostrarEspecialidades();

if (!is_array($especialidades)) {
    $especialidades = [];
}
?>

<div class="col-xl-12 mt-3">
    <!-- Botón para agregar nueva especialidad -->
    <a class="btn btn-dark" href="agregar-especialidades">
        <i class="fas fa-plus"></i> Agregar Especialidad
    </a>

    <div class="card mt-3">
        <div class="card-header">
            <h1 class="card-title mb-0">Especialidades</h1>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre Especialidad</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($especialidades) > 0): ?>
                            <?php foreach ($especialidades as $key => $value): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($key + 1); ?></td>
                                    <td><?php echo htmlspecialchars($value["nombre_especialidad"]); ?></td>
                                    <td>
                                        <!-- Botón para editar especialidad -->
                                        <a href="editar-especialidad/<?php echo htmlspecialchars($value["id_especialidad"]); ?>" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Formulario para eliminar especialidad -->
                                        <form action="eliminar-especialidad/<?php echo htmlspecialchars($value["id_especialidad"]); ?>" method="POST" style="display:inline;">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta especialidad?');">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center">No hay especialidades disponibles.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div> 
        </div>
    </div>
</div>
