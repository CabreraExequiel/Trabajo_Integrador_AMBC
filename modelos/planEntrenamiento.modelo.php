<?php


require_once 'conexion.php';

class ModeloPlanEntrenamiento
{
    static public function mdlMostrarPlanEntrenamiento($tabla, $item, $valor)
    {
        try{
            if($item != null){
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }else{

                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                $stmt->execute();
                return $stmt->fetchALL(PDO::FETCH_ASSOC);
            }
        }catch(Exeption $e){
            return "Error: ". $e->getMessage();
        }
    }

    public static function mdlEditarPlanEntrenamiento($tabla, $id_plan, $nombre_plan, $descripcion_plan, $codigo, $duracion_semanas_plan, $sesiones_semanales_plan, $entrenador_plan) {
        // Update query with the correct column names
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla 
            SET nombre_plan = :nombre_plan, 
                descripcion_plan = :descripcion_plan, 
                codigo = :codigo, 
                duracion_semanas_plan = :duracion_semanas_plan, 
                sesiones_semanales_plan = :sesiones_semanales_plan, 
                entrenador_plan = :entrenador_plan 
            WHERE id_plan = :id_plan");
        
        // Bind parameters correctly
        $stmt->bindParam(":nombre_plan", $nombre_plan, PDO::PARAM_STR);
        $stmt->bindParam(":descripcion_plan", $descripcion_plan, PDO::PARAM_STR);
        $stmt->bindParam(":codigo", $codigo, PDO::PARAM_STR);
        $stmt->bindParam(":duracion_semanas_plan", $duracion_semanas_plan, PDO::PARAM_STR);
        $stmt->bindParam(":sesiones_semanales_plan", $sesiones_semanales_plan, PDO::PARAM_STR);
        $stmt->bindParam(":entrenador_plan", $entrenador_plan, PDO::PARAM_STR);
        $stmt->bindParam(":id_plan", $id_plan, PDO::PARAM_INT);
        
        // Execute query and check for success
        if ($stmt->execute()) {
            return true; // Successfully updated
        } else {
            return false; // Error in updating
        }
    }    
}