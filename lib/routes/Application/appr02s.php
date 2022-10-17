<?php

//include function
include_once('../../function/applicationFunction.php');

$empObj = new Application();

$result = $empObj -> appr02s($_GET['searchData']);

echo($result);

?>