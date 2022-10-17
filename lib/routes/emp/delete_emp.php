<?php
// include function page(userFunction.php)

include_once('../../function/empFunction.php');

$userObj = new Employer();

$result = $userObj->delete_emp($_GET['uid']);

echo($result);

?>