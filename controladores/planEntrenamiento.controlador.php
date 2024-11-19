<?php



class ControladorPlanEntrenamiento
{
    static public function ctrMostrarPlanEntrenamiento($item, $valor)
    {
        $tabla = "plan_entrenamiento";
        $respuesta = ModeloPlanEntrenamiento::mdlMostrarPlanEntrenamiento($tabla, $item, $valor);

        return $respuesta;
    }
}