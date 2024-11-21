<?php

class ControladorEntrenadores
{

    static public function ctrMostrarEntrenadores($item, $valor)
    {
        $tabla = "entrenadores";
        return ModeloEntrenadores::mdlMostrarEntrenadores($tabla, $item, $valor);
    }


    public static function ctrAgregarEntrenador($dni, $nombre, $apellido, $telefono, $email, $especialidades, $fecha_contratacion, $estado) {
        $tabla = "entrenadores";
    
        $resultado = ModeloEntrenadores::mdlAgregarEntrenador(
            $tabla,
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
