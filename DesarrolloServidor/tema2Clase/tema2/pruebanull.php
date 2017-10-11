<?php

$a = "null";

echo "== <br>";
echo $a==null ? "true" : "false";
echo "<br><br>";

echo "=== <br>";
echo $a===null ? "true" : "false";
echo "<br><br>";

echo "is_null <br>";
echo is_null($a) ? "true" : "false";
echo "<br><br>";

$a = "18";

if($a == 18){
    echo "a vale 18<br>";
} else {
    echo "a no vale 18<br>";
}

if($a == "18"){
    echo "a vale '18'<br>";
} else {
    echo "a no vale 18<br>";
}