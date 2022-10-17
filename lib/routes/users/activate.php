<?php
// include function page(userFunction.php)

include_once('../../function/userFunction.php');
include_once('../../layout/app.php');

$userObj = new User();

$result = $userObj->userActivation($_GET['id'],$_GET['token']);

header('Location:../../view/login.php');
?>
