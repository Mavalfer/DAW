<?php

class ManageTelefono {
    
    private $db;

    function __construct(DataBase $db) {
        $this->db = $db;
    }

    public function add($objeto) {
        $sql = 'INSERT INTO telefono(id, idcontacto, telefono, descripcion)'
                . ' VALUES (null, :idcontacto, :telefono, :descripcion)';
        $params = array(
            'idcontacto' => $objeto->getIdcontacto(),
            'telefono' => $objeto->getTelefono(),
            'descripcion' => $objeto->getDescripcion()
        );
        $resultado = $this->db->execute($sql, $params);
        if($resultado) {
            $id = $this->db->getId();
            $objeto->setId($id);
        } else {
            $id = 0;
        }
        return $id;
    }

    public function edit($objeto) {
        $sql = 'UPDATE telefono SET idcontacto = :idcontacto,'
                . 'telefono = :telefono, descripcion = :descripcion WHERE id = :id';
        $params = array(
            'idcontacto' => $objeto->getIdcontacto(),
            'telefono' => $objeto->getTelefono(),
            'descripcion' => $objeto->getDescripcion(),
            'id' => $objeto->getId()
        );
        $resultado = $this->db->execute($sql, $params);
        if($resultado) {
            $filasAfectadas = $this->db->getRowNumber();
        } else {
            $filasAfectadas = -1;
        }
        return $filasAfectadas;
    }

    public function get($id) {
        $sql = 'SELECT * FROM telefono WHERE id = :id';
        $params = array(
            'id'     => $id
        );
        $resultado = $this->db->execute($sql, $params);
        $sentencia = $this->db->getStatement();
        $telefono = new Telefono();
        if($resultado && $fila = $sentencia->fetch()) {
            $telefono->set($fila);
        } else {
            $telefono = null;
        }
        return $telefono;
    }

    public function getAll() {
        $sql = 'SELECT * FROM telefono order by idcontacto';
        $resultado = $this->db->execute($sql);
        $telefonos = array();
        if($resultado){
            $sentencia = $this->db->getStatement();
            while($fila = $sentencia->fetch()) {
                $telefono = new Telefono();
                $telefono->set($fila);
                $telefonos[] = $telefono;
            }
        }
        return $telefonos;
    }
    
    public function getAllTelefonosFromContacto($idContacto) {
        $sql = 'SELECT * FROM telefono where idcontacto = :idcontacto';
        $params = array(
            'idcontacto'     => $idContacto
        );
        $resultado = $this->db->execute($sql);
        $telefonos = array();
        if($resultado){
            $sentencia = $this->db->getStatement();
            while($fila = $sentencia->fetch()) {
                $telefono = new Telefono();
                $telefono->set($fila);
                $telefonos[] = $telefono;
            }
        }
        return $telefonos;
    }

    public function remove($id) {
        $sql = 'DELETE FROM telefono WHERE id = :id';
        $params = array(
            'id'     => $id
        );
        $resultado = $this->db->execute($sql, $params);
        if($resultado) {
            $filasAfectadas = $this->db->getRowNumber();
        } else {
            $filasAfectadas = -1;
        }
        return $filasAfectadas;
    }
    
    public function removeFromContacto($id) {
        $sql = 'DELETE FROM telefono WHERE idcontacto = :idcontacto';
        $params = array(
            'idcontacto'     => $id
        );
        $resultado = $this->db->execute($sql, $params);
        if($resultado) {
            $filasAfectadas = $this->db->getRowNumber();
        } else {
            $filasAfectadas = -1;
        }
        return $filasAfectadas;
    }
}