<?php
class Session {
    function __construct($name = null) {
        if ($name !== null) {
            session_name($name); 
        }
        session_start();
    }
    
    function get($name, $value = null) { /*los puristas dicen que un metodo debe tener un solo return*/
        $res = $value; /*le puedo dar el valor que quiero que me devuelva si no esta*/
        if (isset($_SESSION[$name])) {
            $res = $_SESSION[$name];
        }
        return $res;
    }
    
    /*==Funciones de usuarios=======*/
    function getUser() { /*las funciones de user las hemos hecho para ahorrar poner el user*/
        return $this->get('__user');
    }
    
    function setUser($user) {
        $this->set('__user', $user);
    }
    
    function removeUser() {
        $this->remove('__user');
    }
    /*============*/
    
    function set($name, $value) {
        $_SESSION[$name] = $value;
    }
    
    function remove($name) {
        unset($_SESSION[$name]);
    }
    
    function close() {
        unset($_SESSION);
        session_destroy();
    }
    
    /*Funciones para las cookies*/
    
    function getNav() {
        $res = null; 
        if (isset($_SERVER['HTTP_USER_AGENT'])) {
            $res = $_SERVER['HTTP_USER_AGENT'];
        }
        return $res;
    }
    
    function getLang() {
        $res = null; 
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $res = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        }
        return $res;
    }
    
    function getAddr() {
        $res = null; 
        if (isset($_SERVER['REMOTE_ADDR'])) {
            $res = $_SERVER['REMOTE_ADDR'];
        }
        return $res;
    }
    
    function chkNav($value) {
        $res = false;
        if ($value === $this->getNav()) {
            $res = true;
        }   
        return $res;
    }
    
    function chklang($value) {
        $res = false;
        if ($value === $this->getLang()) {
            $res = true;
        }   
        return $res;
    }
    
    function chkAddr($value) {
        $res = false;
        if ($value === $this->getAddr()) {
            $res = true;
        }   
        return $res;
    }
    
    
}


















