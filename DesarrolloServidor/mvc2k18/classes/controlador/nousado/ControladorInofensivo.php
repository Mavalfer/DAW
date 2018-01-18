<?php

class ControladorInofensivo extends Controlador {

    function accion() {
        $this->getModel()->setDato('mensaje', 'Estoy en la acción ACCIÓN de la ruta inofensiva.');
    }

    function gentelella() {
    }

    function index() {
        $this->getModel()->setDato('mensaje', 'Estoy en la acción index de la ruta inofensiva.');
    }
    
    function plantilla1() {
        $this->getModel()->setDato('archivo', 'inofensiva/_plantilla1.html');
    }
    
    function plantilla2() {
        $this->getModel()->setDato('archivo', 'inofensiva/_plantilla2.html');
    }
    
    function plantilla3() {
    }
    
    function plantilla4() {
        //bootsrap 1
        $this->getModel()->setDato('trozoquemefalta', 'plantilla/bootstrap/_archivo1.html');
    }

    function plantilla5() {
        //bootstrap 2
        $this->getModel()->setDato('trozoquemefalta', 'plantilla/bootstrap/_archivo2.html');
    }
}