<?php
require_once(__DIR__ . '/../../controladores/clientes.controlador.php');
require_once(__DIR__ . '/../../modelos/clientes.modelo.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = ControladorClientes::ctrAgregarCliente(
        $_POST['nombre_cliente'],
        $_POST['apellido_cliente'],
        $_POST['fecha_nac_cliente'],
        $_POST['direccion_cliente'],
        $_POST['telefono_cliente'],
        $_POST['email_cliente'],
        $_POST['fecha_inscrip_cliente'],
        $_POST['plan_cliente'],
        $_POST['estado_membresia']
    );

    if ($resultado) {
        echo "<div class='alert alert-success'>Cliente agregado correctamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>Hubo un error al agregar el cliente.</div>";
    }
}
?>

<div class="col-lg-6 mt-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Agregar Cliente</h5>
        </div>

        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre_cliente" class="form-control" placeholder="Nombre" required>
                </div>

                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" id="apellido" name="apellido_cliente" class="form-control" placeholder="Apellido" required>
                </div>

                <div class="mb-3">
                    <label for="fecha_nac" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" id="fecha_nac" name="fecha_nac_cliente" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" id="direccion" name="direccion_cliente" class="form-control" placeholder="Dirección" required>
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" id="telefono" name="telefono_cliente" class="form-control" placeholder="Teléfono" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email_cliente" class="form-control" placeholder="Email" required>
                </div>

                <div class="mb-3">
                    <label for="fecha_inscrip" class="form-label">Fecha de Inscripción</label>
                    <input type="date" id="fecha_inscrip" name="fecha_inscrip_cliente" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="plan" class="form-label">Plan</label>
                    <input type="number" id="plan" name="plan_cliente" class="form-control" placeholder="Plan" required>
                </div>

                <div class="mb-3">
                    <label for="menbresia" class="form-label">Estado Membresia</label>
                    <input type="number" id="telefono" name="estado_membresia" class="form-control" placeholder="Teléfono" required>
                </div>

                <button class="btn btn-success" type="submit">Agregar</button>
            </form>
        </div>
    </div>
</div>
