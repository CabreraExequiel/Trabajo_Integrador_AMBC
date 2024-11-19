<?php

require_once 'conexion.php';

class ModeloEntrenadores
{
    /*=============================================
    MOSTRAR DATOS
    =============================================*/
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

    /*=============================================
    AGREGAR DATOS
    =============================================*/
    static public function mdlAgregarEntrenadores($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(dni_entrenador, nombre_entrenador, apellido_entrenador, telefono_entrenador, email_entrenador, especialidades, fecha_contratacion, estado) VALUES (:dni, :nombre, :apellido, :telefono, :email, :especialidades, :fecha, :estado)");

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

    /*=============================================
    EDITAR DATOS
    =============================================*/
    public static function mdlEditarEntrenador($tabla, $id, $dni, $nombre, $apellido, $telefono, $email, $especialidades, $fecha_contratacion, $estado) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET dni_entrenador = :dni, nombre_entrenador = :nombre, apellido_entrenador = :apellido, telefono_entrenador = :telefono, email_entrenador = :email, especialidades = :especialidades, fecha_contratacion = :fecha_contratacion, estado = :estado WHERE id_entrenadores = :id");
    
        $stmt->bindParam(":dni", $dni, PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $apellido, PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":especialidades", $especialidades, PDO::PARAM_STR);
        $stmt->bindParam(":fecha_contratacion", $fecha_contratacion, PDO::PARAM_STR);
        $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            return true; // Successfully updated
        } else {
            return false; // Error in updating
        }
    }    
}
