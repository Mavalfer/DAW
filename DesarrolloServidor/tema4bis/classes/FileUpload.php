<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FileUpload
 *
 * @author Carmelo
 */
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
        if(isset($_FILES[$this->input])){
            if($_FILES[$this->input]['error'] === UPLOAD_ERR_OK){
                if($_FILES[$this->input]['size'] <= $this->size || $this->size === 0){
                    if($this->name === null){
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
        }else if(FileUpload::RESPETAR === $this->policy){
            if(!file_exists($this->target . '/' . $this->name)){
                return move_uploaded_file($_FILES[$this->input]['tmp_name'],
                            $this->target . '/' . $this->name);
            }
        }else if(FileUpload::RENOMBRAR === $this->policy){

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
    }
}
