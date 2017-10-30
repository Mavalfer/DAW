<?php
require './Request.php';
class Filter {

    static function isCondicionQueMeHeInventado($value) {
        return preg_match('/^[A-Za-z][A-Za-z0-9]{5,9}$/', $value);    
    }
    
    static function isBoolean($value) {
        return is_bool($value);
    }

    static function isDate($value) {
        $res = true;
        if (strtotime($value) === false) {
            $res = false;
        }
        return $res;
    }

    static function isEmail($value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
        // ^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$.
    }

    static function isFloat($value) {
        return is_float($value);
    }

    static function isInteger($value) {
        return is_integer($value);
    }

    static function isIP($value) {
        return filter_var($value, FILTER_VALIDATE_IP);
    }

    static function isLogin($value) {
            //empieza por una letra y tiene al menos 5 caracteres sin espacios iniciales y finales
        return preg_match('/^[A-z][A-z0-9]{4,}$/', $value);
    }

    static function isMaxLength($value, $length) {
            //comprueba si un valor tiene como maximo $length caracteres
        $res = false;
        $string = (string) $value;
        if (strlen($string) <= $length) {
            $res = true;
            return $res;
        }
    }

    static function isMinLength($value, $length) {
        $res = false;
        $string = (string) $value;
        if (strlen($string) >= $length) {
            $res = true;
            return $res;
        }
    }

    static function isNumber($value) {
        return is_numeric($value);
    }

    static function isTime($value) {
            //diga si es una hora
        return preg_match('/^[0-2][0-3]:[0-5][0-9]$/', $value);
    }

    static function isURL($value) {
            //diga si es una url
        return filter_var($value, FILTER_VALIDATE_URL);
    }

}