<?php
class ControladorFormularios
{
    /*====================================
    METODO REGISTRAR USUARIOS
    =====================================*/
    static public function ctrRegistro()
    {
        if (isset($_POST["registroNombre"])) {
            $tabla = "registros";
            $datos = array(
                "nombre" => $_POST["registroNombre"],
                "email" => $_POST["registroEmail"],
                "password" => $_POST["registroPassword"]
            );
            $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);
            return $respuesta;
        }
    }
    /*====================================
    METODO INICIAR SESION
    =====================================*/
    static public function ctrIngreso()
    {
        if (isset($_POST['ingresoEmail'])) {
            $tabla = 'registros';
            $item = 'email';
            $valor = $_POST['ingresoEmail'];
            $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
            if ($respuesta['email'] == $_POST['ingresoEmail'] && $respuesta['password'] == $_POST['ingresoPassword']) {
                $_SESSION['validarIngreso'] = 'ok';
                echo '<script>
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>';
            } else {
                echo '<script>
                    if(window.history.replaceState){
                        window.history.replaceState(null, null, window.location.href);
                    }
                </script>';
                echo '<div class="alert alert-danger">Error al ingresar al sistema, verifique el email y la contraseña</div>';
            }
        }
    }
    /*====================================
    METODO SELECCIONAR REGISTROS
    =====================================*/
    static public function ctrSeleccionarRegistros($item, $valor)
    {
        $tabla = 'registros';
        $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
        return $respuesta;
    }
    /*====================================
    METODO ACTUALIZAR REGISTROS
    =====================================*/
    static public function ctrActualizarRegistro()
    {
        if (isset($_POST['actualizarNombre'])) {
            if ($_POST['actualizarPassword'] != "") {
                $password = $_POST['actualizarPassword'];
            } else {
                $password = $_POST['passwordActual'];
            }
            $tabla = 'registros';
            $datos = array(
                'id' => $_POST['idUsuario'],
                'nombre' => $_POST['actualizarNombre'],
                'email' => $_POST['actualizarEmail'],
                'password' => $password
            );
            $respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);
            return $respuesta;
        }
    }
}
