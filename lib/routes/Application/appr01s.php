<?php

//include function
include_once('../../function/applicationFunction.php');

$empObj = new Application();

$result = $empObj -> appr01s($_GET['searchData']);

echo($result);

?>