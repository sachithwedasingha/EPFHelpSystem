<?php

//include function page 
include_once('../../function/feedbackFunction.php');


//call the class and create an object 
$prdObj = new Feedback();

$result = $prdObj -> addfeedback($_GET['date'],$_GET['email'],$_GET['type'],$_GET['feedback']);


echo($result);


?>