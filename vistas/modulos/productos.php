<?php

$productos = ControladorProductos::ctrMostrarProductos(null, null);

?>
<div class="table-responsive">
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Stock</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($productos)) { ?>
                <?php foreach ($productos as $key => $value) { ?>                                  
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $value["nombre"] ?? 'Sin nombre'; ?></td>
                        <td>$ <?php echo isset($value["precio"]) ? number_format($value["precio"], 2) : '0.00'; ?></td>
                        <td><?php echo $value["stock"] ?? 'Sin stock'; ?></td>
                        <td>
                            <a href="editar/<?php echo $value["id_producto"]; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr><td colspan="5">No hay productos disponibles.</td></tr>
            <?php } ?>
        </tbody>
    </table>
</div>
