<?php

require 'controladores/plantilla.controlador.php';

require 'controladores/entrenadores.controlador.php';
require 'modelos/entrenadores.modelo.php';


$plantilla = new PlantillaControlador();
$plantilla -> verPlantilla();