<?php

require_once(__DIR__ . '/../../controladores/clientes.controlador.php');
require_once(__DIR__ . '/../../modelos/clientes.modelo.php');

$clientes = ControladorClientes::ctrMostrarClientes(null, null);

if (!is_array($clientes)) {
    $clientes = [];
}
?>
<div class="col-xl-12 mt-3">
    <!-- Botón para agregar un nuevo cliente -->
    <a class="btn btn-dark" href="agregar-clientes">
        <i class="fas fa-plus"></i> Agregar Cliente
    </a>

    <div class="card mt-3">
        <div class="card-header">
            <h1 class="card-title mb-0">Clientes</h1>
        </div><!-- end card header -->

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Fecha Nac.</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Email</th>
                            <th scope="col">Fecha Inscripción</th>
                            <th scope="col">Plan</th>
                            <th scope="col">Estado Membresía</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($clientes) > 0): ?>
                            <?php foreach ($clientes as $key => $value): ?>                                  
                                <tr>
                                    <td><?php echo htmlspecialchars($key + 1); ?></td>
                                    <td><?php echo htmlspecialchars($value["nombre_cliente"]); ?></td>
                                    <td><?php echo htmlspecialchars($value["apellido_cliente"]); ?></td>
                                    <td><?php echo htmlspecialchars(date("d/m/Y", strtotime($value["fecha_nac_cliente"]))); ?></td>
                                    <td><?php echo htmlspecialchars($value["direccion_cliente"]); ?></td>
                                    <td><?php echo htmlspecialchars($value["telefono_cliente"]); ?></td>
                                    <td><?php echo htmlspecialchars($value["email_cliente"]); ?></td>
                                    <td><?php echo htmlspecialchars(date("d/m/Y", strtotime($value["fecha_inscrip_cliente"]))); ?></td>
                                    <td><?php echo htmlspecialchars($value["plan_cliente"]); ?></td>
                                    <td><?php echo htmlspecialchars($value["estado_membresia"]); ?></td>
                                    <td>
                                        <!-- Botón para editar cliente -->
                                        <a href="editar-clientes/<?php echo htmlspecialchars($value["id_cliente"]); ?>" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Formulario para eliminar cliente -->
                                        <form action="eliminar-cliente/<?php echo htmlspecialchars($value["id_cliente"]); ?>" method="POST" style="display:inline;">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este cliente?');">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="11" class="text-center">No hay clientes disponibles.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div> 
        </div>
    </div>
</div>
