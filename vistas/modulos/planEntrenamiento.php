<?php
require_once(__DIR__ . '/../../controladores/planEntrenamiento.controlador.php');
require_once(__DIR__ . '/../../modelos/planEntrenamiento.modelo.php');
$planEntrenamiento = ControladorPlanEntrenamiento::ctrMostrarPlanEntrenamiento(null, null);
?>

<div class="col-xl-12 mt-3">
    <!-- Botón para agregar un nuevo cliente -->
    <a class="btn btn-dark" href="index.php?ruta=agregar">
        <i class="fas fa-plus"></i> Agregar Plan
    </a>
    <div class="card mt-3">
        <div class="card-header">
            <h1 class="card-title mb-0">Planes de Entrenamiento</h1>
        </div>
    </div>
</div>
<div class="table-responsive">
    
    <table class="table table-hover mb-0">
        
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Codigo</th>
                <th scope="col">Semanas</th>
                <th scope="col">Sesiones Semanales</th>
                <th scope="col">Entrenador</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($planEntrenamiento)) { ?>
                <?php foreach ($planEntrenamiento as $key => $value) { ?>                                  
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $value["nombre_plan"] ?? 'Sin plan'; ?></td>
                        <td><?php echo $value["descripcion_plan"] ?? 'Sin descripcion'; ?></td>
                        <td><?php echo $value["codigo"] ?? 'Sin codigo'; ?></td>
                        <td><?php echo $value["duracion_semanas_plan"] ?? 'Sin plan'; ?></td>
                        <td><?php echo $value["sesiones_semanales_plan"] ?? 'Sin plan'; ?></td>
                        <td><?php echo $value["entrenador_plan"] ?? 'Sin entrenador'; ?></td>
                        <td>
                            <a href="editar-plan/<?php echo $value["id_plan"]; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr><td colspan="10">No hay planes disponibles.</td></tr>
            <?php } ?>
        </tbody>

    </table>
</div>