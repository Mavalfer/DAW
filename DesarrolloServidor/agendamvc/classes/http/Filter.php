<?php

class Filter {

    static function isCondicionQueMeHeInventado($value) {
        return preg_match('/^[A-Za-z][A-Za-z0-9]{5,9}$/', $value);
    }

    static function isBoolean($value) {

    }

    static function isDate($value) {

    }

    static function isEmail($value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    static function isFloat($value) {

    }

    static function isInteger($value) {

    }

    static function isIP($value) {

    }

    static function isLogin($value) {
        //empieza por una letra y tiene al menos 5 caracteres, sin espacios
        //iniciales ni finales
    }

    static function isMaxLength($value, $length) {

    }

    static function isMinLength($value, $length) {

    }

    static function isNumber($value) {

    }

    static function isTime($value) {

    }

    static function isURL($value) {

    }
}