<?php
session_start();
if (!isset($_SESSION['session'])) {
    header("Location: vistas/modulos/login.php"); //Solo entras si estas logueado
    exit();
}

require_once 'controladores/plantilla.controlador.php';

require_once 'controladores/entrenadores.controlador.php';
require_once 'modelos/entrenadores.modelo.php';

require_once 'controladores/clientes.controlador.php';
require_once 'modelos/clientes.modelo.php';

require_once 'controladores/planEntrenamiento.controlador.php';
require_once 'modelos/planEntrenamiento.modelo.php';

$plantilla = new PlantillaControlador();
$plantilla->verPlantilla();

