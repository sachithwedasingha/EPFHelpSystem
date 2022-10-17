<?php

//include function
include_once('../../function/userFunction.php');

$empObj = new User();

$result = $empObj -> userSearch($_GET['searchData']);

echo($result);

?>