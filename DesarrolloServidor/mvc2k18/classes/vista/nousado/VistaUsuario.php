<?php

class VistaUsuario extends Vista {
    /*private function index() {
        $archivo = $this->getModel()->getDato('archivo');
        if (!file_exists($archivo)) {
            return '<h1>Error 404</h1>';
        }

        $header = file_get_contents('plantilla/_header.html');
        $texto  = file_get_contents($archivo);
        $footer = file_get_contents('plantilla/_footer.html');

        $texto = $header . $texto . $footer;
        $datos = $this->getModel()->getDatos();

        foreach($datos as $indice => $dato) {
            $texto = str_replace('{{' . $indice . '}}', $dato, $texto);
        }

        return $texto;
    }*/
}