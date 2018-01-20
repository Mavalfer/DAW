<?php

class ControladorUsuario extends Controlador { 

    function __construct(Modelo $modelo) {
        parent::__construct($modelo);
    }

    function index() {
        if($this->isLogged()){
            $this->getModel()->setDato('archivo', 'plantilla/index.html');
            $this->getModel()->setDato('usuario', $this->getSesion()->getUser()->getNombre());
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
                $lineaAdmin = $linea .= '<td><a href="?ruta=index&accion=editarusuarioadministrador&id={{id}}">editar</a></td>
                                        <td><a href="?ruta=index&accion=borrarusuarioadmin&id={{id}}">borrar</a></td>
                                     </tr>';
                foreach($usuarios as $indice => $usuario) {
                    $r = Util::renderText($lineaAdmin, $usuario->getAttributesValues());
                    $todo .= $r;
                }
                $this->getModel()->setDato('lineasUsuario', $todo);
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
            $usuario->setFechaAlta('hoy');
            $resultado = $this->getModel()->registrar($usuario);
        }
        header('Location: index.php?ruta=index&op=registrar&res=' . $resultado);
        exit();
    }
    
    function borrarusuarioadmin() {
        if($this->isAdministrator()){
            $this->getModel()->setDato('archivo', 'plantilla/borrarusuario.html');
            $this->getModel()->setDato('id', Request::read('id'));
        }
    }

    function borrar() {
        $resultado = 0;
        if($this->isAdministrator()){
            $usuario = new Usuario();
            $usuario->setId(Request::read('id'));
            $resultado = $this->getModel()->borrarUsuario($usuario);
        }
        header('Location: index.php?ruta=index&op=borrar&res=' . $resultado);
        exit();
    }
    
}