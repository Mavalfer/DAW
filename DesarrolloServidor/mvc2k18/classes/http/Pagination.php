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
    
    function getLast() {
        return ceil($this->rowcount / $this->rpp);
    }
    
    function getFirst() {
        return 1;
    }
    
    function getNext() {
        return min($this->page + 1, $this->getLast());
    }
    
    function getPrevious() {
        return max($this->page - 1, $this->getFirstfirst());
    }
    
    function setRpp($rpp) {
        $this->rpp = $rpp;
    }
    
    function getRange($range = 3) {
        $array = array();
        $last = $this->getLast();
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