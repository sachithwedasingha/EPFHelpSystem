<?php

//include function page 
include_once('../../function/circularFunction.php');

//Get product Details 

$productImageName = $_FILES['productImg']['name'];
$productImageSize = $_FILES['productImg']['size'];
$productImageType = $_FILES['productImg']['type'];
$productImageLocation = $_FILES['productImg']['tmp_name'];

//call the class and create an object 
$prdObj = new Circular();

$result = $prdObj -> addcircular($_POST['name'],$_POST['date'],$productImageName,$productImageSize,$productImageType,$productImageLocation);


echo($result);


?>