<?php

//include function
include_once('../../function/circularFunction.php');

$empObj = new Circular();

$result = $empObj -> circularSearch($_GET['searchData']);

echo($result);

?>