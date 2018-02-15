<?php

class AjaxView extends View {

    function __construct(Model $model) {
        parent::__construct($model);
    }
    
    function render($action) {
        header('Content-Type: application/json');
        return json_encode($this->getModel()->getAllData());
    }
}