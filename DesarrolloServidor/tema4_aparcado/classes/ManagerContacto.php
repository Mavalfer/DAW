<?php

class ManagerContacto {
    
    private $table = 'contacto', $dataBase;
    
    function _construct($dataBase = null) {
        if($dataBase === null) {
            $database = new DataBase();
        }
        $this->dataBase = $dataBase;
    }
    
    function insert(Contacto $contacto) {
        $sql = 'insert into contacto(nombre) values (:nombre)';

        $params = array(
            'nombre' => $contacto->getNombre()
        );
        $r = 0;
        $res = $this->dataBase->execute($sql, $params);
        if($res) {
            $r = $this->dataBase->getId();
        }
        return $r;
    }
    
    function update(Contacto $contacto) {
        $sql = 'update contacto set nombre = :nombre where id = :id';

        $params = array(
            'id' => $contacto->getId();
            'nombre' => $contacto->getNombre()
        );
        $r = 0;
        $res = $this->dataBase->execute($sql, $params);
        if($res) {
            $r = $this->dataBase->getRowNumber();
        }
        return $r;
    }
}