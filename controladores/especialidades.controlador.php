<?php

require_once "modelos/especialidades.modelo.php";

class ControladorEspecialidades {

    /*=============================================
    MOSTRAR ESPECIALIDADES
    =============================================*/
    public static function ctrMostrarEspecialidades($item = null, $valor = null) {
        return ModeloEspecialidades::mdlMostrarEspecialidades("especialidades", $item, $valor);
    }

    /*=============================================
    AGREGAR ESPECIALIDAD
    =============================================*/
    public static function ctrAgregarEspecialidad($nombre_especialidad) {
        $datos = ["nombre_especialidad" => $nombre_especialidad];
        return ModeloEspecialidades::mdlAgregarEspecialidad("especialidades", $datos);
    }

    /*=============================================
    EDITAR ESPECIALIDAD
    =============================================*/
    public static function ctrEditarEspecialidad($id, $nombre_especialidad) {
        $datos = ["id_especialidad" => $id, "nombre_especialidad" => $nombre_especialidad];
        return ModeloEspecialidades::mdlEditarEspecialidad("especialidades", $datos);
    }

    /*=============================================
    ELIMINAR ESPECIALIDAD
    =============================================*/
    public static function ctrEliminarEspecialidad($id) {
        return ModeloEspecialidades::mdlEliminarEspecialidad("especialidades", $id);
    }
}
