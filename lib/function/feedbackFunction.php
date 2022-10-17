<?php
//start sessions
session_start();

//include main.php
include_once('main.php');

//include auto number module 
include_once('auto_id.php');

//include image upload function
include_once('img_upload.php');


//this function is add new addres in order proccess
class Feedback extends Main{

  ///////////////////////this function set use to make order service or desin /////////////////////////////////////

  //add address data within order proccess
    public function addFeedback($email, $date, $type, $feedback){

      $autonumber = new AutoNumber;
      $id = $autonumber -> NumberGeneration("id","feedback_tbl","FDB");

      
          //insert order to databace
          $sqlInsert = "INSERT INTO feedback_tbl VALUES('$id','$email','$date','$type','$feedback');";

          //lets check the errors 
          if($this->dbResult->error){
          echo($this->dbResult->error);
          exit;
          }

          //we need to execute our sql by query 
          $sqlResult = $this->dbResult->query($sqlInsert);

          //lest check the result is 0 or not 
          if($sqlResult > 0){
            return("done");
          }
          else{
            return("Please Try again later!");
          }
        
}


//this function use to get ordered products to detail sheet
function feedbacklist(){

  $sqlSelect = "SELECT * FROM feedback_tbl  ORDER BY date DESC;";
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
    while($rec = $sqlResult->fetch_assoc()){
    $t=$rec['type'];
    if($t=="bad")
    { echo('<div class="alert alert-dismissible alert-danger">
      <strong>'.$rec['date'].'</strong> <a href="#" class="alert-link">'.$rec['email'].' - </a> '.$rec['feedback'].'
  </div>');}
  else{
    echo('<div class="alert alert-dismissible alert-success">
      <strong>'.$rec['date'].'</strong> <a href="#" class="alert-link">'.$rec['email'].' - </a> '.$rec['feedback'].'
  </div>');
  }
}
}
else{
  echo('<div class="alert alert-dismissible alert-info">
  No Comments are found
</div>');
}
}



public function addmeeting($uid, $eid, $reson){

  $autonumber = new AutoNumber;
  $mid = $autonumber -> NumberGeneration("id","meeting_tbl","MET");

  
      //insert order to databace
      $sqlInsert = "INSERT INTO meeting_tbl (id, uid, eid, reson) VALUES('$mid','$uid','$eid','$reson');";

      //lets check the errors 
      if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;
      }

      //we need to execute our sql by query 
      $sqlResult = $this->dbResult->query($sqlInsert);

      //lest check the result is 0 or not 
      if($sqlResult > 0){
        return("done");
      }
      else{
        return("Please Try again later!");
      }
    
}


public function getlist($uid){


      //insert order to databace
      $sqlInsert = "SELECT * FROM meeting_tbl WHERE uid ='$uid';";

      //lets check the errors 
      if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;
      }

      //we need to execute our sql by query 
      $sqlResult = $this->dbResult->query($sqlInsert);

      $nor = $sqlResult->num_rows;
  
      if($nor > 0){
        while($rec = $sqlResult->fetch_assoc()){
          if($rec['respons']==0){
          $a='<span class="badge bg-danger">Not Give date and Time</span>';
          }else{
            $a='<span class="badge bg-warning">date='.$rec['date'].' Time='.$rec['time'].' Attachments='.$rec['attachment'].'</span>';
          }
            echo('<div class="alert alert-dismissible alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>'.$rec['eid'].'</strong>'.$rec['reson'].'<br>'.$a.'
                </div>
                ');
        }
      }
    
}



public function getlist1(){


  //insert order to databace
  $sqlInsert = "SELECT * FROM meeting_tbl WHERE respons = 0; ";

  //lets check the errors 
  if($this->dbResult->error){
  echo($this->dbResult->error);
  exit;
  }

  //we need to execute our sql by query 
  $sqlResult = $this->dbResult->query($sqlInsert);

  $nor = $sqlResult->num_rows;

  if($nor > 0){
    while($rec = $sqlResult->fetch_assoc()){
      
        echo('<div class="alert alert-dismissible alert-success">
        
        <strong>'.$rec['eid'].'</strong>'.$rec['reson'].'<br><button type="button" onclick="set(\''.$rec['id'].'\')" class="btn btn-danger">Add date and Time</button>
            </div>
            ');
    }
  }

}


public function getfromid($id){
  $sqlSelect = "SELECT * FROM meeting_tbl WHERE id = '$id' ;";
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
 }
}



public function adddate($id, $ti, $de, $at){

  //insert order to databace
  $sqlInsert1 = "UPDATE meeting_tbl SET respons = 1, date = '$de', time = '$ti', attachment = '$at' WHERE id = '$id';";
 
  //lets check the errors 
  if($this->dbResult->error){
  echo($this->dbResult->error);
  exit;
  }
 
   //we need to execute our sql by query 
   $sqlResult1 = $this->dbResult->query($sqlInsert1);
 
   //lest check the result is 0 or not 
   if($sqlResult1 > 0){
     
     
     return("done");
     }
   else{
     return("Please Try again later! 2");
   }
  
 }


}
?>