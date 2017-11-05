<?php
class ManagerTelefono implements Manager{
    
    private $database;
    
    function __construct(DataBase $db){
        $this->database = $db;
    }
    
    function add($objeto){
        $sql = 'INSERT INTO telefono(id, idContacto, telefono, descripcion) VALUES (null , :idContacto, :telefono , :descripcion)';
        $params = array(
            'idContacto' => $objeto->getIdContacto(),
            'telefono' => $objeto->getTelefono(),
            'descripcion' => $objeto->getDescripcion(),
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
        $sql = 'UPDATE telefono SET idContacto = :idContacto, telefono = :telefono, descripcion = :descripcion WHERE id = :id';
        $params = array(
            'id' => $objeto->getId(),
            'idContacto' => $objeto->getIdContacto(),
            'telefono' => $objeto->getTelefono(), 
            'descripcion' => $objeto->getDescripcion(), 
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
        $sql = 'SELECT * FROM telefono  WHERE id = :id';
        $params = array(
            'id' => $id
        );
        
        $res = $this->database->execute($sql , $params);
        $sentencia = $this->database->getStatement();
        $telefono = new Telefono();
        
        if($res && $fila = $sentencia->fetch()){
            $telefono->set($fila);     
        }else{
            $telefono = null;
        }
        return $telefono;
    }
    
    function getAll(){
        $sql = 'SELECT * FROM telefono';
        $res = $this->database->execute($sql);
        $telefonos = array();
        if($res){
            $sentencia = $this->database->getStatement();
            while($fila = $sentencia->fetch()){
                $telefono = new Telefono();
                $telefono->set($fila);
                $telefonos[] = $telefono;
            }
        }
        return $telefonos;
    }
    
    function remove($id){
        $sql = 'DELETE FROM telefono  WHERE id = :id';
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
}

