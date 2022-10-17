<?php
// include function page(userFunction.php)

include_once('../../function/userFunction.php');

$userObj = new User();

$result = $userObj->activate_user($_GET['uid']);

echo($result);

?>