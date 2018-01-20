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

    /*function login(Usuario $usuario){
        $manager = new ManageUsuario($this->getDataBase());
        $usuarioBD = $manager->getFromCorreo($usuario->getCorreo());
        $r = false;
        if($usuarioBD !== null) {
            $verifica = Util::verificarClave($usuario->getClave(), $usuarioBD->getClave());
            if($verifica && $usuarioBD->isVerificado() === '1') {
                $r = $usuarioBD;
            }
        }
        return $r;
    }*/

    function loguear(Usuario $usuario) {
        $r = -1;
        $manager = new ManageUsuario($this->getDataBase());
        $usuarioBD = $manager->getFromCorreo($usuario->getCorreo());
        if($usuarioBD === null) {
            $r = -1;
        } else {
            $r = Util::verificarClave($usuario->getClave(), $usuarioBD->getClave());
            if($r ) { //Cambiar cuando funcione el correo de verificacion añadir a la condicion && $usuarioBD->isVerificado() === '1'
                $r = $usuarioBD;
            } else {
                $r = 0;
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
      //  if($resultado > 0) {
          //  $enlace = '<a href="https://curso1718-izvdamdaw.c9users.io/mvc2018/index.php?ruta=index&accion=activar&id=' . $resultado . '&data=' . sha1($resultado.$usuario->getCorreo()). '">activate</a>';
           // $resultado2 = Util::enviarCorreo (Constants::CORREO, Constants::APPNAME, 'Mensaje con el enlace de activación: ' . $enlace);
       // }
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
}