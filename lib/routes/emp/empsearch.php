<?php

//include function
include_once('../../function/empFunction.php');

$empObj = new Employer();

$result = $empObj -> empSearch($_GET['searchData']);

echo($result);

?>