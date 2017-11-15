<?php

class Util {
    
    static function renderHtmlSelect(array $array, $name, $valor = null) {
        $html = '<select name="' . $name . '">';
        foreach ($array as $key => $value) {
            $selected = '';
            if ($valor == $key) {
                $selected = 'selected="selected"';
            }
            $html .= '<option ' . $selected . 'value=' . $key . '>' . $value . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    static function renderSelectEstadoCivil($name, $valor = null){
        $array = array(
            "" => "",
            1 => 'soltero',
            2 => 'casado',
            3 => 'divorciado',
            4 => 'viudo',
            5 => 'de hecho',
            6 => 'otro'
        );
        return self::renderHtmlSelect($array, $name, $valor);
    }

    static function varDump($valor){
        return '<pre>' . var_export($valor, true) . '</pre>';   
    }
}
