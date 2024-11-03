<?php
$producto = ControladorProductos::ctrMostrarProductos(null, null);
//echo "<pre>";
//print_r($entrenadores);
//echo "</pre>";
?>

<div class="col-lg-6 mt-3">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Agregar producto</h5>
        </div><!-- end card header -->

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Nombre</label>
                    <input type="text" id="example-input-normal" name="nombre" class="form-control" placeholder="Nombre" required>
                </div>
                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Precio</label>
                    <input type="number" id="example-input-normal" name="precio" class="form-control" placeholder="Precio" required>
                </div>
                <div class="mb-3">
                    <label for="example-input-normal" class="form-label">Stock</label>
                    <input type="number" id="example-input-normal" name="stock" class="form-control" placeholder="Stock" required>
                </div>
                <div class="mb-3">
                    <label for="id_categoria" class="form-label">Categoría</label>

                    <select name="id_categoria" id="id_categoria" class="form-control" required>

                    <option value="">Seleccione una opción</option>
                        <?php
                        foreach ($producto as $key => $value) { ?>

                            <option value="<?php echo $value["id_producto"]; ?>"><?php echo $value["nombre"]; ?></option>

                        <?php  } ?>

                    </select>
                </div>

                <?php
                $agregar = new ControladorProductos();
                $agregar->ctrAgregarProducto();
                ?>

                <button class="btn btn-success" type="submit">Guardar</button>

            </form>
        </div>

    </div>
</div>