<?php

class Filter {

    static function isBoolean($value) {
        $res = false;
        if($value === TRUE || $value === FALSE){
            $res = true;
        }
        return $res;
    }

    static function isDate($value) {
        return validateDate($value);
    }

    static function isEmail($value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    static function isFloat($value) {
        return filter_var($value, FILTER_VALIDATE_FLOAT);
    }

    static function isInteger($value) {
        return filter_var($value, FILTER_VALIDATE_FLOAT);
    }

    static function isIP($value) {
        return filter_var($value, FILTER_VALIDATE_IP);
    }

    static function isLogin($value) {
        return preg_match('/^[A-Za-z][A-Za-z0-9]{4,}$/', $value);
    }

    static function isMaxLength($value, $length) {
        $res = false;
        if(strlen ($value) <= $length){
            $res = true;
        }
        return $res;
    }

    static function isMinLength($value, $length) {
        $res = false;
        if(strlen ($value) >= $length){
            $res = true;
        }
        return $res;
    }

    static function isNumber($value) {
        return is_numeric($value);
    }

    static function isTime($value) {
        return preg_match('/^([0-1][0-9]|[2][0-3])[\:]([0-5][0-9])[\:]([0-5][0-9])$/', $value);
    }

    static function isURL($value) {
        return filter_var($value, FILTER_VALIDATE_URL);
    }

    static function isCondicionQueMeHeInvetado($expresion, $value){
        return preg_match($expresion, $value);
    }
}