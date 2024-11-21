<?php
require_once(__DIR__ . '/../../controladores/pago.controlador.php');
require_once(__DIR__ . '/../../modelos/pago.modelo.php');
?>

<?php
// Assuming $pagina[1] holds the client ID
$pago= ControladorPago::ctrMostrarpago("id_cliente", $pagina[1]); 
?>

<div class="col-lg-6 mt-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Editar Pago</h5>
        </div>

        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" 
                           value="<?php echo isset($_POST['id_pago_membresia']) ; ?>" 
                           id="nombre" name="nombre_cliente" 
                           class="form-control" placeholder="Nombre" required>
                </div>
                

                <div class="mb-3">
                    <label for="telefono" class="form-label">Monto pago</label>
                    <input type="text" 
                           value="<?php echo isset($_POST['monto_pago']); ?>" 
                           id="telefono" name="telefono_cliente" 
                           class="form-control" placeholder="Teléfono" required>
                </div>

                <div class="mb-3">
                    <label for="fecha_nac" class="form-label">Fecha pago</label>
                    <input type="date" 
                           value="<?php echo isset($_POST['fecha_pago']); ?>" 
                           id="fecha_nac" name="fecha_nac_cliente" 
                           class="form-control" placeholder="Fecha de Nacimiento" required>
                </div>

                <div class="mb-3">
                    <label for="plan" class="form-label">Clase</label>
                    <input type="text" 
                           value="<?php echo isset($_POST['clase_cliente']) ; ?>" 
                           id="plan" name="plan_cliente" 
                           class="form-control" placeholder="Plan" required>
                </div>

                <div class="mb-3">
                    <label for="estado_membresia" class="form-label">Estado de Membresía</label>
                    <input type="text" 
                           value="<?php echo isset($_POST['estado_pago']) ; ?>" 
                           id="estado_membresia" name="estado_membresia" 
                           class="form-control" placeholder="Estado de Membresía" required>
                </div>

                <?php
                // Only call ctrEditarCliente if the form is submitted
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $editar = new ControladorClientes();
                    $editar->ctrEditarCliente(
                        $pagina[1], // id_cliente
                        $_POST['nombre_cliente'],
                        $_POST['apellido_cliente'],
                        $_POST['fecha_nac_cliente'],
                        $_POST['direccion_cliente'],
                        $_POST['telefono_cliente'],
                        $_POST['email_cliente'],
                        $_POST['plan_cliente'],
                        $_POST['estado_membresia']
                    );
                }
                ?>

                <button class="btn btn-success" type="submit">Guardar</button>
            </form>
        </div>
    </div>
</div>
