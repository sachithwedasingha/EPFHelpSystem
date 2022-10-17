<?php

//include function page 
include_once('../../function/feedbackFunction.php');

//call the class and create an object 
$userObj = new Feedback();

$result = $userObj -> adddate($_GET['id'], $_GET['ti'], $_GET['de'],$_GET['at']);

echo($result);


?>