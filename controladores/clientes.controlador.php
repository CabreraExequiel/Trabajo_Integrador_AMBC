<?php
require_once(__DIR__ . '/../modelos/clientes.modelo.php');



class ControladorClientes
{
    static public function ctrMostrarClientes($item, $valor)
    {
        $tabla = "clientes";
        $respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

        return $respuesta;
    }

    public function ctrAgregarCliente()
    {
        if (isset($_POST["nombre_cliente"])) {
            $tabla = "clientes";

            $datos = array(
                "nombre_cliente" => $_POST["nombre_cliente"],
                "apellido_cliente" => $_POST["apellido_cliente"],
                "fecha_nac_cliente" => $_POST["fecha_nac_cliente"],
                "direccion_cliente" => $_POST["direccion_cliente"],
                "telefono_cliente" => $_POST["telefono_cliente"],
                "email_cliente" => $_POST["email_cliente"],
                "fecha_inscrip_cliente" => date("Y-m-d"), // Fecha actual
                "plan_cliente" => $_POST["plan_cliente"],
                "estado_membresia" => $_POST["estado_membresia"]
            );

            $url = PlantillaControlador::url() . "clientes";
            $respuesta = ModeloClientes::mdlAgregarClientes($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                        "success",
                        "El cliente se agregó correctamente",
                        "'.$url.'"
                    );
                </script>';
            }
        }
    }
}
