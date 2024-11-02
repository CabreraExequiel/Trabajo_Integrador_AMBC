<?php

require_once 'conexion.php';

class ModeloProductos
{

    /*=============================================
MOSTRAR DATOS
=============================================*/
static public function mdlMostrarProductos($tabla, $item, $valor)
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
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result ? $result : []; // Retorna un array vacío si no hay resultados
        }
    } catch (Exception $e) {
        return "Error: " . $e->getMessage();
    }
}


    // Agregar datos

    /*=============================================
AGREGAR DATOS
=============================================*/
    static public function mdlAgregarProductos($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, precio, stock, id_categoria) VALUES (:nombre, :precio, :stock, :id_categoria)");

            // UN ENLACE POR CADA DATO, TENER EN CUENTA EL TIPO DE DATO STR O INT
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
            $stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
            $stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
           
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
