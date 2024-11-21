<?php

require_once 'conexion.php';

class ModeloPago
{
    /*=============================================
    MOSTRAR DATOS
    =============================================*/
    static public function mdlMostrarPago($tabla, $item, $valor)
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
    public static function mdlAgregarPago($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_cliente, monto_pago, fecha_pago, clase_cliente, metodo_pago, estado_pago) VALUES (:id_cliente, :monto_pago, :fecha_pago, :clase_cliente, :metodo_pago, :estado_pago)");

      //  $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
        $stmt->bindParam(":monto_pago", $datos["monto_pago"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_pago", $datos["fecha_pago"], PDO::PARAM_STR);
        $stmt->bindParam(":clase_cliente", $datos["clase_cliente"], PDO::PARAM_INT);
        $stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_INT);
        $stmt->bindParam(":estado_pago", $datos["estado_pago"], PDO::PARAM_INT);

        return $stmt->execute();
    }

    /*=============================================
    EDITAR DATOS
    =============================================*/

    public static function mdlEditarPago($tabla, $datos) {
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
