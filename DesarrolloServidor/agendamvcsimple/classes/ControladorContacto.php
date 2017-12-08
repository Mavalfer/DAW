<?php

class ControladorContacto extends Controlador { 

    function dodelete(){
        echo '7º la acción dodelete<br>';
        $this->getModel()->setDato('estoy en la ruta index en la acción saludo');
    }
    function doedit(){
        echo '7º la acción doedit<br>';
        $this->getModel()->setDato('estoy en la ruta index en la acción saludo');
    }
    function doinsert(){
        echo '7º la acción doinsert<br>';
        $this->getModel()->setDato('estoy en la ruta index en la acción saludo');
    }
    function viewedit(){
        echo '7º la acción viewedit<br>';
        $this->getModel()->setDato('estoy en la ruta index en la acción saludo');
    }
    function viewinsert(){
        echo '7º la acción viewinsert<br>';
        $this->getModel()->setDato('estoy en la ruta index en la acción saludo');
    }
    function index(){
        echo '7º la acción index<br>';
        $this->getModel()->setDato('estoy en la ruta contacto en la accion index');
    }
}