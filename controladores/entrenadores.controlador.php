<?php

class ControladorEntrenadores
{
    // Mostrar entrenadores
    static public function ctrMostrarEntrenadores($item, $valor)
    {
        $tabla = "entrenadores";
        $respuesta = ModeloEntrenadores::mdlMostrarEntrenadores($tabla, $item, $valor);
        return $respuesta;
    }

    // Método genérico para editar diferentes módulos
    public function ctrEditar($modulo)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            switch ($modulo) {
                case 'entrenadores':
                    return ModeloEntrenadores::mdlEditarEntrenador($_POST);
                case 'clientes':
                    return ModeloClientes::mdlEditarCliente($_POST);
                case 'planes':
                    return ModeloPlanEntrenamiento::mdlEditarPlan($_POST);
                default:
                    return null; // Manejo de error si el módulo no es válido
            }
        }
    }

    // Agregar entrenadores
    public function ctrAgregarEntrenadores()
    {
        if (isset($_POST["nombre"])) {
            $tabla = "entrenadores";

            $datos = [
                "dni" => $_POST["dni"],
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "telefono" => $_POST["telefono"],
                "email" => $_POST["email"],
                "especialidades" => $_POST["especialidades"],
                "fecha" => $_POST["fecha_contratacion"],
                "estado" => $_POST["estado"],
            ];

            $respuesta = ModeloEntrenadores::mdlAgregarEntrenadores($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert("success", "El entrenador se agregó correctamente", "entrenadores");
                </script>';
            }
        }
    }
    

    public function ctrEditarEntrenadores() {
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id_entrenadores = $_POST["id_entrenadores"] ?? null;
    
            // Verificar que el ID no sea nulo y que exista en la base de datos
            if (!$id_entrenadores || !ModeloEntrenadores::mdlVerificarEntrenador($id_entrenadores)) {
                echo "<script>alert('ID del entrenador no válido');</script>";
                return;
            }
    
            // Continuar con los datos del formulario
            $datos = [
                "id_entrenadores" => $id_entrenadores,
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "dni" => $_POST["dni"],
                "telefono" => $_POST["telefono"],
                "email" => $_POST["email"],
                "especialidades" => $_POST["especialidades"],
                "estado" => $_POST["estado"]
            ];
    
            $respuesta = ModeloEntrenadores::mdlEditarEntrenador($datos);
    
            if ($respuesta === "ok") {
                echo "<script>
                    alert('Entrenador actualizado correctamente');
                    window.location = 'lista_entrenadores'; // Cambiar a la página deseada
                </script>";
            } else {
                echo "<script>alert('Hubo un error al actualizar el entrenador');</script>";
            }
        }
    }
    
}
