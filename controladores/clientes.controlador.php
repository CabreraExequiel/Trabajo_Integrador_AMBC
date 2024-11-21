<?php
require_once(__DIR__ . '/../modelos/clientes.modelo.php');

class ControladorClientes
{
    /**
     * Método para mostrar clientes
     */
    static public function ctrMostrarClientes($item, $valor)
    {
        $tabla = "clientes";
        return ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);
    }

    /**
     * Método para agregar un nuevo cliente
     */
    public static function ctrAgregarCliente($nombre, $apellido, $fecha_nac, $direccion, $telefono, $email, $fecha_inscrip, $plan, $estado) {
        $tabla = "clientes";
        $datos = array(
            "nombre_cliente" => $nombre,
            "apellido_cliente" => $apellido,
            "fecha_nac_cliente" => $fecha_nac,
            "direccion_cliente" => $direccion,
            "telefono_cliente" => $telefono,
            "email_cliente" => $email,
            "fecha_inscrip_cliente" => $fecha_inscrip,
            "plan_cliente" => $plan,
            "estado_membresia" => $estado
        );

        $respuesta = ModeloClientes::mdlAgregarCliente($tabla, $datos);
        return $respuesta;
    }

    /**
     * Método para editar un cliente
     */

     public static function ctrEditarCliente($id, $nombre_cliente, $apellido_cliente, $fecha_nac_cliente, $direccion_cliente, $telefono_cliente, $email_cliente, $plan_cliente, $estado_membresia) {
        $datos = ["id_cliente" => $id, "nombre_cliente" => $nombre_cliente, "apellido_cliente" => $apellido_cliente, "fecha_nac_cliente" => $fecha_nac_cliente, "direccion_cliente" => $direccion_cliente, "telefono_cliente" => $telefono_cliente, "email_cliente" => $email_cliente, "plan_cliente" => $plan_cliente, "estado_membresia" => $estado_membresia];
        return ModeloClientes::mdlEditarCliente("clientes", $datos);
    }

    public function ef($id_cliente)
    {
        if (isset($_POST["nombre_cliente"])) {
            $tabla = "clientes";

            // Sanitizar entradas
            $datos = [
                "id_cliente" => $id_cliente,  // Ensure the id_cliente is passed for updating
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
            $respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);

            // Mostrar mensaje según el resultado
            $url = PlantillaControlador::url() . "clientes";
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
}
