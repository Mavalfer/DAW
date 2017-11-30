<?php

class Modelo {
    
    private $dataBase;
    private $datos;
    
    function __construct() {
        $this->dataBase = new DataBase();
        $this->datos = array();
    }
    
    function __destruct() {
        $this->dataBase->closeConnection();
    }
    
    function addUsuario(Usuario $usuario){
        $manager = new ManageUsuario($this->dataBase);
        $resultado = $manager->addUsuario($usuario);
        if($resultado > 0) {
            return $usuario->getId();
        }
        return -1;
    }
    
    function getDato($nombre) {
        return $this->datos[$nombre];
    }
    
    function getDatos() {
        return $this->datos;
    }
    
    function login(Usuario $usuario){
        $manager = new ManageUsuario($this->dataBase);
        $usuarioBD = $manager->getFromCorreo($usuario->getCorreo());
        $r = false;
        if($usuarioBD !== null) {
            $r = Util::verificarClave($usuario->getClave(), $usuarioBD->getClave());
            if($r && $usuarioBD->isVerificado() === '1') {
                $r = $usuarioBD;
            }
        }
        return $r;
    }
    
    function setDato($nombre, $dato) {
        $this->datos[$nombre] = $dato;
    }
    
    function verificarUsuario($id, $data) {
        $manager = new ManageUsuario($this->dataBase);
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