<?php

class VistaContacto extends Vista {

    function render($accion) {
        echo '10º empieza el render<br>';
        return '<span style="color: #ff00ff;">'.$this->getModel()->getDato().'</span>';
    }
}