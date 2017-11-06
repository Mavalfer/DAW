<?php

class ManageContactoTelefono {  /*En este tipo de managers los metodos se crean segun se vayan necesitando*/
    
    private $db;
    
    function __construct(DataBase $db){
        $this->database = $db;
    }
    
    function getAll(){
        $sql = 'SELECT * FROM contacto order by nombre';
        $sql = 'select * from contacto co left join telefono te on co.id = te.idcontacto order by co.nombre, te.telefono';
        $res = $this->database->execute($sql);
        $contactosTelefonos = array();
        if($res){
            $sentencia = $this->database->getStatement();
            while($fila = $sentencia->fetch()){
                $contacto = new Contacto();
                $contacto->set($fila);
                /*leemos contacto y telefono*/
                $telefono = new Telefono();
                $telefono->set($fila, 2); /*columnainicial en donde empeizan los telefonos?*/
                $contactosTelefonos[] = array('contacto' => $contacto, 'telefono' => $telefono) ;
            }
        }
        return $contactos;
    }
    
    /*Como se debe borrar: 
    si es un contacto con muchos telefonos - borrar solo el numero
    si es un contacto con un solo telefono - ¿? borrar el contacto
    si es un contacto sin telefono - borrar el contacto
    
    Tengo que poner el id de contacto y el del telefono en los enlaces
    
    https://c9.io/izvdamdaw
    */
    
}