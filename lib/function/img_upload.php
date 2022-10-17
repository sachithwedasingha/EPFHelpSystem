<?php
//include main.php
include_once('main.php');

class ImageUpload extends Main{
    //image upload methord
    public function imgUpload($imgName,$imgType,$folderName,$tempName,$id){
        //validation part
        
        $coustomName = $id."_".$imgName;
        $path = "../../upload/".$folderName."/".$coustomName;
        $dbpath = "upload/".$folderName."/".$coustomName;
        move_uploaded_file($tempName,$path);
        return($dbpath);
    }
}
?>