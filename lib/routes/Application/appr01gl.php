<?php

//include function page 
include_once('../../function/applicationFunction.php');

//call the class and create an object 
$serObj = new Application();

$result = $serObj -> appr01gl($_GET['uid']);


echo($result);


?>