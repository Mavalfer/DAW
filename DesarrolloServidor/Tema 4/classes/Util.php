<?php

class Util{
    
    static function varDump($valor){ //método para hacer un var_dump de forma más bonita
        return '<pre>' . var_export($valor, true) . '</pre>';
    }
    
    static function selector($array =  array()){
        $cadena = '<select name="id">';
        for($i = 0; $i < count($array); $i++){
            $cadena .= '<option value="' . $array[$i][0] . '">' . $array[$i][1] . '</option>';
        }
        $cadena .= '</select>';
        return $cadena;
    }
}