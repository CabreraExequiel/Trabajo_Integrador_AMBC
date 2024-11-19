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

    public static function mdlEditarCliente($tabla, $datos) {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
                nombre_cliente = :nombre_cliente, 
                apellido_cliente = :apellido_cliente, 
                fecha_nac_cliente = :fecha_nac_cliente, 
                direccion_cliente = :direccion_cliente, 
                telefono_cliente = :telefono_cliente, 
                email_cliente = :email_cliente, 
                plan_cliente = :plan_cliente, 
                estado_membresia = :estado_membresia 
                WHERE id_cliente = :id_cliente");
    
            $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
            $stmt->bindParam(":nombre_cliente", $datos["nombre_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido_cliente", $datos["apellido_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_nac_cliente", $datos["fecha_nac_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":direccion_cliente", $datos["direccion_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono_cliente", $datos["telefono_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":email_cliente", $datos["email_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":plan_cliente", $datos["plan_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":estado_membresia", $datos["estado_membresia"], PDO::PARAM_STR);
    
            if ($stmt->execute()) {
                return "ok";
            } else {
                return $stmt->errorInfo(); // Return error details if execution fails
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage(); // Handle any exceptions
        }
    }
    
}
