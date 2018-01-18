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

    function login(Usuario $usuario){
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
}