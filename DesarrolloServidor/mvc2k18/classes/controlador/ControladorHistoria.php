<?php

class ControladorHistoria extends Controlador {
    
    private $mensajes = array (
        'ultimoadmin' => 'Eres el ultimo administrador, nombra otro antes de darte de baja'
    );

    function __construct(Modelo $modelo) {
        parent::__construct($modelo);
        $msg = Request::read('msg');
        if(isset($this->mensajes[$msg]))
               $this->getModel()->setDato('mensaje', $this->mensajes[$msg]);
    }
}