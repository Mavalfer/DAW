<?php

class ControladorUsuario extends Controlador { 

    function __construct(Modelo $modelo) {
        parent::__construct($modelo);
    }

    function altabien() {
        $this->getModel()->setDato('archivo', 'plantilla/usuario/_altabien.html');
    }

    function altamal() {
        $this->getModel()->setDato('archivo', 'plantilla/usuario/_altamal.html');
    }

    function claveolvidada() {
        $this->getModel()->setDato('archivo', 'plantilla/usuario/_claveolvidada.html');
    }

    function doactiva() {
        $id = Request::read('id');
        $data = Request::read('data');
        $r = $this->getModel()->verificarUsuario($id, $data);
        $accion = 'verificamal';
        if($r > 0){
            $accion = 'verificabien';
        }
        header('Location: index.php?ruta=usuario&accion=' . $accion);
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
        header('Location: index.php?ruta=usuario&accion=' . $accion);
        exit;
    }
    
    function doedit() {
        if($this->isLogged()) {
            
        }
        //header('Location: index.php?ruta=usuario&accion=' . $accion);
        exit;
    }

    function dologin() {
        $usuario = new Usuario();
        $usuario->read();
        $accion = "loginmal";
        $r = -1;
        if(Filter::isEmail($usuario->getCorreo()) && ($usuario->getClave() !== '')) {
            $r = $this->getModel()->login($usuario);
            if($r !== false) {
                $this->getSesion()->login($r);
                $accion = "loginbien";
            } else {
                $this->getSesion()->logout();
            }
        }
        header('Location: index.php?ruta=usuario&accion=' . $accion);
        exit;
    }
    
    function dologout() {
        $this->getSesion()->logout();
        header('Location: index.php?ruta=usuario&accion=logout');
        exit;
    }

    function dorecordar() {
        if(!$this->isLogged()) {
            
        }
        //header('Location: index.php?ruta=usuario&accion=' . $accion);
        exit;
    }

    function doreestablecer() {
        if(!$this->isLogged()) {
            
        }
        //header('Location: index.php?ruta=usuario&accion=' . $accion);
        exit;
    }

    function edit() {
        if($this->isLogged()) {
            $this->getModel()->setDato('archivo', 'plantilla/usuario/_edit.html');
        } else {
            $this->index();
        }
    }

    function index() {
        $this->getModel()->setDato('contenido', file_get_contents('plantilla/bootstrap/_presentacion.html'));
    }

    function index1() {
        $this->getModel()->setDato('contenido', file_get_contents('plantilla/bootstrap/_archivo1.html'));
        $this->getModel()->setDato('footer', file_get_contents('plantilla/bootstrap/_pie1.html'));
    }
    
    function index2() {
        $this->getModel()->setDato('contenido', file_get_contents('plantilla/bootstrap/_archivo2.html'));
        $this->getModel()->setDato('footer', file_get_contents('plantilla/bootstrap/_pie2.html'));
    }

    function loginbien() {
        $this->getModel()->setDato('archivo', 'plantilla/usuario/_loginbien.html');
    }

    function loginmal() {
        $this->getModel()->setDato('archivo', 'plantilla/usuario/_loginmal.html');
    }

    function logout() {
        $this->getModel()->setDato('archivo', 'plantilla/usuario/_logout.html');
    }

    function reestablecer() {
        if(!$this->isLogged()) {
            $this->getModel()->setDato('archivo', 'plantilla/usuario/_reestablecer.html');
        } else {
            $this->index();
        }
    }

    private static function sendActivationMail(Usuario $usuario) {
        $enlace = '<a href="https://curso1718-izvdamdaw.c9users.io/agendamvc/' .
                           'index.php?ruta=usuario&accion=doactiva&' .
                           'id=' . $usuario->getId() .
                           '&data=' . sha1($usuario->getId() . $usuario->getCorreo()) .
                           '">activate</a>';
        $resultado = Util::enviarCorreo($usuario->getCorreo(),
                                            Constants::APPNAME,
                                            'Mensaje con el enlace de activación: ' .
                                            $enlace);
        //para que me lleguen los correos a mi
        Util::enviarCorreo(Constants::CORREO,
                            Constants::APPNAME,
                            'Mensaje con el enlace de activación: ' .
                            $enlace);
        return $resultado;
    }

    function verificabien() {
        $this->getModel()->setDato('archivo', 'plantilla/usuario/_verificabien.html');
    }

    function verificamal() {
        $this->getModel()->setDato('archivo', 'plantilla/usuario/_verificamal.html');
    }
}