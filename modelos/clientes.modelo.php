<?php

require_once 'conexion.php';

class ModeloClientes
{
    /*=============================================
    MOSTRAR DATOS
    =============================================*/
    static public function mdlMostrarClientes($tabla, $item, $valor)
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
    static public function mdlAgregarClientes($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_cliente, apellido_cliente, fecha_nac_cliente, direccion_cliente, telefono_cliente, email_cliente, fecha_inscrip_cliente, plan_cliente, estado_membresia) VALUES (:nombre, :apellido, :fecha_nac, :direccion, :telefono, :email, :fecha_inscrip, :plan, :estado)");

            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_nac", $datos["fecha_nac"], PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_inscrip", $datos["fecha_inscrip"], PDO::PARAM_STR);
            $stmt->bindParam(":plan", $datos["plan"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

            return $stmt->execute() ? "ok" : "error";
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    /*=============================================
    EDITAR DATOS
    =============================================*/
    static public function mdlEditarClientes($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
                nombre_cliente = :nombre,
                apellido_cliente = :apellido,
                fecha_nac_cliente = :fecha_nac,
                direccion_cliente = :direccion,
                telefono_cliente = :telefono,
                email_cliente = :email,
                fecha_inscrip_cliente = :fecha_inscrip,
                plan_cliente = :plan,
                estado_membresia = :estado
                WHERE id_cliente = :id_cliente");

            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_nac", $datos["fecha_nac"], PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_inscrip", $datos["fecha_inscrip"], PDO::PARAM_STR);
            $stmt->bindParam(":plan", $datos["plan"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
            $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);

            return $stmt->execute() ? "ok" : "error";
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
