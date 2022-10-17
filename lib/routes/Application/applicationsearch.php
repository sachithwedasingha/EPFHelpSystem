<?php

//include function
include_once('../../function/applicationFunction.php');

$empObj = new Application();

$result = $empObj -> allstatuss($_GET['searchData']);

echo($result);

?>