<?php
//we need to start the sessions 
session_start();

//include main.php
include_once('main.php');

//include auto number module 
include_once('auto_id.php');


class invoice extends Main{


   function check($uid){
      $sqlSelect = "SELECT * FROM bcard_tbl WHERE id='$uid'; ";

       //lets check the errors 
       if($this->dbResult->error){
          echo($this->dbResult->error);
          exit;
         }
       //sql execute 
       $sqlResult = $this->dbResult->query($sqlSelect);

        //check the number of rows
        $nor = $sqlResult->num_rows;

        return($nor);
    }

    function add($uid,$bna){
      $sqlSelect = "INSERT INTO bcard_tbl VALUES('$uid','$bna'); ";

       //lets check the errors 
       if($this->dbResult->error){
          echo($this->dbResult->error);
          exit;
         }
       //sql execute 
       $sqlResult = $this->dbResult->query($sqlSelect);

        //check the number of rows
        if($sqlResult > 0){
                        
                        
         return("1");
         }
       else{
         return("Please Try again later! 2");
       }
    }


      function gett1(){
        $sqlSelect = "SELECT * FROM user_tbl WHERE d_status = 0 ORDER BY user_id DESC; ";

         //lets check the errors 
         if($this->dbResult->error){
            echo($this->dbResult->error);
            exit;
           }
         //sql execute 
         $sqlResult = $this->dbResult->query($sqlSelect);

          //check the number of rows
          $nor = $sqlResult->num_rows;

          return($nor);
      }


      function gett2(){
        $sqlSelect = "SELECT * FROM bform_status_tbl ORDER BY id DESC; ";

         //lets check the errors 
         if($this->dbResult->error){
            echo($this->dbResult->error);
            exit;
           }
         //sql execute 
         $sqlResult = $this->dbResult->query($sqlSelect);

          //check the number of rows
          $nor = $sqlResult->num_rows;

          return($nor);
      }
   
      function gett3(){
        $sqlSelect = "SELECT * FROM bform_status_tbl WHERE submit = 1 ORDER BY id DESC; ";

         //lets check the errors 
         if($this->dbResult->error){
            echo($this->dbResult->error);
            exit;
           }
         //sql execute 
         $sqlResult = $this->dbResult->query($sqlSelect);

          //check the number of rows
          $nor = $sqlResult->num_rows;

          return($nor);
      }

      function gett4(){
        $sqlSelect = "SELECT * FROM bform_status_tbl WHERE chek1 = 1 ORDER BY id DESC; ";

         //lets check the errors 
         if($this->dbResult->error){
            echo($this->dbResult->error);
            exit;
           }
         //sql execute 
         $sqlResult = $this->dbResult->query($sqlSelect);

          //check the number of rows
          $nor = $sqlResult->num_rows;

          return($nor);
      }


      function gett5(){
        $sqlSelect = "SELECT * FROM bform_status_tbl WHERE chek2 = 1 ORDER BY id DESC; ";

         //lets check the errors 
         if($this->dbResult->error){
            echo($this->dbResult->error);
            exit;
           }
         //sql execute 
         $sqlResult = $this->dbResult->query($sqlSelect);

          //check the number of rows
          $nor = $sqlResult->num_rows;

          return($nor);
      }

      function gett6(){
        $sqlSelect = "SELECT * FROM bform_status_tbl WHERE chek2 = 1 ORDER BY id DESC; ";

         //lets check the errors 
         if($this->dbResult->error){
            echo($this->dbResult->error);
            exit;
           }
         //sql execute 
         $sqlResult = $this->dbResult->query($sqlSelect);

          //check the number of rows
          $nor = $sqlResult->num_rows;

          return($nor);
      }

     // this function genarate bar chart for reort
function getdata($year){
      
     
  $sqlSelect = "SELECT * FROM attach_tbl  WHERE (date BETWEEN '$year-01-01' AND '$year-01-31'); ";
   //lets check the errors 
   if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;}
     
   //sql execute 
   $sqlResult = $this->dbResult->query($sqlSelect);
     
   $A=$sqlResult->num_rows;

$sqlSelect = "SELECT * FROM attach_tbl  WHERE (date BETWEEN '$year-02-01' AND '$year-02-31'); ";
   //lets check the errors 
   if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;}
     
   //sql execute 
   $sqlResult = $this->dbResult->query($sqlSelect);
   
   $B=$sqlResult->num_rows;

$sqlSelect = "SELECT * FROM attach_tbl  WHERE (date BETWEEN '$year-03-01' AND '$year-03-31'); ";
   //lets check the errors 
   if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;}
     
   //sql execute 
   $sqlResult = $this->dbResult->query($sqlSelect);
   
   $C=$sqlResult->num_rows;

$sqlSelect = "SELECT * FROM attach_tbl  WHERE (date BETWEEN '$year-04-01' AND '$year-04-31') ; ";
   //lets check the errors 
   if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;}
     
   //sql execute 
   $sqlResult = $this->dbResult->query($sqlSelect);
    
   $D=$sqlResult->num_rows;

$sqlSelect = "SELECT * FROM attach_tbl  WHERE (date BETWEEN '$year-05-01' AND '$year-05-31'); ";
   //lets check the errors 
   if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;}
     
   //sql execute 
   $sqlResult = $this->dbResult->query($sqlSelect);
   
   $E=$sqlResult->num_rows;

$sqlSelect = "SELECT * FROM attach_tbl  WHERE (date BETWEEN '$year-06-01' AND '$year-06-31'); ";
   //lets check the errors 
   if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;}
     
   //sql execute 
   $sqlResult = $this->dbResult->query($sqlSelect);
   
   $F=$sqlResult->num_rows;

$sqlSelect = "SELECT * FROM attach_tbl  WHERE (date BETWEEN '$year-07-01' AND '$year-07-31'); ";
   //lets check the errors 
   if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;}
     
   //sql execute 
   $sqlResult = $this->dbResult->query($sqlSelect);
   
   $G=$sqlResult->num_rows;

$sqlSelect = "SELECT * FROM attach_tbl  WHERE (date BETWEEN '$year-08-01' AND '$year-08-31'); ";
   //lets check the errors 
   if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;}
     
   //sql execute 
   $sqlResult = $this->dbResult->query($sqlSelect);
   
   $H=$sqlResult->num_rows;

$sqlSelect = "SELECT * FROM attach_tbl  WHERE (date BETWEEN '$year-09-01' AND '$year-09-31'); ";
   //lets check the errors 
   if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;}
     
   //sql execute 
   $sqlResult = $this->dbResult->query($sqlSelect);
   
   $I=$sqlResult->num_rows;

$sqlSelect = "SELECT * FROM attach_tbl  WHERE (date BETWEEN '$year-10-01' AND '$year-10-31') ; ";
   //lets check the errors 
   if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;}
     
   //sql execute 
   $sqlResult = $this->dbResult->query($sqlSelect);
    
   $J=$sqlResult->num_rows;

$sqlSelect = "SELECT * FROM attach_tbl  WHERE (date BETWEEN '$year-11-01' AND '$year-11-31'); ";
   //lets check the errors 
   if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;}
     
   //sql execute 
   $sqlResult = $this->dbResult->query($sqlSelect);
   
   $K=$sqlResult->num_rows;

$sqlSelect = "SELECT * FROM attach_tbl  WHERE (date BETWEEN '$year-12-01' AND '$year-12-31'); ";
   //lets check the errors 
   if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;}
     
   //sql execute 
   $sqlResult = $this->dbResult->query($sqlSelect);
   
  $L=$sqlResult->num_rows;


//generate new id for a employer 
$autoNumber = new AutoNumber;
$rid = $autoNumber -> NumberGeneration("rt_Id","mt_tbl","MTR");


$sqlInsert = "INSERT INTO mt_tbl VALUES('$rid','$A','$B','$C','$D','$E','$F','$G','$H','$I','$J','$K','$L');";

//lets check the errors 
if($this->dbResult->error){
  echo($this->dbResult->error);
  exit;
}

//we need to execute our sql by query 
$sqlResult = $this->dbResult->query($sqlInsert);
if($sqlResult > 0){
$sqlSelect = "SELECT * FROM mt_tbl WHERE  rt_Id = '$rid';";
//lets check the errors 
if($this->dbResult->error){
echo($this->dbResult->error);
exit;
}
//sql execute 
$sqlResult = $this->dbResult->query($sqlSelect);

//check the number of rows
$nor = $sqlResult->num_rows;
if($nor > 0){
$rec = $sqlResult->fetch_assoc();

return json_encode($rec);
//  }

}

}

}
  }

    ?>