<?php
$texto_original = "Frodo;Sam;Merry;Pippin";
$hobbits = explode(";", $texto_original);
foreach ($hobbits as $hobbit) {
echo $hobbit . "<br />";
}
echo $texto_original;
?>