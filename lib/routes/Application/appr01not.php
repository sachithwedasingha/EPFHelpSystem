<?php

//include function page 
include_once('../../function/applicationFunction.php');

//call the class and create an object 
$serObj = new Application();

$result = $serObj -> appr01not($_GET['id'],$_GET['error']);


echo($result);


?>