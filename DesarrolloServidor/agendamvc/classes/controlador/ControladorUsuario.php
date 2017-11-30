<?php

class ControladorUsuario extends Controlador { 

    function __construct(Modelo $modelo) {
        parent::__construct($modelo);
    }

    function claveolvidada() {
        $this->getModel()->setDato('archivo', 'plantilla/_usuario_claveolvidada.html');
    }

    function doactiva() {
        $id = Request::read('id');
        $data = Request::read('data');
        $r = $this->getModel()->verificarUsuario($id, $data);
        $accion = 'verificamal';
        if($r > 0){
            $accion = 'verificabien';
        }
        header('Location: index.php?accion=' . $accion);
        exit;
    }

    function doalta() {
        $usuario = new Usuario();
        $usuario->read();
        $claveRepetida = Request::read('claveRepetida');
        $resultado = -1;
        $accion = 'altamal';
        if(Filter::isEmail($usuario->getCorreo()) && $usuario->getClave() === $claveRepetida) {
            $resultado = $this->getModel()->addUsuario($usuario);
            if($resultado > 0) {
                self::sendActivationMail($usuario);
                $accion = 'altabien';
            }
        }
        header('Location: index.php?accion=' . $accion);
        exit;//para evitar que siga haciendo algo más, aunque en realidad no importa
    }
    
    function doedit() {
        
        //header('Location: index.php?accion=' . $accion);
        exit;
    }

    function dologin() {
        $usuario = new Usuario();
        $usuario->read();
        $accion = "loginmal";
        $r = -1;
        if(Filter::isEmail($usuario->getCorreo()) && ($usuario->getClave() !== '')) {
            $r = $this->getModel()->login($usuario);
            //$r es false o Usuario()
            if($r !== false) {
                $this->getSesion()->login($r);
                $accion = "loginbien";
            } else {
                $this->getSesion()->logout();
            }
        }
        echo $accion;
        //header('Location: index.php?accion=' . $accion);
        exit;
    }
    
    function dologout() {
        
        //header('Location: index.php?accion=' . $accion);
        exit;
    }

    function dorecordar() {
        
        //header('Location: index.php?accion=' . $accion);
        exit;
    }

    function doreestablecer() {
        
        //header('Location: index.php?accion=' . $accion);
        exit;
    }

    function edit() {
        $this->getModel()->setDato('archivo', 'plantilla/_usuario_edit.html');
    }

    function reestablecer() {
        $this->getModel()->setDato('archivo', 'plantilla/_usuario_reestablecer.html');
    }

    private static function sendActivationMail(Usuario $usuario) {
        $enlace = '<a href="https://daw-mavalfer.c9users.io/DesarrolloServidor/agendamvc/' .
                           'index.php?ruta=usuario&accion=doactiva&' .
                           'id=' . $usuario->getId() .
                           '&data=' . sha1($usuario->getId() . $usuario->getCorreo()) .
                           '">activate</a>';
        $resultado = Util::enviarCorreo(Constants::CORREO,
                            Constants::APPNAME,
                            'Mensaje con el enlace de activación: ' .
                            $enlace);
        //para que me lleguen los correos a mi
        // Util::enviarCorreo(Constants::CORREO,
        //                     Constants::APPNAME,
        //                     'Mensaje con el enlace de activación: ' .
        //                     $enlace);
        //para que lleguen los correos al usuario
        // Util::enviarCorreo($usuario->getCorreo(),
        //                                     Constants::APPNAME,
        //                                     'Mensaje con el enlace de activación: ' .
        //                                     $enlace);
        return $resultado;
    }

}