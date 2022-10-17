<?php

//include function page 
include_once('../../function/invoiceFunction.php');

//call the class and create an object 
$invObj = new invoice();

$result = $invObj -> check($_GET['uid']);

echo($result);


?>