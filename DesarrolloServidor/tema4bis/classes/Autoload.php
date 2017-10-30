<?php

class Autoload {
 static function searchClass($className) {
 $ruta = dirname(__FILE__) . '/' . $className . '.php';  //calcula la carpeta en la que esta
 if (file_exists($ruta)) {
 require_once($ruta);
 }
 }
}

spl_autoload_register('AutoLoad::searchClass');  /*una de las pocas veces que pondremos codigo despues de la clase, es la instruccion de registro que llama al metodo para buscar la clase*/