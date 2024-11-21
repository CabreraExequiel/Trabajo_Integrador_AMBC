<?php

require_once "conexion.php";

class ModeloEspecialidades {

    /*=============================================
    MOSTRAR ESPECIALIDADES
    =============================================*/
    public static function mdlMostrarEspecialidades($tabla, $item = null, $valor = null) {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

    /*=============================================
    AGREGAR ESPECIALIDAD
    =============================================*/
    public static function mdlAgregarEspecialidad($nombre_especialidad) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO especialidades (nombre_especialidad) VALUES (:nombre_especialidad)");
        $stmt->bindParam(":nombre_especialidad", $nombre_especialidad, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /*=============================================
    EDITAR ESPECIALIDAD
    =============================================*/
    public static function mdlEditarEspecialidad($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_especialidad = :nombre_especialidad WHERE id_especialidad = :id_especialidad");
        $stmt->bindParam(":nombre_especialidad", $datos["nombre_especialidad"], PDO::PARAM_STR);
        $stmt->bindParam(":id_especialidad", $datos["id_especialidad"], PDO::PARAM_INT);
        return $stmt->execute();
    }

    /*=============================================
    ELIMINAR ESPECIALIDAD
    =============================================*/
    public static function mdlEliminarEspecialidad($tabla, $id) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_especialidad = :id_especialidad");
        $stmt->bindParam(":id_especialidad", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
