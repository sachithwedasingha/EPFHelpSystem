<?php

//include function page 
include_once('../../function/applicationFunction.php');

//call the class and create an object 
$serObj = new  Application();

$result = $serObj -> status($_GET['uid']);


echo($result);


?>