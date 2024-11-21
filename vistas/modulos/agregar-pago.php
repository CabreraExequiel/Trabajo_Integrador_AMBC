<?php
require_once(__DIR__ . '/../../controladores/pago.controlador.php');
require_once(__DIR__ . '/../../modelos/pago.modelo.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = ControladorPago::ctrAgregarPago(
        //$_POST['id_cliente'],
        $_POST['monto_pago'],
        $_POST['fecha_pago'],
        $_POST['clase_cliente'],
        $_POST['metodo_pago'],
        $_POST['estado_pago']
    );

    if ($resultado) {
        echo "<div class='alert alert-success'>Pago agregado correctamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>Hubo un error al agregar el pago.</div>";
    }
}
?>

<div class="col-lg-6 mt-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Agregar Pago</h5>
        </div>

        <div class="card-body">
            <form method="POST">
                <!-- 
                <div class="mb-3">
                        <label for="id_cliente" class="form-label">Cliente</label>
                        <input type="number" id="id_cliente" name="id_cliente" class="form-control" required>
                    </div>
                -->
                

                <div class="mb-3">
                    <label for="monto_pago" class="form-label">Monto Pago</label>
                    <input type="number" id="monto_pago" name="monto_pago" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="fecha_pago" class="form-label">Fecha del Pago</label>
                    <input type="date" id="fecha_pago" name="fecha_pago" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="clase_cliente" class="form-label">Clase</label>
                    <input type="number" id="clase_cliente" name="clase_cliente" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="metodo_pago" class="form-label">Método de Pago</label>
                    <input type="number" id="metodo_pago" name="metodo_pago" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="estado_pago" class="form-label">Estado del Pago</label>
                    <input type="number" id="estado_pago" name="estado_pago" class="form-control" required>
                </div>

                <button class="btn btn-success" type="submit">Agregar</button>
            </form>
        </div>
    </div>
</div>