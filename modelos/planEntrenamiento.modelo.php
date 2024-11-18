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
}