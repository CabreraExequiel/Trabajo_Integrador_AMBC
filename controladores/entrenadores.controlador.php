<?php

class ControladorEntrenadores
{
    static public function ctrMostrarEntrenadores($item, $valor)
    {
        $tabla = "entrenadores";
        $respuesta = ModeloEntrenadores::mdlMostrarEntrenadores($tabla, $item, $valor);

        return $respuesta;
    }

    public function ctrAgregarEntrenadores()
    {
        if (isset($_POST["nombre"])) {
            $tabla = "entrenadores";
            
            $datos = array(
                "dni" => $_POST["dni"],
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "telefono" => $_POST["telefono"],
                "email" => $_POST["email"],
                "especialidades" => $_POST["especialidades"],
                "fecha" => $_POST["fecha_contratacion"],
                "estado" => $_POST["estado"],
            );

            $respuesta = ModeloEntrenadores::mdlAgregarEntrenadores($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert("success", "El entrenador se agregó correctamente", "entrenadores");
                </script>';
            }
        }
    }

    public function ctrEditarEntrenadores()
    {
        if (isset($_POST["id_entrenadores"])) {
            $tabla = "entrenadores";
            $datos = [
                "id_entrenadores" => $_POST["id_entrenadores"],
                "dni" => $_POST["dni"],
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "telefono" => $_POST["telefono"],
                "email" => $_POST["email"],
                "especialidades" => $_POST["especialidades"],
                "fecha" => $_POST["fecha_contratacion"],
                "estado" => $_POST["estado"]
            ];

            
            $respuesta = ModeloEntrenadores::mdlEditarEntrenadores($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert("success", "El entrenador se editó correctamente", "entrenadores");
                    window.location = "entrenadores";
                </script>';
            }
        }
        
    }
}
