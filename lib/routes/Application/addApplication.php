<?php

//include function page 
include_once('../../function/applicationFunction.php');

//Get product Details 

$BCImageName = $_FILES['BC']['name'];
$BCImageSize = $_FILES['BC']['size'];
$BCImageType = $_FILES['BC']['type'];
$BCImageLocation = $_FILES['BC']['tmp_name'];

$NICImageName = $_FILES['NIC']['name'];
$NICImageSize = $_FILES['NIC']['size'];
$NICImageType = $_FILES['NIC']['type'];
$NICImageLocation = $_FILES['NIC']['tmp_name'];

$BPBImageName = $_FILES['BPB']['name'];
$BPBImageSize = $_FILES['BPB']['size'];
$BPBImageType = $_FILES['BPB']['type'];
$BPBImageLocation = $_FILES['BPB']['tmp_name'];

//call the class and create an object 
$appObj = new Application();

$result = $appObj -> addApplication($_POST['Id'],$_POST['Name'],$_POST['Address'],$_POST['FatherName'],$_POST['MotherName'],
$_POST['SpouseName'],$_POST['Marks'],$_POST['Birthday'],$_POST['IDNumber'],$_POST['IDNname'],$_POST['IDDate'],
$_POST['ACCType'],$_POST['BankName'],$_POST['BankBranch'],$_POST['ACCNumber'],$_POST['NameBC'],$_POST['NameNIC'],
$_POST['NameBCard'],$_POST['NameEPFCB'],$_POST['LastMN'],$_POST['LastEN'],$_POST['LastLD'],$_POST['LastLR'],
$_POST['LastEName'],$_POST['LastEN1'],$_POST['LastEN2'],$_POST['LastEN3'],$_POST['LastEN4'],$_POST['LastEN5'],
$BCImageName,$BCImageSize,$BCImageType,$BCImageLocation,$NICImageName,$NICImageSize,$NICImageType,$NICImageLocation,
$BPBImageName,$BPBImageSize,$BPBImageType,$BPBImageLocation);


echo($result);


?>