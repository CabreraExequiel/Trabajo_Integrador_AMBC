<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once(__DIR__ . '/../modelos/usuarios.modelos.php');
require_once('plantilla.controlador.php');


class ControladorUsuario {
    public static function logearCliente() {
        
        if($_POST['action'] == 'login')
        {
            $datos = [
                "email" => $_POST["email-usuario"],
                "password" => $_POST["password-usuario"]
            ]; 
            $modelo = new modeloUsuarios();
            
            if ($modelo->logearCliente($datos) == "ok"){
                $_SESSION["session"] = "OK";
               header("Location: ../index.php");
            }else
            {
                header("Location: ../vistas/modulos/login.php");
            }
            
        }
        if($_POST['action'] == 'logout')
            {
                echo "Sesión destruida";
                session_destroy();
               header("Location: ../index.php");
            }
    }
}
ControladorUsuario::logearCliente();

