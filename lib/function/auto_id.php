<?php

//include the main 
include_once('main.php');

class AutoNumber extends Main{

    //auto number generating module 
    function NumberGeneration($id,$table,$string){
        //Dynamic sql query 
        $currentId = "SELECT $id FROM $table ORDER BY $id DESC LIMIT 1;";
        
         //sql execute 
         $sqlResult = $this->dbResult->query($currentId);
          
          //lets check the errors 
          if($this->dbResult->errno){
            echo($this->dbResult->error);
            exit;
           }

         //check number of rows
         $nor = $sqlResult->num_rows;
       
         if($nor>0){
            $rec = $sqlResult->fetch_assoc();
            $prevId = $rec[$id];
            $num = substr($prevId,4);
            $num = $num+1;
            $id = str_pad($num,4,'0',STR_PAD_LEFT);
            $newId = $string.$id;
            

         }
         else{
             $newId = $string.'0001';
             
         }
         $this->dbResult->close();
         return ($newId);
    }
}



?>