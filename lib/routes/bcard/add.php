<?php

//include function page 
include_once('../../function/invoiceFunction.php');

//call the class and create an object 
$invObj = new invoice();

$result = $invObj -> add($_GET['uid'],$_GET['bna']);

echo($result);


?>