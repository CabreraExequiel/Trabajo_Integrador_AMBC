<?php
require_once(__DIR__ . '/../../controladores/clientes.controlador.php');
require_once(__DIR__ . '/../../modelos/clientes.modelo.php');
?>

<?php
// Assuming $pagina[1] holds the client ID
$cliente = ControladorClientes::ctrMostrarClientes("id_cliente", $pagina[1]); 
?>

<div class="col-lg-6 mt-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Editar Cliente</h5>
        </div>

        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" 
                           value="<?php echo isset($_POST['nombre_cliente']) ? htmlspecialchars($_POST['nombre_cliente']) : htmlspecialchars($cliente['nombre_cliente']); ?>" 
                           id="nombre" name="nombre_cliente" 
                           class="form-control" placeholder="Nombre" required>
                </div>

                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" 
                           value="<?php echo isset($_POST['apellido_cliente']) ? htmlspecialchars($_POST['apellido_cliente']) : htmlspecialchars($cliente['apellido_cliente']); ?>" 
                           id="apellido" name="apellido_cliente" 
                           class="form-control" placeholder="Apellido" required>
                </div>

                <div class="mb-3">
                    <label for="fecha_nac" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" 
                           value="<?php echo isset($_POST['fecha_nac_cliente']) ? htmlspecialchars($_POST['fecha_nac_cliente']) : htmlspecialchars($cliente['fecha_nac_cliente']); ?>" 
                           id="fecha_nac" name="fecha_nac_cliente" 
                           class="form-control" placeholder="Fecha de Nacimiento" required>
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" 
                           value="<?php echo isset($_POST['direccion_cliente']) ? htmlspecialchars($_POST['direccion_cliente']) : htmlspecialchars($cliente['direccion_cliente']); ?>" 
                           id="direccion" name="direccion_cliente" 
                           class="form-control" placeholder="Dirección" required>
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" 
                           value="<?php echo isset($_POST['telefono_cliente']) ? htmlspecialchars($_POST['telefono_cliente']) : htmlspecialchars($cliente['telefono_cliente']); ?>" 
                           id="telefono" name="telefono_cliente" 
                           class="form-control" placeholder="Teléfono" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" 
                           value="<?php echo isset($_POST['email_cliente']) ? htmlspecialchars($_POST['email_cliente']) : htmlspecialchars($cliente['email_cliente']); ?>" 
                           id="email" name="email_cliente" 
                           class="form-control" placeholder="Email" required>
                </div>

                <div class="mb-3">
                    <label for="plan" class="form-label">Plan</label>
                    <input type="text" 
                           value="<?php echo isset($_POST['plan_cliente']) ? htmlspecialchars($_POST['plan_cliente']) : htmlspecialchars($cliente['plan_cliente']); ?>" 
                           id="plan" name="plan_cliente" 
                           class="form-control" placeholder="Plan" required>
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
                        
                    );
                }
                ?>

                <button class="btn btn-success" type="submit">Guardar</button>
            </form>
        </div>
    </div>
</div>
