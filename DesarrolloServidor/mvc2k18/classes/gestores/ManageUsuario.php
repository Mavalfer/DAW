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
            'clave' => Util::encriptar($objeto->getClave()),
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
        $sql = 'insert into usuario(nombre, apellidos, alias, correo, clave, tipo, fechaalta, verificado) values (:nombre, :apellidos, :alias, :correo, :clave, :tipo, :fechaalta, 0)';
        $params = array(
            'nombre' => $objeto->getNombre(),
            'apellidos' => $objeto->getApellidos(),
            'alias' => $objeto->getAlias(),
            'correo' => $objeto->getCorreo(),
            'clave' => Util::encriptar($objeto->getClave()),
            'tipo' => $objeto->getTipo(),
            'fechaalta' => $objeto->getFecha()
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
        $sql = 'update usuario set nombre = :nombre, apellidos = :apellidos, alias = :alias, correo = :correo , clave = :clave, tipo = :tipo, verificado = :verificado where id = :id';
        $params = array(
            'nombre' => $objeto->getNombre(),
            'apellidos' => $objeto->getApellidos(),
            'alias' => $objeto->getAlias(),
            'correo' => $objeto->getCorreo(),
            'clave' => Util::encriptar($objeto->getClave()),
            'tipo' => $objeto->getTipo(),
            'verificado' => $objeto->getVerificado(),
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

    public function editClave(Usuario $objeto) {
        $sql = 'update usuario set clave = :clave where id = :id';
        $params = array(
            'clave' => Util::encriptar($objeto->getClave()),
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

    public function editSinClave(Usuario $objeto) {
        $sql = 'update usuario set nombre = :nombre, apellidos = :apellidos, alias = :alias, correo = :correo, tipo = :tipo, verificado = :verificado where id = :id';
        $verificado = 0;
        if ($objeto->getVerificado()) {
            $verificado = 1;
        }
        $params = array(
            'nombre' => $objeto->getNombre(),
            'apellidos' => $objeto->getApellidos(),
            'alias' => $objeto->getAlias(),
            'correo' => $objeto->getCorreo(),
            'tipo' => $objeto->getTipo(),
            'verificado' => $objeto->getVerificado(),
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
    
    public function editSinTipo(Usuario $objeto) {
        $sql = 'update usuario set nombre = :nombre, apellidos = :apellidos, alias = :alias, correo = :correo, verificado = 0, clave = :clave where id = :id';
        $params = array(
            'nombre' => $objeto->getNombre(),
            'apellidos' => $objeto->getApellidos(),
            'alias' => $objeto->getAlias(),
            'correo' => $objeto->getCorreo(),
            'clave' => Util::encriptar($objeto->getClave()),
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
    
    public function editSinTipoAdvanced(Usuario $objeto) {
        $sql = 'update usuario set nombre = :nombre, apellidos = :apellidos, alias = :alias, correo = :correo, clave = :clave where id = :id';
        $params = array(
            'nombre' => $objeto->getNombre(),
            'apellidos' => $objeto->getApellidos(),
            'alias' => $objeto->getAlias(),
            'correo' => $objeto->getCorreo(),
            'clave' => Util::encriptar($objeto->getClave()),
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
    
    public function editSinTipoSinClave(Usuario $objeto) {
        $sql = 'update usuario set nombre = :nombre, apellidos = :apellidos, alias = :alias, correo = :correo, verificado = 0 where id = :id';
        $params = array(
            'nombre' => $objeto->getNombre(),
            'apellidos' => $objeto->getApellidos(),
            'alias' => $objeto->getAlias(),
            'correo' => $objeto->getCorreo(),
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
    
    public function editSinTipoSinClaveAdvanced(Usuario $objeto) {
        $sql = 'update usuario set nombre = :nombre, apellidos = :apellidos, alias = :alias, correo = :correo where id = :id';
        $params = array(
            'nombre' => $objeto->getNombre(),
            'apellidos' => $objeto->getApellidos(),
            'alias' => $objeto->getAlias(),
            'correo' => $objeto->getCorreo(),
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

    function getAllCount(){
        $sql = 'select count(*) from usuario';
        $res = $this->db->execute($sql);
        if($res){
            $sentencia = $sentencia = $this->db->getStatement();
            $fila = $sentencia->fetch();
            return $fila[0];       
        }
        return $res;
    }

    function getUserLimit($a , $b){
        $sql = 'select * from usuario limit ' . $a . ',' . $b . ';';
        /*$params = array(
            'a' => $a,
            'b' => $b
        );*/
        $sql = 'select * from usuario limit :desde, :numregistros;';
        $params = array(
            'desde' => array('valor' => $a, 'tipo' => PDO::PARAM_INT),
            'numregistros' => array('valor' => $b, 'tipo' => PDO::PARAM_INT)
        );
        $res = $this->db->execute($sql, $params);
        $usuarios = array();
        if($res){
            $sentencia = $this->db->getStatement();
            while($fila = $sentencia->fetch()){
                $usuario = new Usuario();
                $usuario->set($fila);
                $usuarios[] = $usuario;
            }
        }
        return $usuarios;
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
    
    public function getNumAdmins() {
        $sql = 'select count(tipo) from usuario where tipo = "admin"';
        $resultado = $this->db->execute($sql, array());
        if($resultado) {
            $filasContadas = $this->db->getCount();
        } else {
            $filasContadas = -1;
        }
        return $filasContadas;
    }
}