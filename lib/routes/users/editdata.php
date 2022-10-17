<?php

//include function page 
include_once('../../function/userFunction.php');

//call the class and create an object 
$serObj = new User();

$result = $serObj -> editdata($_GET['id'],$_GET['un'],$_GET['em'],$_GET['ph'],$_GET['nic']);


echo($result);


?>