<?php

class ManageContactoTelefono {

    private $db;

    function __construct(DataBase $db) {
        $this->db = $db;
    }

    function countTelefonos($idContacto){
        $sql = 'SELECT count(*) cuenta FROM telefono where idContacto = :idContacto';
        $params = array(
            'idContacto' => $idContacto
        );
        $res = $this->db->execute($sql , $params);
        $cuenta = 0;
        if($res){
            $sentencia = $this->db->getStatement();
            if($fila = $sentencia->fetch()) {
                //echo Util::varDump($fila);
                $cuenta = $fila[0];
            }
        }
        return $cuenta;
    }
    
    function getAll() {
        $sql = 'select * from contacto co left join ' .
               'telefono te on co.id = te.idcontacto ' .
               'order by co.nombre, te.telefono';
        $resultado = $this->db->execute($sql);
        $contactosTelefonos = array();
        if($resultado){
            $sentencia = $this->db->getStatement();
            while($fila = $sentencia->fetch()) {
                $contacto = new Contacto();
                $contacto->set($fila);
                $telefono = new Telefono();
                $telefono->set($fila, 2);
                $contactosTelefonos[] = array('contacto' => $contacto,
                                                'telefono' => $telefono);
            }
        }
        return $contactosTelefonos;
    }

    function getWithContactId($id){
        $sql = 'SELECT * FROM telefono where idContacto = :idContacto';
        $params = array(
            'idContacto' => $id
        );
        $res = $this->db->execute($sql , $params);
        $telefonos = array();
        if($res){
            $sentencia = $this->db->getStatement();
            while($fila = $sentencia->fetch()){
                $telefono = new Telefono();
                $telefono->set($fila);
                $telefonos[] = $telefono;
            }
        }
        return $telefonos;
    }
    
    function count() {
        $sql = 'select count(*) from contacto co left join ' .
               'telefono te on co.id = te.idcontacto ';
        $resultado = $this->db->execute($sql);
        $cuenta = 0;
        if($resultado){
            $sentencia = $this->db->getStatement();
            if($fila = $sentencia->fetch()) {
                //echo Util::varDump($fila);
                $cuenta = $fila[0];
            }
        }
        return $contactosTelefonos;
    }

    
     function getAlllimit($offset, $rpp) {
        $sql = 'select * from contacto co left join ' .
               'telefono te on co.id = te.idcontacto ' .
               'order by co.nombre, te.telefono limit '. $offset . ', ' . $rpp;
        /*$params = array(
            'offset' => $offset,
            'rpp' => $rpp
        );*/
        $params = array();
        $resultado = $this->db->execute($sql, $params);
        $contactosTelefonos = array();
        if($resultado){
            $sentencia = $this->db->getStatement();
            while($fila = $sentencia->fetch()) {
                $contacto = new Contacto();
                $contacto->set($fila);
                $telefono = new Telefono();
                $telefono->set($fila, 2);
                $contactosTelefonos[] = array('contacto' => $contacto,
                                                'telefono' => $telefono);
            }
        }
        return $contactosTelefonos;
    }
}