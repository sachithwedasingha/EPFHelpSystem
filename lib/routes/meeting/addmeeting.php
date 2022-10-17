<?php

//include function page 
include_once('../../function/feedbackFunction.php');


//call the class and create an object 
$prdObj = new Feedback();

$result = $prdObj -> addmeeting($_GET['id'],$_GET['eid'],$_GET['reson']);


echo($result);


?>