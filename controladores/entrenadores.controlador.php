<?php

class ControladorEntrenadores
{

    static public function ctrMostrarEntrenadores($item, $valor)
    {
        $tabla = "entrenadores";
        return ModeloEntrenadores::mdlMostrarEntrenadores($tabla, $item, $valor);
    }


    public function ctrAgregarEntrenadores()
    {
        if (isset($_POST["nombre"])) {
            $tabla = "entrenadores";

            $datos = [
                "dni" => $_POST["dni"],
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "telefono" => $_POST["telefono"],
                "email" => $_POST["email"],
                "especialidades" => $_POST["especialidades"],
                "fecha" => $_POST["fecha_contratacion"],
                "estado" => $_POST["estado"],
            ];

            $respuesta = ModeloEntrenadores::mdlAgregarEntrenadores($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert("success", "El entrenador se agregó correctamente", "entrenadores");
                </script>';
            }
        }
    }

    public static function ctrEditarEntrenador($id, $dni, $nombre, $apellido, $telefono, $email, $especialidades, $fecha_contratacion, $estado) {
        // Call the model to update the database
        $tabla = "entrenadores";  // Name of the table
    
        // Update query
        $resultado = ModeloEntrenadores::mdlEditarEntrenador(
            $tabla, 
            $id, 
            $dni, 
            $nombre, 
            $apellido, 
            $telefono, 
            $email, 
            $especialidades, 
            $fecha_contratacion, 
            $estado
        );
    
        return $resultado;
    }    
}
