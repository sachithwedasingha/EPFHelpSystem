<?php

//include function page 
include_once('../../function/applicationFunction.php');

//call the class and create an object 
$serObj = new Application();

$result = $serObj -> appr01ok($_GET['id'],$_GET['cname'],$_GET['caddress'],$_GET['coname'],$_GET['name'],$_GET['number'],$_GET['date']);


echo($result);


?>