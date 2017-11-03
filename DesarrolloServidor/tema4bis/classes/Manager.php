<?php

interface Manager {

    function add($objeto);

    function edit($objeto);

    function get($id);

    function getAll();

    function remove($id);
}
