<?php



class ControladorPlanEntrenamiento
{
    static public function ctrMostrarPlanEntrenamiento($item, $valor)
    {
        $tabla = "plan_entrenamiento";
        $respuesta = ModeloPlanEntrenamiento::mdlMostrarPlanEntrenamiento($tabla, $item, $valor);

        return $respuesta;
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