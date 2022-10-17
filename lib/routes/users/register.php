<?php
// include function page(userFunction.php)

include_once('../../function/userFunction.php');

$userObj = new User();

$result = $userObj->userRegistration($_POST['userName'],$_POST['userEmail'],$_POST['userPwd'],$_POST['userPhone'],$_POST['userNIC']);

echo($result);

?>