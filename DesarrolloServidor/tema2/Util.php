<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Util
 *
 * @author daw
 */
class Util {
    //put your code here
    static function varDump($valor) {
        return '<pre>' . var_export($valor, true) . '</pre>';
    }
}
