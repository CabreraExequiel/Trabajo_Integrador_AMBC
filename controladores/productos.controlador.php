<?php

class ControladorProductos
{
    static public function ctrMostrarProductos($item, $valor)
    {
        $tabla = "productos";
        $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);

        return $respuesta;
    }

    public function ctrAgregarProducto()
    {
        if (isset($_POST["nombre"])) {
            
            $tabla = "productos"; //nombre de la tabla
           
            $datos = array(
                "nombre" => $_POST["nombre"],
                "precio" => $_POST["precio"],
                "stock" => $_POST["stock"],
                "id_categoria" => $_POST["id_categoria"],
            );
            //podemos volver a la página de datos
            //print_r($datos);
            //return;

            $url = PlantillaControlador::url() . "productos";
            $respuesta = ModeloProductos::mdlAgregarProductos($tabla, $datos);

            //print_r($respuesta);
            //return;
           
            if ($respuesta == "ok") {
                echo '<script>
            fncSweetAlert(
            "success",
            "El producto se agregó correctamente",
            "'.$url.'"
            );
            </script>';
            }
        }
    }
}
