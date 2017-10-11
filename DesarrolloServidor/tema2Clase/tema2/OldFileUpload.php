<?php

class FileUpload {

    private $input, $name, $target, $size;
    
    function __construct($input, $name = null, $target = '.', $size = 0) {
        $this->input = $input;
        $this->name = $name;
        $this->target = $target;
        $this->size = $size;
    }

    function getName() {
        return $this->name;
    }

    function getTarget() {
        return $this->target;
    }

    function getSize() {
        return $this->size;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setTarget($target) {
        $this->target = $target;
    }

    function setSize($size) {
        $this->size = $size;
    }

    
    function upload() {
        if(isset($_FILES[$this->input])){
            $files = $_FILES[$this->input];
            if($files['error'] === UPLOAD_ERR_OK){
                if($files['size'] <= $this->size || $this->size === 0) {
                    if($this->name === null){
                        $this->name = $_FILES[$this->input]['name'];
                    }
                    return move_uploaded_file($files['tmp_name'], $this->target . '/' . $this->name);
                }
            }
        }
        return false;
    }
}