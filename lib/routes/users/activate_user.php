<?php

//include function page 
include_once('../../function/userFunction.php');

//call the class and create an object 
$userObj = new User();

$result = $userObj -> activate_userList();

echo($result);


?>