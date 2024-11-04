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
}
