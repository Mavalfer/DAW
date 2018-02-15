<?php

class ManageHistoria {
    
    private $db;
    
    function __construct(DataBase $db) {
        $this->db = $db;
    }
    
    public function add(Historia $objeto) {
        $sql = 'insert into historia(motivo, descripcion, idpaciente) ' . 
                    'values (:motivo, :descripcion, :idpaciente)';
        $params = array(
            'motivo' => $objeto->getMotivo(),
            'descripcion' => $objeto->getDescripcion(),
            'idpaciente' => $objeto->getIdpaciente()
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
}