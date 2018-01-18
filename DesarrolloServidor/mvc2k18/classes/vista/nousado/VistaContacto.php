<?php

class VistaContacto extends Vista {

    function render($accion) {
        return '<span style="color: #ff00ff;">'.$this->getModel()->getDato('contenido').'</span>';
    }
}