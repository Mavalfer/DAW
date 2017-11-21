<?php

class ManageUsuario {

    private $db;

    function __construct(DataBase $db) {
        $this->db = $db;
    }

    public function add(Usuario $objeto) {
        $sql = 'insert into usuario(correo, clave, verificado) values (:correo, :clave, :verificado)';
        $params = array(
            'correo' => $objeto->getCorreo(),
            'clave' => $objeto->getClave(),
            'verificado' => $objeto->getVerificado()
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

    public function addUsuario(Usuario $objeto) {
        $sql = 'insert into usuario(correo, clave, verificado) values (:correo, :clave, 0)';
        $params = array(
            'correo' => $objeto->getCorreo(),
            'clave' => $objeto->getClave()
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

    public function edit(Usuario $objeto) {
        $sql = 'update usuario set correo = :correo , clave = :clave, verificado = :verificado where id = :id';
        $params = array(
            'correo' => $objeto->getCorreo(),
            'clave' => $objeto->getClave(),
            'verificado' => $objeto->getVerificado(),
            'id' => $objeto
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
        $sql = 'select * from usuario where id = :id';
        $params = array(
            'id' => $id
        );
        $resultado = $this->db->execute($sql, $params);//true o false
        $sentencia = $this->db->getStatement();
        $objeto = new Usuario();
        if($resultado && $fila = $sentencia->fetch()) {
            $objeto->set($fila);
        } else {
            $objeto = null;
        }
        return $objeto;
    }

    public function getAll() {
        $sql = 'select * from usuario where 1';
        $resultado = $this->db->execute($sql);
        $objetos = array();
        if($resultado){
            $sentencia = $this->db->getStatement();
            while($fila = $sentencia->fetch()) {
                $objeto = new Usuario();
                $objeto->set($fila);
                $objetos[] = $objeto;
            }
        }
        return $objetos;
    }

    public function getFromCorreo($correo) {
        $sql = 'select * from usuario where correo = :correo';
        $params = array(
            'correo' => $correo
        );
        $resultado = $this->db->execute($sql, $params);//true o false
        $sentencia = $this->db->getStatement();
        $objeto = new Usuario();
        if($resultado && $fila = $sentencia->fetch()) {
            $objeto->set($fila);
        } else {
            $objeto = null;
        }
        return $objeto;
    }
    
    public function remove($id) {
        $sql = 'delete from usuario where id = :id';
        $params = array(
            'id' => $id
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