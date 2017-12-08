<?php

class Pagination {

    //constructor -> qué datos necesito
    private $rpp, $rowcount, $page;

    function __construct($rowcount, $page = 1, $rpp = 12) {
        $this->rowcount = $rowcount;
        $this->page = $page;
        $this->rpp = $rpp;
    }
    
    function getRpp() {
        return $this->rpp;
    }

    function getOffset() {
        return $this->rpp * ($this->page - 1);
    }
    
    function last() {
        return ceil($this->rowcount / $this->rpp);
    }
    
    function first() {
        return 1;
    }
    
    function next() {
        return min($this->page + 1, $this->last());
    }
    
    function previous() {
        return max($this->page - 1, $this->first());
    }
    
    function setRpp($rpp) {
        $this->rpp = $rpp;
    }
    
    function getRange($range = 3) {
        $array = array();
        $last = $this->last();
        for($i = $this->page - $range; $i <= $this->page + $range; $i++) {
            //no meter páginas debajo del 1
            //no meter páginas encima del $pages
            if($i >= 1 && $i <= $last) {
                $array[] = $i;
            }
        }
        return $array;
    }
}