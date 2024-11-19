<?php

require_once 'conexion.php';

class ModeloEntrenadores
{
    static public function mdlMostrarEntrenadores($tabla, $item, $valor)
    {
        try {
            if ($item != null) {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlAgregarEntrenadores($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(dni_entrenadores, nombre_entrenador, apellido_entrenador, telefono_entrenador, email_entrenador, especialidades, fecha_contratacion, estado) VALUES (:dni, :nombre, :apellido, :telefono, :email, :especialidades, :fecha, :estado)");

            $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":especialidades", $datos["especialidades"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

            return $stmt->execute() ? "ok" : "error";
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public static function mdlVerificarEntrenador($id_entrenadores) {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT id_entrenadores FROM entrenadores WHERE id_entrenadores = :id");
            $stmt->bindParam(":id", $id_entrenadores, PDO::PARAM_INT);
            $stmt->execute();
    
            return $stmt->fetch() ? true : false;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function mdlEditarEntrenador($datos) {
        try {
            $stmt = Conexion::conectar()->prepare(
                "UPDATE entrenadores 
                 SET nombre_entrenador = :nombre, apellido_entrenador = :apellido, dni_entrenador = :dni, 
                     telefono_entrenador = :telefono, email_entrenador = :email, especialidades = :especialidades, 
                     estado = :estado
                 WHERE id_entrenadores = :id"
            );
    
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":especialidades", $datos["especialidades"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
            $stmt->bindParam(":id", $datos["id_entrenadores"], PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "error: " . $e->getMessage();
        }
    }
    
}
