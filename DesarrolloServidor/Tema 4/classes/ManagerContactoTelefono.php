<?php
class ManagerContactoTelefono implements Manager{
    
    private $database;
    
    function __construct(DataBase $db){
        $this->database = $db;
    }
    
    function add($objeto){
        
    }
    
    function edit($objeto){
        
    }
    
    function get($id){
        
    }
    
    function countTelefonos($id){
        $sql = 'SELECT count(*) FROM telefono where idContacto = :idContacto';
        $params = array(
            'idContacto' => $id
        );
        $res = $this->database->execute($sql , $params);
        $cuenta = 0;
        $telefonos = array();
        if($res){
            $sentencia = $this->database->getStatement();
            if($fila = $sentencia->fetch()){
                /*echo Util::varDump()*/
                $cuenta = $fila[0];
            }
        }
        return $cuenta;
    }
    
    function getAll(){
        $sql = 'SELECT * FROM contacto co LEFT JOIN telefono te ON co.id = te.idContacto ORDER BY co.nombre, te.telefono';
        $res = $this->database->execute($sql);
        $datos = array();
        if($res){
            $sentencia = $this->database->getStatement();
            while($fila = $sentencia->fetch()){
                $contacto = new Contacto();
                $contacto->set($fila);
                $telefono = new Telefono();
                $telefono->set($fila, 2);
                $datos[] = array (
                    'contacto' => $contacto,
                    'telefono' => $telefono
                    );
            }
        }
        return $datos;
    }
    
    function getWithContactId($id){
        $sql = 'SELECT * FROM telefono where idContacto = :idContacto';
        $params = array(
            'idContacto' => $id
        );
        $res = $this->database->execute($sql , $params);
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
        
    }
    
    function getNombreContactoFromTelefono($idTelefono) {
        $sql = 'select nombre from contacto co join telefono te on co.id = te.idContacto where te.id = :idTelefono';
        $params = array(
            'idTelefono' => $id
        );
        $res = $this->database->execute($sql , $params);
        
    }
    
}    