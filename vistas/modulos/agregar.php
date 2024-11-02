<?php
// Cargar las categorías para el selector
$categorias = ControladorCategorias::ctrMostrarCategorias(null, null);
?>

<div class="col-lg-6 mt-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Agregar producto</h5>
        </div><!-- end card header -->

        <div class="card-body">
            <form method="POST" action="index.php?ruta=guardar-producto">
                <!-- Nombre del Producto -->
                <div class="mb-3">
                    <label for="nombre_producto" class="form-label">Nombre</label>
                    <input type="text" id="nombre_producto" name="nombre" class="form-control" placeholder="Nombre" required>
                </div>
                
                <!-- Precio del Producto -->
                <div class="mb-3">
                    <label for="precio_producto" class="form-label">Precio</label>
                    <input type="number" id="precio_producto" name="precio" class="form-control" placeholder="Precio" required>
                </div>
                
                <!-- Stock del Producto -->
                <div class="mb-3">
                    <label for="stock_producto" class="form-label">Stock</label>
                    <input type="number" id="stock_producto" name="stock" class="form-control" placeholder="Stock" required>
                </div>
                
                <!-- Categoría del Producto -->
                <div class="mb-3">
                    <label for="id_categoria" class="form-label">Categoría</label>
                    <select name="id_categoria" id="id_categoria" class="form-control" required>
                        <option value="">Seleccione una opción</option>
                        <?php foreach ($categorias as $key => $value): ?>
                            <option value="<?php echo htmlspecialchars($value["id_categoria"]); ?>">
                                <?php echo htmlspecialchars($value["nombre_categoria"]); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <!-- Botón de Guardar -->
                <button class="btn btn-success" type="submit">Guardar</button>
            </form>
        </div>
    </div>
</div>
