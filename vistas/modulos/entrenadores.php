<?php

$entrenadores = ControladorEntrenadores::ctrMostrarEntrenadores(null, null);

?>
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
                <th scope="col">Fecha de Contratación</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
       <tbody>
    <?php if (!empty($entrenadores)) { ?>
        <?php foreach ($entrenadores as $key => $value) { ?>                                  
            <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $value["dni_entrenador"] ?? 'Sin DNI'; ?></td>
                <td><?php echo $value["nombre_entrenador"] ?? 'Sin nombre'; ?></td>
                <td><?php echo $value["apellido_entrenador"] ?? 'Sin apellido'; ?></td>
                <td><?php echo $value["telefono_entrenador"] ?? 'Sin teléfono'; ?></td>
                <td><?php echo $value["email_entrenador"] ?? 'Sin email'; ?></td>
                <td><?php echo $value["especialidades"] ?? 'Sin especialidades'; ?></td>
                <td><?php echo $value["fecha_contratacion"] ?? 'Sin fecha'; ?></td>
                <td><?php echo $value["estado"] ?? 'Sin estado'; ?></td>
                <td>
                    <a href="editar/<?php echo $value["id_entrenadores"]; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                    <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr><td colspan="10">No hay entrenadores disponibles.</td></tr>
    <?php } ?>
</tbody>

    </table>
</div>
