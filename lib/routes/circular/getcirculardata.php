<?php

//include function page 
include_once('../../function/circularFunction.php');

//call the class and create an object 
$serObj = new Circular();

$result = $serObj -> circulardata($_GET['uid']);


echo($result);


?>