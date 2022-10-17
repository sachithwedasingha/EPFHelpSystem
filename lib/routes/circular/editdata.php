<?php

//include function page 
include_once('../../function/circularFunction.php');

//call the class and create an object 
$serObj = new Circular();

$result = $serObj -> editdata($_GET['id'],$_GET['un'],$_GET['de']);


echo($result);


?>