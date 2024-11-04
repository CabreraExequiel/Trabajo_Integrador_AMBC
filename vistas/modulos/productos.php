<?php

$productos = ControladorProductos::ctrMostrarProductos(null, null);

if (!is_array($productos)) {
    $productos = [];
}

?>
<div class="col-xl-12 mt-3">
    <a class="btn btn-dark" href="agregar"><i class="fas fa-plus"></i> Agregar</a>
    <div class="card mt-3">
        <div class="card-header">
            <h1 class="card-title mb-0">Productos</h1>
        </div><!-- end card header -->

        <div class="card-body">
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
                        <?php if (count($productos) > 0): // Check if there are products ?>
                            <?php foreach ($productos as $key => $value): ?>                                  
                                <tr>
                                    <td><?php echo htmlspecialchars($key + 1); ?></td>
                                    <td><?php echo htmlspecialchars($value["nombre"]); ?></td>
                                    <td>$ <?php echo htmlspecialchars(number_format($value["precio"], 2)); ?></td>
                                    <td><?php echo htmlspecialchars($value["stock"]); ?></td>
                                    <td>
                                        <a href="editar/<?php echo htmlspecialchars($value["id_producto"]); ?>" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="eliminar/<?php echo htmlspecialchars($value["id_producto"]); ?>" method="POST" style="display:inline;">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: // Handle the case where there are no products ?>
                            <tr>
                                <td colspan="5" class="text-center">No hay productos disponibles.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div> 
        </div>
    </div>
</div>
