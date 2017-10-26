<?php

class FileUpload {
        
    private $input;
    private $name;
    private $target;
    private $size;
    const SOBREESCRIBIR = 0;
    const RESPETAR = 1;
    const RENOMBRAR = 2;

    function __construct($input, $name = null, $target = '.', $size = 0, $policy = FileUpload::RENOMBRAR) {
        $this->input = $input;
        $this->name = $name;
        $this->target = $target;
        $this->size = $size;
        $this->policy = $policy;
    }
    

    function getName() {
        return $this->name;
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
        /*
        if(is_uploaded_file($_FILES[$this::getName()]['tmp_name']) && $_FILES['size'] <= $this.size) {
            move_uploaded_file($_FILES[$this::getName()]['tmp_name'], $this::getTarget());
            return true;
        }
        return false;
    } */
        
        if($_FILES[$this->input]['error'] === 0) {
            if($_FILES[$this->input]['size'] <= $this->size || $this->size === 0) {
                if($this->name === null) {
                     $this->name = $FILES_[$this->input]['name'];
                }
                return $this->uploadPolicy();
            }
        }
        return false;

    }
    
    private function uploadPolicy() {
        if(FileUpload::SOBREESCRIBIR === $this->policy) {
            return move_uploaded_file($_FILES[$this->input]['tmp_name'], $this->target . '/' . $this->name);
        }else if(FileUpload::RESPETAR === $this->policy) {
            if(!file_exists($this->target . '/' . $this->name)) {
                return move_uploaded_file($_FILES[$this->input]['tmp_name'], $this->target . '/' . $this->name);
            }
        }else if(FileUpload::RENOMBRAR === $this->policy) {
            if(file_exists($this->target . '/' . $this->name)) {
                $numCopia = 1;
                do {
                    $copia = true;
                    $pos = strpos($this->name, '.');
                    $string = substr($this->name, 0, $pos-1) . $numcopia .  substr($this->name, $pos);
                    if($this->name == $string) {
                        $numcopia++;
                    } else {
                        $this->name = $string;
                        $copia = false;
                    }
                }while($copia);
                return move_uploaded_file($_FILES[$this->input]['tmp_name'], $this->target . '/' . $this->name);
            }
        }
        return false;
        //return move_uploaded_file($_FILES[$this->input]['tmp_name'], $this->target . '/' . &this->name);     
    }
}