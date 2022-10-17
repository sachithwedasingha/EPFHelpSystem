<?php

//include function
include_once('../../function/circularFunction.php');

$empObj = new Circular();

$result = $empObj -> circularSearch1($_GET['searchData']);

echo($result);

?>