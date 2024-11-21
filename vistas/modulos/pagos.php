<?php

require_once(__DIR__ . '/../../controladores/pago.controlador.php');
require_once(__DIR__ . '/../../modelos/pago.modelo.php');

$pago = ControladorPago::ctrMostrarPago(null, null);

if (!is_array($pago)) {
    $pago = [];
}
?>
<div class="col-xl-12 mt-3">
    <!-- Botón para agregar un nuevo cliente -->
    <a class="btn btn-dark" href="agregar-pago">
        <i class="fas fa-plus"></i> Agregar Pago
    </a>

    <div class="card mt-3">
        <div class="card-header">
            <h1 class="card-title mb-0">Pagos</h1>
        </div><!-- end card header -->

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">cliente id</th>
                            <th scope="col">Monto Pago</th>
                            <th scope="col">Fecha Pago</th>
                            <th scope="col">Clase</th>
                            <th scope="col">Estado Membresia</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($pago) > 0): ?>
                            <?php foreach ($pago as $key => $value): ?>                                  
                                <tr>
                                    <td><?php echo htmlspecialchars($key + 1); ?></td>
                                    <td><?php echo htmlspecialchars($value["id_cliente"]); ?></td>
                                    <td><?php echo htmlspecialchars($value["monto_pago"]); ?></td>
                                    <td><?php echo htmlspecialchars(date("d/m/Y", strtotime($value["fecha_pago"]))); ?></td>
                                    <td><?php echo htmlspecialchars($value["clase_cliente"]); ?></td>
                                    <td><?php echo htmlspecialchars($value["estado_pago"]); ?></td>
                                    
                                    <td>
                                        <!-- Botón para editar cliente -->
                                        <a href="editar-pago/<?php echo htmlspecialchars($value["id_pago_membresia"]); ?>" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Formulario para eliminar cliente -->
                                        <form action="eliminar-clientes/<?php echo htmlspecialchars($value["id_pago_membresia"]); ?>" method="POST" style="display:inline;">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este pago?');">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="11" class="text-center">No hay pagos disponibles.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div> 
        </div>
    </div>
</div>
