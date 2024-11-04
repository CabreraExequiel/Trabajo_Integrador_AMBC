<?php

require_once 'controladores/plantilla.controlador.php';

require_once 'controladores/entrenadores.controlador.php';
require_once 'modelos/entrenadores.modelo.php';

require_once 'controladores/clientes.controlador.php';
require_once 'modelos/clientes.modelo.php';

$plantilla = new PlantillaControlador();
$plantilla->verPlantilla();

