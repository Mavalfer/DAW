<?php

class Request{
	
	/*Estos métodos van a leer los datos que lleguen*/
	
	static function get($nombre) {
		if(isset($_GET[$nombre])){
			return $_GET[$nombre];
		}
		
		return null; //se envía null si no llega nada
	}
	
	static function getpost($nombre){ //da preferencia al get ante al post, es como Request
		$valor = self::get($nombre);
		
		if($valor == null){
			$valor = self::post($nombre);
		}
		
		return $valor;
	}
	
	static function post($nombre){
		if(isset($_POST[$nombre])){
			return $_POST[$nombre];
		}
		
		return null; //se envía null si no llega nada
	}
	
	static function postget($nombre){ //da preferencia al post ante al get, es como Request
		$valor = self::post($nombre);
		
		if($valor == null){
			$valor = self::get($nombre);
		}
		
		return $valor;
	}
	
	static function read($nombre){
		return self::postget($nombre);
	}
}