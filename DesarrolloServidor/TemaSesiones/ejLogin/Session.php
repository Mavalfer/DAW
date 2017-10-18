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
    
    function getUser() { /*las funciones de user las hemos hecho para ahorrar poner el user*/
        return $this->get('__user');
    }
    
    function setUser($user) {
        $this->set('__user', $user);
    }
    
    function removeUser() {
        $this->remove('__user');
    }
    
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
}