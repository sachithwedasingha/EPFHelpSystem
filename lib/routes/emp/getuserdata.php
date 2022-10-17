<?php

//include function page 
include_once('../../function/empFunction.php');

//call the class and create an object 
$serObj = new Employer();

$result = $serObj -> userdata($_GET['uid']);


echo($result);


?>