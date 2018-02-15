<?php

class ManagePaciente {
    
    private $db;

    function __construct(DataBase $db) {
        $this->db = $db;
    }
    
    public function add(Paciente $paciente) {
        $sql = 'insert into paciente(nombre, especie, dnidueño, idusuario) ' .
                    'values (:nombre, :especie, :dnidueño, :idusuario)';
        $params = array(
            'nombre' => $paciente->getNombre(),
            'especie' => $paciente->getEspecie(),
            'dnidueño' => $paciente->getDnidueño(),
            'idusuario' => $paciente->getIdusuario()
        );
        $resultado = $this->db->execute($sql, $params);
        if($resultado) {
            $id = $this->db->getId();
            $paciente->setId($id);
        } else {
            $id = 0;
        }
        return $id;
    }
    
    
}