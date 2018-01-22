<?php

class ModeloUsuario extends Modelo {

    function addUsuario(Usuario $usuario){
        $manager = new ManageUsuario($this->getDataBase());
        $resultado = $manager->addUsuario($usuario);
        if($resultado > 0) {
            return $usuario->getId();
        }
        return -1;
    }

    function loguear(Usuario $usuario) {
        $r = -1;
        $manager = new ManageUsuario($this->getDataBase());
        $usuarioBD = $manager->getFromCorreo($usuario->getCorreo());
        if($usuarioBD === null) {
            $r = -1;
        } else {
            $r = Util::verificarClave($usuario->getClave(), $usuarioBD->getClave());
            if($r && $usuarioBD->isVerificado()) { 
                $r = $usuarioBD;
            } else {
                $r = 0;
            }
        }
        return $r;
    }

    function activarUsuario($id, $sha1IdCorreo) {
        $manager = new ManageUsuario($this->getDataBase());
        $usuarioBD = $manager->get($id);
        $r = -1;
        if($usuarioBD !== null) {
            $sha1 = sha1($usuarioBD->getId() . $usuarioBD->getCorreo());
            if($sha1IdCorreo === $sha1) {
                $usuarioBD->setVerificado(1);
                $r = $manager->editSinClave($usuarioBD);
            }
        }
        return $r;
    }

    function verificarUsuario($id, $data) {
        $manager = new ManageUsuario($this->getDataBase());
        $usuarioBD = $manager->get($id);
        $r = -1;
        if($usuarioBD !== null) {
            $sha1 = sha1($usuarioBD->getId() . $usuarioBD->getCorreo());
            if($data === $sha1) {
                $usuarioBD->setVerificado(1);
                $r = $manager->editSinClave($usuarioBD);
            }
        }
        return $r;
    }
    
    function registrar(Usuario $usuario) {
        $manager = new ManageUsuario($this->getDataBase());
        $resultado = $manager->addUsuario($usuario);
        if($resultado > 0) {
            $enlace = '<a href="https://daw-mavalfer.c9users.io/DesarrolloServidor/mvc2k18/index.php?ruta=index&accion=activar&id=' . $resultado . '&data=' . sha1($resultado.$usuario->getCorreo()). '">activate</a>';
            $resultado2 = Util::enviarCorreo (Constants::CORREO, Constants::APPNAME, 'Mensaje con el enlace de activación: ' . $enlace);
        }
        return $resultado;
    }
    
    
    
    function getUsuarios() {
        $manager = new ManageUsuario($this->getDataBase());
        return $manager->getAll();
    }
    
    function getUsuario($usuario) {
        $manager = new ManageUsuario($this->getDataBase());
        return $manager->get($usuario->getId());
    }
    
    function borrarUsuario($usuario) {
        $manager = new ManageUsuario($this->getDataBase());
        return $manager->remove($usuario->getId());
    }
    
    function editarUsuario($usuario) {
        $manager = new ManageUsuario($this->getDataBase());
        return $manager->edit($usuario);
    }
    
    function editSelfUser($usuario) {
        $manager = new ManageUsuario($this->getDataBase());
        return $manager->editSinTipo($usuario);
    }
    
    function editSelfUserAdvanced($usuario) {
        $manager = new ManageUsuario($this->getDataBase());
        return $manager->editSinTipoAdvanced($usuario);
    }
    
    function numeroAdmins() {
        $manager = new ManageUsuario($this->getDataBase());
        return $manager->getNumAdmins();
    }
    
    function getFromCorreo($usuario) {
        $manager = new ManageUsuario($this->getDataBase());
        return $manager->getFromCorreo($usuario->getCorreo());
    }
    
    function cambiarPass($id, $sha1IdCorreo, $clave) {
        $manager = new ManageUsuario($this->getDataBase());
        $usuarioBD = $manager->get($id);
        $r = -1;
        if($usuarioBD !== null) {
            $sha1 = sha1($usuarioBD->getId() . $usuarioBD->getCorreo());
            if($sha1IdCorreo === $sha1) {
                $usuarioBD->setClave($clave);
                $r = $manager->edit($usuarioBD);
            }
        }
        return $r;
    }
}