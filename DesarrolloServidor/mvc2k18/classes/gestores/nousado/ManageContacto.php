<?php

class ManageContacto {

    private $db;

    function __construct(DataBase $db) {
        $this->db = $db;
    }

    public function add($objeto) {
        //sentencia preparada
        $sql = 'INSERT INTO contacto(id, nombre) VALUES (null, :nombre)';
        $params = array(
            'nombre' => $objeto->getNombre()
        );
        $resultado = $this->db->execute($sql, $params);//true o false
        if($resultado) {
            $id = $this->db->getId();
            $objeto->setId($id);
        } else {
            $id = 0;
        }
        return $id;
    }

    public function edit($objeto) {
        $sql = 'UPDATE contacto SET nombre = :nombre WHERE id = :id';
        $params = array(
            'nombre' => $objeto->getNombre(),
            'id'     => $objeto->getId()
        );
        $resultado = $this->db->execute($sql, $params);//true o false
        if($resultado) {
            $filasAfectadas = $this->db->getRowNumber();//0, 1
        } else {
            $filasAfectadas = -1;
        }
        return $filasAfectadas;
    }

    public function get($id) {
        $sql = 'SELECT * FROM contacto WHERE id = :id';
        $params = array(
            'id'     => $id
        );
        $resultado = $this->db->execute($sql, $params);//true o false
        $sentencia = $this->db->getStatement();
        $contacto = new Contacto();
        if($resultado && $fila = $sentencia->fetch()) {
            $contacto->set($fila);
        } else {
            $contacto = null;//si la consulta falla o no encuentra el contacto
        }
        return $contacto;
    }

    public function getAll() {
        $sql = 'SELECT * FROM contacto order by nombre';
        $resultado = $this->db->execute($sql);
        $contactos = array();
        if($resultado){
            $sentencia = $this->db->getStatement();
            while($fila = $sentencia->fetch()) {
                $contacto = new Contacto();
                $contacto->set($fila);
                $contactos[] = $contacto;
            }
        }
        return $contactos;
    }

    public function remove($id) {
        $sql = 'DELETE FROM contacto WHERE id = :id';
        $params = array(
            'id'     => $id
        );
        $resultado = $this->db->execute($sql, $params);//true o false
        if($resultado) {
            $filasAfectadas = $this->db->getRowNumber();//0, 1
        } else {
            $filasAfectadas = -1;
        }
        return $filasAfectadas;
    }

}