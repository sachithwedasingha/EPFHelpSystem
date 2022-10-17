<?php

//include function page 
include_once('../../function/userFunction.php');

//call the class and create an object 
$serObj = new User();

$result = $serObj -> userdata($_GET['uid']);


echo($result);


?>