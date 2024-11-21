<?php
require_once(__DIR__ . '/../modelos/pago.modelo.php');

class ControladorPago
{
    /**
     * Método para mostrar clientes
     */
    static public function ctrMostrarPago($item, $valor)
    {
        $tabla = "pago_membresia";
        return ModeloPago::mdlMostrarPago($tabla, $item, $valor);
    }

    /**
     * Método para agregar un nuevo cliente
     */
    public static function ctrAgregarPago( $monto_pago, $fecha_pago, $clase_cliente, $metodo_pago, $estado_pago) {
        $tabla = "pago_membresia";
        $datos = array(
            
            "monto_pago" => $monto_pago,
            "fecha_pago" => $fecha_pago,
            "clase_cliente" => $clase_cliente,
            "metodo_pago" => $metodo_pago,
            "estado_pago" => $estado_pago
        );

        $respuesta = ModeloPago::mdlAgregarPago($tabla, $datos);
        return $respuesta;
    }
    /**
     * Método para editar un cliente
     */

     public static function ctrEditarPago($id, $nombre_cliente, $apellido_cliente, $fecha_nac_cliente, $direccion_cliente, $telefono_cliente, $email_cliente, $plan_cliente, $estado_membresia) {
        $datos = ["id_cliente" => $id, "nombre_cliente" => $nombre_cliente, "apellido_cliente" => $apellido_cliente, "fecha_nac_cliente" => $fecha_nac_cliente, "direccion_cliente" => $direccion_cliente, "telefono_cliente" => $telefono_cliente, "email_cliente" => $email_cliente, "plan_cliente" => $plan_cliente, "estado_membresia" => $estado_membresia];
        return ModeloPago::mdlEditarPago("clientes", $datos);
    }

    public function ef($id_pago)
    {
        if (isset($_POST["nombre_cliente"])) {
            $tabla = "clientes";

            // Sanitizar entradas
            $datos = [
                "id_cliente" => $id_pago,  // Ensure the id_cliente is passed for updating
                "nombre_cliente" => htmlspecialchars($_POST["nombre_cliente"]),
                "apellido_cliente" => htmlspecialchars($_POST["apellido_cliente"]),
                "fecha_nac_cliente" => htmlspecialchars($_POST["fecha_nac_cliente"]),
                "direccion_cliente" => htmlspecialchars($_POST["direccion_cliente"]),
                "telefono_cliente" => htmlspecialchars($_POST["telefono_cliente"]),
                "email_cliente" => htmlspecialchars($_POST["email_cliente"]),
                "plan_cliente" => htmlspecialchars($_POST["plan_cliente"]),
                "estado_membresia" => htmlspecialchars($_POST["estado_membresia"])
            ];

            // Llamar al modelo para editar el cliente
            $respuesta = ModeloPago::mdlEditarPago($tabla, $datos);

            // Mostrar mensaje según el resultado
            $url = PlantillaControlador::url() . "pagos";
            if ($respuesta == "ok") {
                echo "<script>
                        fncSweetAlert('success', 'El cliente se editó correctamente', '$url');
                      </script>";
            } else {
                echo "<script>
                        fncSweetAlert('error', 'Hubo un problema al editar el cliente', '$url');
                      </script>";
            }
        }
    }
    public static function ctrEliminarPago($id) {
        return ModeloPago::mdlEliminarPago("pago_membresia", $id);
    }
}
