<?php

class FileUpload {
    
    private $input;
    private $name;
    private $target;
    private $size;
    private $policy;
    
    const SOBREESCRIBIR = 0;
    const RESPETAR = 1;
    const RENOMBRAR = 2;

    function __construct($input, $name = null, $target = '.', $size = 0, 
            $policy = FileUpload::RENOMBRAR) {
        $this->input = $input;
        $this->name = $name;
        $this->target = $target;
        $this->size = $size;
        $this->policy = $policy;
    }

    function getName() {
        return $this->name;
    }

    private function getNewName() {
        $archivo = $this->name;
        $contador = 0;
        while(file_exists($this->target . '/' . $archivo)){
            $partes = pathinfo($this->name);
            $contador++;
            $archivo = $partes['filename'] . '(' . $contador . ')';
            if(isset($partes['extension'])){
                $archivo = $archivo . '.' . $partes['extension'];
            }
        }
        return $archivo;
    }

    function getSize() {
        return $this->size;
    }

    function getTarget() {
        return $this->target;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setSize($size) {
        $this->size = $size;
    }

    function setTarget($target) {
        $this->target = $target;
    }

    function upload() {
        if(isset($_FILES[$this->input])) {
            if($_FILES[$this->input]['error'] === UPLOAD_ERR_OK) {
                if($_FILES[$this->input]['size'] <= $this->size || $this->size === 0) {
                    if($this->name === null) {
                        $this->name = $_FILES[$this->input]['name'];
                    }
                    return $this->uploadPolicy();
                }
            }
        }    
        return false;
    }
    
    private function uploadPolicy(){
        if(FileUpload::SOBREESCRIBIR === $this->policy){
            return move_uploaded_file($_FILES[$this->input]['tmp_name'], 
                            $this->target . '/' . $this->name);
        } else if(FileUpload::RESPETAR === $this->policy){
            if(!file_exists($this->target . '/' . $this->name)){
                return move_uploaded_file($_FILES[$this->input]['tmp_name'], 
                            $this->target . '/' . $this->name);
            }
        } else if(FileUpload::RENOMBRAR === $this->policy){
            $this->name = $this->getNewName();
            return move_uploaded_file($_FILES[$this->input]['tmp_name'], 
                            $this->target . '/' . $this->name);
        }
        return false;
    }
}
