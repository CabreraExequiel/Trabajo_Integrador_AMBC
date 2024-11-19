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
    public function ctrAgregarCliente()
    {
        if (isset($_POST["nombre_cliente"])) {
            $tabla = "clientes";

            // Sanitizar entradas
            $datos = [
                "nombre_cliente" => htmlspecialchars($_POST["nombre_cliente"]),
                "apellido_cliente" => htmlspecialchars($_POST["apellido_cliente"]),
                "fecha_nac_cliente" => htmlspecialchars($_POST["fecha_nac_cliente"]),
                "direccion_cliente" => htmlspecialchars($_POST["direccion_cliente"]),
                "telefono_cliente" => htmlspecialchars($_POST["telefono_cliente"]),
                "email_cliente" => htmlspecialchars($_POST["email_cliente"]),
                "fecha_inscrip_cliente" => date("Y-m-d"), // Fecha actual
                "plan_cliente" => htmlspecialchars($_POST["plan_cliente"]),
                "estado_membresia" => htmlspecialchars($_POST["estado_membresia"])
            ];

            $url = PlantillaControlador::url() . "clientes";
            $respuesta = ModeloClientes::mdlAgregarClientes($tabla, $datos);

            if ($respuesta == "ok") {
                echo "<script>
                        fncSweetAlert('success', 'El cliente se agregó correctamente', '$url');
                      </script>";
            } else {
                echo "<script>
                        fncSweetAlert('error', 'Hubo un problema al agregar el cliente', '$url');
                      </script>";
            }
        }
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
