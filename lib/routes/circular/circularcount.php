<?php

//include function page 
include_once('../../function/circularFunction.php');

//call the class and create an object 
$proObj = new Circular();

$result = $proObj -> circular_count();

echo($result);


?>