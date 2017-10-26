<?php

class DataBase {
    
    private $conexion, $sentencia; //conexion tiene que ser una variable de instancia
    
    function __construct($clase = 'Constants'){ //se puede poner la conexion en el constructor, porque la podiramos sacar a una funcion pero la vamos a llamar siempre de todas formas. El parametro es la clase donde sten las constantes de conexion, en caso de que no s elo digamos por defecto cogera la clase Constants. No es necesario require porque esta en la carpeta en la que mira el autoload
        try{
            $this->conexion = new PDO(
                'mysql:host=' . $clase::SERVER . ';dbname=' . $clase::DATABASE,
                $clase::USER,
                $clase::PASSWORD,
                array(
                    PDO::ATTR_PERSISTENT => true,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8'
                )
            );
        }catch (PDOException $e){        
            $this->conexion = null;
        }
    }
        
    function execute($sql, array $parametros = array()){ //parametros tiene un array vacio como valor por defecto para poder hacerlo sin parametros
        $this->sentencia = $this->conexion->prepare($sql);
        foreach ($parametros as $nombreDelParametro => $valorDelParametro) {
            $this->sentencia->bindValue($nombreDelParametro, $valorDelParametro);   
        }
        $r = $this->sentencia->execute(); //devuelve true o false
        
        /* DEPURACION poner dos slashes al principio de la linea para descomentar
        echo $sql . '<br>';
        echo Util::varDump($parametros);
        echo Util::varDump($this->sentencia->errorInfo());
        //*/
        
        return $r;
    }
    
    function isConnected() {
        return $this->conexion !== null;
    }
    
    function closeConnection() {
        $this->conexion = null;
    }
    
    function getRowNumber() { //devolvera el numeor de filas afectadas en la ultima operacion
        return $this->sentencia->rowCount();
    }
    
    function getId() { //devuelve el id del ultimo elemento insertado
        return $this->conexion->lastInsertId();
    }
    
    function getStatement() {
        return $this->sentencia;
    }
    
    
    
}
