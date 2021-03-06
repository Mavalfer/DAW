<?php
class Session {
    function __construct($name = null) {
        if($name !== null){
            session_name($name);
        }
        session_start();
    }
    
    function get($name, $value = null){
        $res = $value;
        if(isset($_SESSION[$name])){
            $res = $_SESSION[$name];
        }
        return $res;
    }
    
    function set($name, $value){
        $_SESSION[$name] = $value;
    }
    
    function remove($name){
        unset($_SESSION[$name]);
    }
    
    function close(){
        unset($_SESSION);
        session_destroy();
    }
    
    function getUser(){
        return $this->get('__user');
    }
    
    function setUser($value){
       $this->set('__user', $value);
    }
    
    function removeUser(){
        $this->remove('__user');
    }
}
