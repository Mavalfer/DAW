<?php
require './Filter.php';

if (Filter::isEmail('abc@abc.es')) {
    echo "si lo es";
} else {
    echo "no lo es";
}

if (Filter::isCondicionQueMeHeInventado('Pe3Pe7')) {
    echo "si lo cumple";
} else {
    echo "no lo cumple";
}
