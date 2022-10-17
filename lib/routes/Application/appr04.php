<?php

//include function page 
include_once('../../function/applicationFunction.php');

//call the class and create an object 
$userObj = new Application();

$result = $userObj -> appr04();

echo($result);


?>