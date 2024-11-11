<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'conexion.php';

class modeloUsuarios
{
   static public function logearCliente($datos){
    try {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE Email_usuario = :email AND contrasenia_usuario = :password");
        $stmt->bindParam(":email", $datos["email"]);
        $stmt->bindParam(":password", $datos["password"]);
        $stmt->execute();
        
        // Verifica si se encontró un usuario
        if ($stmt->rowCount() > 0) {
            return "ok"; // Usuario encontrado
        } else {
            return "Usuario o contraseña incorrectos"; // No encontró usuario
        }
    } catch (Exception $e) {
        return "Error: " . $e->getMessage();
    }
   }
}

