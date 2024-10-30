<?php

require 'controladores/plantilla.controlador.php';

require 'controladores/categorias.controlador.php';
require 'modelos/categorias.modelo.php';

require 'controladores/productos.controlador.php';
require 'modelos/productos.modelo.php';

$plantilla = new PlantillaControlador();
$plantilla -> verPlantilla();