<?php

//include function page 
include_once('../../function/empFunction.php');

//call the class and create an object 
$serObj = new Employer();

$result = $serObj -> editdata($_GET['id'],$_GET['un'],$_GET['ph'],$_GET['nic'],$_GET['ti'],$_GET['ty'],$_GET['le']);


echo($result);


?>