<?php

//include function page 
include_once('../../function/feedbackFunction.php');

//call the class and create an object 
$userObj = new Feedback();

$result = $userObj -> getlist($_GET['uid']);

echo($result);


?>