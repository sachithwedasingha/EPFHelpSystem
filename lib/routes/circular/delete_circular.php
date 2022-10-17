<?php
// include function page(productFunction.php)

include_once('../../function/circularFunction.php');

$proObj = new Circular();

$result = $proObj->delete_circular($_GET['uid']);

echo($result);

?>