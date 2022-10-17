<?php

//include function page 
include_once('../../function/circularFunction.php');

//call the class and create an object 
$userObj = new Circular();

$result = $userObj -> circularList();

echo($result);


?>