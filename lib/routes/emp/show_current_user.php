<?php

//include function page 
include_once('../../function/empFunction.php');

//call the class and create an object 
$empObj = new Employer();

$result = $empObj -> Current_User_Details();

echo($result);


?>