<?php
$entrenadores = ControladorEntrenadores::ctrMostrarEntrenadores(null, null);
//echo "<pre>";
//print_r($entrenadores);
//echo "</pre>";
?>

<div class="col-lg-6 mt-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Agregar entrenador</h5>
        </div><!-- end card header -->

        <div class="card-body">
            <form method="POST" action="index.php?ruta=guardar-entrenadores">
                <!-- Nombre del Producto -->
                <div class="mb-3">
                    <label for="nombre_entrenador" class="form-label">Nombre</label>
                    <input type="text" id="nombre_entrenador" name="nombre" class="form-control" placeholder="Nombre" required>
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
                        <?php
                        foreach ($entrenadores as $key => $value) { ?>

                            <option value="<?php echo $value["id_entrenadores"]; ?>"><?php echo $value["nombre_entrenador"]; ?></option>

                        <?php  } ?>

                    </select>
                </div>
                
                <!-- Botón de Guardar -->
                <button class="btn btn-success" type="submit">Guardar</button>
            </form>
        </div>
    </div>
</div>
