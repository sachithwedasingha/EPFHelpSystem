<?php

//include function page 
include_once('../../function/empFunction.php');

//Get product Details 

$productImageName = $_FILES['empImg']['name'];
$productImageSize = $_FILES['empImg']['size'];
$productImageType = $_FILES['empImg']['type'];
$productImageLocation = $_FILES['empImg']['tmp_name'];

//call the class and create an object 
$empObj = new Employer();

$result = $empObj -> addEmployer($_POST['empfirstName'],$_POST['empsecondName'],$_POST['empBirthday'],$_POST['empGender'],$_POST['empNIC'],$_POST['empAddress'],$_POST['empPhone'],$_POST['empEmail'],$_POST['empJobTitle'],$_POST['empJobType'],$_POST['empJobLevel'],$productImageName,$productImageSize,$productImageType,$productImageLocation);


echo($result);


?>