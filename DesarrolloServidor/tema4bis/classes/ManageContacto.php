<?php

class ManageContacto implements Manager {
    
    private $db;
    
    function __construct(DataBase $db) {
        $this->db = $db;
    }
    
    
    /*
    Método que realiza el alta de un contacto nuevo.
    
    @param Contacto $objeto Debe ser un objeto de la clase Contacto, que se va a insertar en la base de datos.
    @return int Es el código autonumérico del objeto insertado, en caso de éxito. En caso de error es el 0.
    */
    public function add(Contacto $objeto) {
        //por costumbre cuando se inserta un objeto se devuelve el id del objeto insertado
        
        //sentencia preparada
        $sql = 'insert into contacto(id, nombre) values (null, :nombre';
        $params = array(
            'nombre' => $objeto->getNombre()
        );
        $resultado = $this->db->execute($sql, $params); //true o false
        if ($resultado) {
            $id = $this->db->getId();
            $objeto->setId($id);
        } else {
            $id = 0;
        }
        return $id;
    }
    
    
    public function edit(Contacto $objeto) {
        $sql = 'update contacto set nombre = :nombre where id = :id';
        $params = array(
            'nombre' => $objeto->getNombre(),
            'id' => $objeto->getId()
        );
        $resultado = $this->db->execute($sql, $params); //true o false
        if ($resultado) {
            $ifilasAfectadas = $this->db->getRowNumber();  //0 o 1
            $objeto->setId($id);
        } else {
            $filasAfectadas = -1;  //hay que poner -1 porque 0 significa que la operacion se ha realizado pero no se ha modificado nada, entonces -1 sera que ha habido un fallo
        }
        return $id;
    }
    
    public function get($id) {
        $sql = 'select * from contacto where id = :id';
        $params = array(
            'id' => $id
        );
        $resultado = $this->db->execute($sql, $params); //true o false
        $sentencia = $this->db->getStatement();
        $contacto = new Contacto();
        if ($resultado && $fila = $sentencia->fetch()) {
            $contacto->set($fila);
            
        } else {
            $contacto = null;
        }
        return $contacto;
    }
    
    public function getAll() {
        
    }
    
    public function remove($id) {
        
    }
}