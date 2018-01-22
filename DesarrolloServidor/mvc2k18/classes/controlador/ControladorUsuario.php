<?php

class ControladorUsuario extends Controlador {
    
    private $mensajes = array (
        'ultimoadmin' => 'Eres el ultimo administrador, nombra otro antes de darte de baja'
    );

    function __construct(Modelo $modelo) {
        parent::__construct($modelo);
        $msg = Request::read('msg');
        $this->getModel()->setDato('mensaje', $this->mensajes[$msg]);
    }

    function index() {
        if($this->isLogged()){
            $this->getModel()->setDato('archivo', 'plantilla/index.html');
            $this->getModel()->setDato('usuario', $this->getSessionUserName());
            $this->administrar();
            
        } else {
            $this->getModel()->setDato('archivo', 'plantilla/login.html');
          //  $this->getModel()->setDato('contenido', file_get_contents('plantilla/bootstrap/_presentacion.html'));
        }
    }
    
    
    function administrar() {
        $linea = '<tr>  
                                <td>{{nombre}}</td>
                                <td>{{apellidos}}</td>
                                <td>{{alias}}</td>
                                <td>{{correo}}</td>
                                <td>{{clave}}</td>
                                <td>{{tipo}}</td>
                                <td>{{fechaalta}}</td>
                                <td>{{verificado}}</td>
                                ';
            if($this->isAdministrator()) {
                $usuarios = $this->getModel()->getUsuarios();
                $todo = '';
                $lineaAdmin = $linea .= '<td><a href="?ruta=index&accion=editarusuarioadmin&id={{id}}">editar</a></td>
                                        <td><a href="?ruta=index&accion=borrarusuarioadmin&id={{id}}">borrar</a></td>
                                     </tr>';
                foreach($usuarios as $indice => $usuario) {
                    $r = Util::renderText($lineaAdmin, $usuario->getAttributesValues());
                    $todo .= $r;
                }
                $this->getModel()->setDato('lineasUsuario', $todo);
                $this->getModel()->setDato('admincontrol' , '<a href="?ruta=index&accion=adminadduser" class="btn btn-primary btn-lg">Add user</a>');
            } else {
                $usuario = $this->getModel()->getUsuario($this->getSesion()->getUser());
                $todo = '';
                $lineaUser = $linea .= '<td><a href="?ruta=index&accion=editarusuariouser&id={{id}}">editar</a></td>
                                        <td><a href="?ruta=index&accion=borrarusuariouser&id={{id}}">borrar</a></td>
                                     </tr>';
                $r = Util::renderText($lineaUser, $usuario->getAttributesValues());
                $todo .= $r;
                $this->getModel()->setDato('lineasUsuario', $todo);
            } 
    }
    
    //acciones
    function registrarusuario() {
        $this->getModel()->setDato('archivo', 'plantilla/register.html');
    }
    
    function getSessionUserName(){
        return $this->getSesion()->getUser()->getNombre();
    }
    
    function activar() {
        $id = Request::read('id');
        $data = Request::read('data');
        $r = $this->getModel()->activarUsuario($id, $data);
        header('Location: index.php?op=activar&res=' . $r);
        exit();
    }
    
    function login() {
        $usuario = new Usuario();
        $usuario->read();
        $r = -2;
        if(Filter::isEmail($usuario->getCorreo()) && ($usuario->getClave() !== '')) {
            $r = $this->getModel()->loguear($usuario);
            if($r instanceof Usuario) {
                $this->getSesion()->login($r);
                $r = 1;
            } else {
                $this->getSesion()->logout();
            }
        }
        //echo Util::varDump($usuario);
       // echo Util::varDump($r);
        header('Location: index.php?op=loguear&res=' . $r);
        exit();
    }
    
    function cerrarsesion() {
        $this->getSesion()->close();
        header('Location: index.php?op=logout');
        exit();
    }
    
    function registro() {
        $usuario = new Usuario();
        $usuario->read();
        $claveRepetida = Request::read('claveRepetida');
        $resultado = -1;
        if(Filter::isEmail($usuario->getCorreo()) && $usuario->getClave() === $claveRepetida && $claveRepetida !== '') {
            $usuario->setTipo('user');
            $usuario->setFechaAlta(date('D M d'));
            $resultado = $this->getModel()->registrar($usuario);
        }
        header('Location: index.php?ruta=index&op=registrar&res=' . $resultado);
        exit();
    }
    
    function remail($usuario) {
        $enlace = '<a href="https://daw-mavalfer.c9users.io/DesarrolloServidor/mvc2k18/index.php?ruta=index&accion=activar&id=' . $usuario->getId() . '&data=' . sha1($usuario->getId().$usuario->getCorreo()). '">activate</a>';
        $resultado2 = Util::enviarCorreo (Constants::CORREO, Constants::APPNAME, 'Mensaje con el enlace de activación: ' . $enlace);
    }
    
    function borrarusuarioadmin() {
        if($this->isAdministrator()){
            $id = Request::read('id');
            $this->getModel()->setDato('archivo', 'plantilla/borrarusuario.html');
            $this->getModel()->setDato('id', $id);
            $usuario = new Usuario();
            $usuario->setId($id);
            $usuario = $this->getModel()->getUsuario($usuario);
            $this->getModel()->setDato('nombre', $usuario->getNombre());
        }
        header('Location: index.php?ruta=index');
        exit();
    }

    function borrar() {
        $resultado = 0;
        $msg = '';
        if($this->isAdministrator()) {
            $id = Request::read('id');
            $usuario = new Usuario($id);
            $usuario->setId($id);
            $usuario = $this->getModel()->getUsuario($usuario);
            if($this->getModel()->numeroAdmins() > 1) {
                $resultado = $this->getModel()->borrarUsuario($usuario);
            } else {
                $msg = 'ultimoadmin';
            }
        }
        header('Location: index.php?ruta=index&op=borrar&res=' . $resultado . '&msg=' . $msg);
        exit();
    }
    
    
    function editarusuarioadmin() {
        if ($this->isAdministrator()) {
            $id = Request::read('id');
            $this->getModel()->setDato('archivo', 'plantilla/edit.html');
            $this->getModel()->setDato('id', $id);
            $usuario = new Usuario();
            $usuario->setId($id);
            $usuario = $this->getModel()->getUsuario($usuario);
            $this->getModel()->setDato('nombre', $usuario->getNombre());
        }
        header('Location: index.php?ruta=index');
        exit();
    }
    
    function editar() {
        $resultado = 0;
        if ($this->isAdministrator()) {
            $usuario = new Usuario();
            $usuario->read();
            if (Request::read('claveRepetida') === $usuario->getClave()){
                $resultado = $this->getModel()->editarUsuario($usuario);
            }
        }
        header('Location: index.php?ruta=index&op=editar&res=' . $resultado);
        exit();
    }
    
    function adminadduser() {
        if ($this->isAdministrator()) {
            $this->getModel()->setDato('archivo', 'plantilla/register.html');
        }
    }
    
    function editarusuariouser() {
        if ($this->isLogged() && $this->isCurrentUser(Request::read('id'))) {
            $this->getModel()->setDato('archivo', 'plantilla/useredit.html');
        }
    }
    
    function isCurrentUser($id) {
        return ($id === $this->getSesion()->getUser()->getId());
    }
    
    function usuarioeditar() {
        $resultado = 0;
        if ($this->isCurrentUser(Request::read('id'))) {
            $usuario = new Usuario();
            $usuario->read();
            if (Util::verificarClave(Request::read('claveVieja'), $this->getModel()->getUsuario($usuario)->getClave())) {
                if (Request::read('claveRepetida') === $usuario->getClave()){
                    if($this->isAdvanced()) {
                        $resultado = $this->getModel()->editSelfUserAdvanced($usuario);
                    } else {
                        $resultado = $this->getModel()->editSelfUser($usuario);
                        $this->remail($usuario);
                        $this->cerrarsesion();
                    }
                }
            }
        }
        header('Location: index.php?ruta=index&op=editar&res=' . $resultado);
        exit();
    }
    
    function gorecuperar() {
        $this->getModel()->setDato('archivo', 'plantilla/recuperar.html');
    }
    
    function recuperar() {
        $usuario = new Usuario();
        $usuario->read();
        if($this->checkMail($usuario)) {
            $usuario = $this->getModel()->getFromCorreo($usuario);
            $this->correoRestauracion($usuario);
        }
        header('Location: index.php?ruta=index');
        exit();
    }
    
    function checkMail($usuario) {
        $r = false;
        $usuario = $this->getModel()->getFromCorreo($usuario);
        if( $usuario !== null) {
            $r = true;
        }
        return $r;
    }
    
    function correoRestauracion($usuario) {
        $enlace = '<a href="https://daw-mavalfer.c9users.io/DesarrolloServidor/mvc2k18/index.php?ruta=index&accion=recuperarcuenta&id=' . $usuario->getId() . '&data=' . sha1($usuario->getId().$usuario->getCorreo()). '">recupera tu cuenta</a>';
        $resultado2 = Util::enviarCorreo (Constants::CORREO, Constants::APPNAME, 'Mensaje con el enlace de activación: ' . $enlace);
    }
    
    function recuperarcuenta() {
        $id = Request::read('id');
        $data = Request::read('data');
        $this->getModel()->setDato('archivo', 'plantilla/cambiarpass.html');
        $this->getModel()->setDato('id', $id);
        $this->getModel()->setDato('data', $dato);
    }
    
    function cambiarpass() {
        $r = 0;
        $id = Request::read('id');
        $data = Request::read('data');
        $clave = Request::read('clave');
        $claveRepetida = Request::read('claveRepetida');
        if ($clave === $claveRepetida) {
            $r = $this->getModel()->cambiarPass($id, $data, $clave);    
        }
        header('Location: index.php?ruta=index&op=cambiarpass&res=' . $r);
        exit();
    }
}