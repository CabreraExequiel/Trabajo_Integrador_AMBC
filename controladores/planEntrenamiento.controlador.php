<?php



class ControladorPlanEntrenamiento
{
    static public function ctrMostrarPlanEntrenamiento($item, $valor)
    {
        $tabla = "plan_entrenamiento";
        $respuesta = ModeloPlanEntrenamiento::mdlMostrarPlanEntrenamiento($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrAgregarPlanEntrenamiento($nombre, $descripcion, $codigo, $duracion, $sesiones, $entrenador) {
        $tabla = "plan_entrenamiento";
    
        // Datos que se enviarán al modelo para ser insertados en la base de datos
        $datos = array(
            "nombre_plan" => $nombre,
            "descripcion_plan" => $descripcion,
            "codigo" => $codigo,
            "duracion_semanas_plan" => $duracion,
            "sesiones_semanales_plan" => $sesiones,
            "entrenador_plan" => $entrenador
        );
    
        return ModeloPlanEntrenamiento::mdlAgregarPlanEntrenamiento($tabla, $datos);
    }
    

    public static function ctrEditarPlanEntrenamiento($id_plan, $nombre_plan, $descripcion_plan, $codigo, $duracion_semanas_plan, $sesiones_semanales_plan, $entrenador_plan) {
        // Call the model to update the database
        $tabla = "plan_entrenamiento";  // Name of the table
    
        // Update query
        $resultado = ModeloPlanEntrenamiento::mdlEditarPlanEntrenamiento(
            $tabla, 
            $id_plan, 
            $nombre_plan, 
            $descripcion_plan, 
            $codigo, 
            $duracion_semanas_plan, 
            $sesiones_semanales_plan, 
            $entrenador_plan
        );
    
        return $resultado;
    }    
}