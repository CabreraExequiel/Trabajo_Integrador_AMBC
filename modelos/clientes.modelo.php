<?php

require_once 'conexion.php';

class ModeloClientes
{
    /*=============================================
    MOSTRAR DATOS
    =============================================*/
    static public function mdlMostrarClientes($tabla, $item, $valor)
    {
        if ($item != null) {
            // Pedimos un solo registro
            try {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                // Enlace de parámetros
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {
            // Pedimos todos los registros
            try {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }

    /*=============================================
    AGREGAR DATOS
    =============================================*/
    static public function mdlAgregarClientes($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_cliente, apellido_cliente, fecha_nac_cliente, direccion_cliente, telefono_cliente, email_cliente, fecha_inscrip_cliente, plan_cliente, estado_membresia) VALUES (:nombre_cliente, :apellido_cliente, :fecha_nac_cliente, :direccion_cliente, :telefono_cliente, :email_cliente, :fecha_inscrip_cliente, :plan_cliente, :estado_membresia)");

            // UN ENLACE POR CADA DATO, TENER EN CUENTA EL TIPO DE DATO STR O INT
            $stmt->bindParam(":nombre_cliente", $datos["nombre_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido_cliente", $datos["apellido_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_nac_cliente", $datos["fecha_nac_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":direccion_cliente", $datos["direccion_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono_cliente", $datos["telefono_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":email_cliente", $datos["email_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_inscrip_cliente", $datos["fecha_inscrip_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":plan_cliente", $datos["plan_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":estado_membresia", $datos["estado_membresia"], PDO::PARAM_STR);

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
