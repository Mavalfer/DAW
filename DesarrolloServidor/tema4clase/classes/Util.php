<?php

class Util {
    
    static function varDump($valor){
        return '<pre>' . var_export($valor, true) . '</pre>';   
    }
}
