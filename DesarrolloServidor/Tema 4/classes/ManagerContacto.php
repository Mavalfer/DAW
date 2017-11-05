<?php

class ManagerContacto implements Manager{
    
    private $database;
    
    function __construct(DataBase $db){
        $this->database = $db;
    }
    
    /**
     * Metodo que realiza un alta de un contacto nuevo
     * 
     * @params Contacto $objeto debe ser un objeto de la clase contacto, que se va a insertar en la base de datos.
     * @return int es el codigo autonumerico del objeto insertado, en caso de error devuelve 0
     */
    function add($objeto){
        $sql = 'INSERT INTO contacto(id, nombre) VALUES (null , :nombre)';
        $params = array(
            'nombre' => $objeto->getNombre()
        );
        $res = $this->database->execute($sql , $params);
        
        if($res){
            $id = $this->database->getId();
            $objeto->setId($id);
        }else{
            $id = 0;
        }
        
        return $id;
    }
    
    function edit($objeto){
        $sql = 'UPDATE contacto SET nombre = :nombre WHERE id = :id';
        $params = array(
            'id' => $objeto->getId(),
            'nombre' => $objeto->getNombre() 
        );
        
        $res = $this->database->execute($sql , $params);
        
        if($res){
            $filasAfectadas = $this->database->getRowNumber();
        }else{
            $filasAfectadas = -1;
        }
        return $filasAfectadas;
    }
    
    function get($id){
        $sql = 'SELECT * FROM contacto  WHERE id = :id';
        $params = array(
            'id' => $id
        );
        
        $res = $this->database->execute($sql , $params);
        $sentencia = $this->database->getStatement();
        $contacto = new Contacto();
        
        if($res && $fila = $sentencia->fetch()){
            $contacto->set($fila);     
        }else{
            $contacto = null;
        }
        return $contacto;
    }
    
    function getAll(){
        $sql = 'SELECT * FROM contacto';
        $res = $this->database->execute($sql);
        $contactos = array();
        if($res){
            $sentencia = $this->database->getStatement();
            while($fila = $sentencia->fetch()){
                $contacto = new Contacto();
                $contacto->set($fila);
                $contactos[] = $contacto;
            }
        }
        return $contactos;
    }
    
    function remove($id){
        $sql = 'DELETE FROM contacto  WHERE id = :id';
        $params = array(
            'id' => $id
        );
        
        $res = $this->database->execute($sql , $params);
        
        if($res){
            $filasAfectadas = $this->database->getRowNumber();
        }else{
            $filasAfectadas = -1;
        }
        return $filasAfectadas;
    }
    
    function getDataForSelect(){
        $array = $this->getAll();
        $objetos = array();
        for($i = 0; $i < count($array); $i++){
            $objetos[] = array(
                0 => $array[$i]->getId(),
                1 => $array[$i]->getNombre(),
                );
        }
        return $objetos;
    }
}