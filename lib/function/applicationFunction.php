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
class Application extends Main{

  ///////////////////////this function set use to make order service or desin /////////////////////////////////////

  //add address data within order proccess
    public function addApplication($id,$name, $address,$fname,$mname,$sname,$marks,$birthday,$idnumber,$idname,$iddate,
    $acctype,$bankname,$bankbranch,$accnumber,$namebc,$namenic,$namebcard,$nameepfcb,$lastmn,$lasten,$lastld,
    $lastlr,$lastename,$lasten1,$lasten2,$lasten3,$lasten4,$lasten5,$BCImageName,$BCImageSize,$BCImageType,
    $BCImageLocation,$NICImageName,$NICImageSize,$NICImageType,$NICImageLocation,$BPBImageNam,$BPBImageSize,
    $BPBImageType,$BPBImageLocation){

      $autonumber = new AutoNumber;
      $bfid = $autonumber -> NumberGeneration("formID","bform_tbl","BFR");

      $objImage =new ImageUpload();
      $bcUrl = $objImage ->imgUpload($BCImageName,$BCImageType,"BC",$BCImageLocation,$bfid);
  

      $objImage =new ImageUpload();
      $nicUrl = $objImage ->imgUpload($NICImageName,$NICImageType,"NIC",$NICImageLocation,$bfid);

      
      $objImage =new ImageUpload();
      $fpbpbUrl = $objImage ->imgUpload($BPBImageNam,$BPBImageType,"bank",$BPBImageLocation,$bfid);
  
          //insert order to databace
          $sqlInsert = "INSERT INTO bform_tbl VALUES('$bfid','$id','$name', '$address','$fname','$mname','$sname',
          '$marks','$birthday','$idnumber','$idname','$iddate','$acctype','$bankname','$bankbranch','$accnumber',
          '$namebc','$namenic','$namebcard','$nameepfcb','$lastmn','$lasten','$lastld','$lastlr','$lastename',
          '$lasten1','$lasten2','$lasten3','$lasten4','$lasten5','$bcUrl','$nicUrl','$fpbpbUrl');";

          //lets check the errors 
          if($this->dbResult->error){
          echo($this->dbResult->error);
          exit;
          }

          //we need to execute our sql by query 
          $sqlResult = $this->dbResult->query($sqlInsert);

          //lest check the result is 0 or not 
          if($sqlResult > 0){

                      //insert order to databace
                      $sqlInsert1 = "INSERT INTO bform_status_tbl VALUES('$bfid','$id',0,0,0,0,0,0,0,0,0,0,0,0,0);";

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
          else{
            return("Please Try again later!");
          }
        
}



public function reApplication($id,$uid,$name, $address,$fname,$mname,$sname,$marks,$birthday,$idnumber,$idname,$iddate,
$acctype,$bankname,$bankbranch,$accnumber,$namebc,$namenic,$namebcard,$nameepfcb,$lastmn,$lasten,$lastld,
$lastlr,$lastename,$lasten1,$lasten2,$lasten3,$lasten4,$lasten5,$BCImageName,$BCImageSize,$BCImageType,
$BCImageLocation,$NICImageName,$NICImageSize,$NICImageType,$NICImageLocation,$BPBImageNam,$BPBImageSize,
$BPBImageType,$BPBImageLocation){

  $sqlSelect = "DELETE FROM bform_tbl WHERE formID = '$id';";
  //lets check the errors 
   if($this->dbResult->error){
   echo($this->dbResult->error);
   exit;
  }
//sql execute 
$sqlResult = $this->dbResult->query($sqlSelect);
if($sqlResult > 0){


  $objImage =new ImageUpload();
  $bcUrl = $objImage ->imgUpload($BCImageName,$BCImageType,"BC",$BCImageLocation,$id);


  $objImage =new ImageUpload();
  $nicUrl = $objImage ->imgUpload($NICImageName,$NICImageType,"NIC",$NICImageLocation,$id);

  
  $objImage =new ImageUpload();
  $fpbpbUrl = $objImage ->imgUpload($BPBImageNam,$BPBImageType,"bank",$BPBImageLocation,$id);

      //insert order to databace
      $sqlInsert = "INSERT INTO bform_tbl VALUES('$id','$uid','$name', '$address','$fname','$mname','$sname',
      '$marks','$birthday','$idnumber','$idname','$iddate','$acctype','$bankname','$bankbranch','$accnumber',
      '$namebc','$namenic','$namebcard','$nameepfcb','$lastmn','$lasten','$lastld','$lastlr','$lastename',
      '$lasten1','$lasten2','$lasten3','$lasten4','$lasten5','$bcUrl','$nicUrl','$fpbpbUrl');";

      //lets check the errors 
      if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;
      }

      //we need to execute our sql by query 
      $sqlResult = $this->dbResult->query($sqlInsert);

      //lest check the result is 0 or not 
      if($sqlResult > 0){

                  //insert order to databace
                  $sqlInsert1 = "UPDATE bform_status_tbl SET submiterror = 0, chek1Error = 0,chek2Error = 0, chek3Error=0 WHERE id = '$id';";

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
      else{
        return("Please Try again later!");
      }
    }
    
}


//this function to get address data to address form within areder proccess
public function status($uid){
  $sqlSelect = "SELECT * FROM bform_status_tbl WHERE uid = '$uid' ;";
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


public function allstatus(){
  $sqlSelect = "SELECT * FROM bform_status_tbl ORDER BY id ;";
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
    $A =""; $B=""; $C=""; $D="";

    if($rec['submit']== 1){$A = '<span class="badge bg-success">Pass</span>';}
        else if($rec['submiterror'] == 1){$A = '<span class="badge bg-danger">Reject</span>';}
        else{$A = '<span class="badge bg-warning">Waiting</span>';}

        if($rec['chek1']== 1){$B = '<span class="badge bg-success">Pass</span>';}
        else if($rec['chek1Error'] == 1){$B = '<span class="badge bg-danger">Reject</span>';}
        else{$B = '<span class="badge bg-warning">Waiting</span>';}

        if($rec['chek2']== 1){$C = '<span class="badge bg-success">Pass</span>';}
        else if($rec['chek2Error'] == 1){$C = '<span class="badge bg-danger">Reject</span>';}
        else{$C = '<span class="badge bg-warning">Waiting</span>';}

        if($rec['chek3']== 1){$D = '<span class="badge bg-success">Pass</span>';}
        else if($rec['chek3Error'] == 1){$D = '<span class="badge bg-danger">Reject</span>';}
        else{$D = '<span class="badge bg-warning">Waiting</span>';}


    echo('
    <tr>
      <th>'.$rec['id'].'</th>
      <th>'.$rec['uid'].'</th>
      <td>'.$A.'</td>
      <td>'.$B.'</td>
      <td>'.$C.'</td>
      <td>'.$D.'</td>
   </tr>
          ');
  
  }

 }
}



public function allstatuss($searchData){
  $sqlSelect = "SELECT * FROM bform_status_tbl WHERE (id LIKE '$searchData%' OR uid  LIKE '$searchData%') ORDER BY id ;";
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
    $A =""; $B=""; $C=""; $D="";

    if($rec['submit']== 1){$A = '<span class="badge bg-success">Pass</span>';}
        else if($rec['submiterror'] == 1){$A = '<span class="badge bg-danger">Reject</span>';}
        else{$A = '<span class="badge bg-warning">Waiting</span>';}

        if($rec['chek1']== 1){$B = '<span class="badge bg-success">Pass</span>';}
        else if($rec['chek1Error'] == 1){$B = '<span class="badge bg-danger">Reject</span>';}
        else{$B = '<span class="badge bg-warning">Waiting</span>';}

        if($rec['chek2']== 1){$C = '<span class="badge bg-success">Pass</span>';}
        else if($rec['chek2Error'] == 1){$C = '<span class="badge bg-danger">Reject</span>';}
        else{$C = '<span class="badge bg-warning">Waiting</span>';}

        if($rec['chek3']== 1){$D = '<span class="badge bg-success">Pass</span>';}
        else if($rec['chek3Error'] == 1){$D = '<span class="badge bg-danger">Reject</span>';}
        else{$D = '<span class="badge bg-warning">Waiting</span>';}


    echo('
    <tr>
      <th>'.$rec['id'].'</th>
      <th>'.$rec['uid'].'</th>
      <td>'.$A.'</td>
      <td>'.$B.'</td>
      <td>'.$C.'</td>
      <td>'.$D.'</td>
   </tr>
          ');
  
  }

 }
}

  //this function use to get order list to admin panel or employees
public function appr01(){

  $sqlSelect = "SELECT * FROM bform_status_tbl WHERE submit=0 AND submiterror =0 ORDER BY id ASC;";
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
      echo('
      <tr>
        <th>'.$rec['id'].'</th>
        <th>'.$rec['uid'].'</th>
        <td><button type="button" class="btn btn-warning" onclick="view(\''.$rec['id'].'\')">Check Application</button></td>
     </tr>
            ');
    
    }
  }
  else {echo('
    <div class="alert alert-danger" role="alert">
    No Applications Are Found!
    </div>');
  }
}


  //this function use to get order list to admin panel or employees
  public function appr02(){

    $sqlSelect = "SELECT * FROM bform_status_tbl WHERE submit=1 AND chek1=0 AND chek1Error =0  ORDER BY id ASC;";
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
        echo('
        <tr>
          <th>'.$rec['id'].'</th>
          <th>'.$rec['uid'].'</th>
          <td><button type="button" class="btn btn-warning" onclick="view(\''.$rec['id'].'\')">Check Application</button></td>
       </tr>
              ');
      
      }
    }
    else {echo('
      <div class="alert alert-danger" role="alert">
      No Applications Are Found!
      </div>');
    }
  }


  //this function use to get order list to admin panel or employees
  public function appr03(){

    $sqlSelect = "SELECT * FROM bform_status_tbl WHERE submit=1 AND chek1=1 AND chek2=0 AND chek2Error =0  ORDER BY id ASC;";
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
        echo('
        <tr>
          <th>'.$rec['id'].'</th>
          <th>'.$rec['uid'].'</th>
          <td><button type="button" class="btn btn-warning" onclick="view(\''.$rec['id'].'\')">Check Application</button></td>
       </tr>
              ');
      
      }
    }
    else {echo('
      <div class="alert alert-danger" role="alert">
      No Applications Are Found!
      </div>');
    }
  }


  //this function use to get order list to admin panel or employees
  public function appr04(){

    $sqlSelect = "SELECT * FROM bform_status_tbl WHERE submit=1 AND chek1=1 AND chek2=1 AND chek3=0 AND chek3Error =0  ORDER BY id ASC;";
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
        echo('
        <tr>
          <th>'.$rec['id'].'</th>
          <th>'.$rec['uid'].'</th>
          <td><button type="button" class="btn btn-warning" onclick="view(\''.$rec['id'].'\')">Check Application</button></td>
       </tr>
              ');
      
      }
    }
    else {echo('
      <div class="alert alert-danger" role="alert">
      No Applications Are Found!
      </div>');
    }
  }


//lets create search employer methord for previous function
public function appr01s($searchData){

//sqlSearchData
$sqlSelect = "SELECT * FROM bform_status_tbl WHERE (id LIKE '$searchData%' OR uid  LIKE '$searchData%') 
AND submit=0 ";
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
    echo('
    <tr>
      <th>'.$rec['id'].'</th>
      <th>'.$rec['uid'].'</th>
      <td><button type="button" class="btn btn-warning" onclick="view(\''.$rec['id'].'\')">Check Application</button></td>
   </tr>
          ');
  
  }
}
else {echo('
  <div class="alert alert-danger" role="alert">
  No Applications Are Found!
  </div>');
}
}

//lets create search employer methord for previous function
public function appr02s($searchData){

  //sqlSearchData
  $sqlSelect = "SELECT * FROM bform_status_tbl WHERE (id LIKE '$searchData%' OR uid  LIKE '$searchData%') AND 
  submit=1 AND chek1=0 AND chek1Error =0 ";
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
      echo('
      <tr>
        <th>'.$rec['id'].'</th>
        <th>'.$rec['uid'].'</th>
        <td><button type="button" class="btn btn-warning" onclick="view(\''.$rec['id'].'\')">Check Application</button></td>
     </tr>
            ');
    
    }
  }
  else {echo('
    <div class="alert alert-danger" role="alert">
    No Applications Are Found!
    </div>');
  }
  }



  //lets create search employer methord for previous function
public function appr03s($searchData){

  //sqlSearchData
  $sqlSelect = "SELECT * FROM bform_status_tbl WHERE (id LIKE '$searchData%' OR uid  LIKE '$searchData%') AND 
  submit=1 AND chek1=1 AND chek2=0 AND chek2Error =0 ";
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
      echo('
      <tr>
        <th>'.$rec['id'].'</th>
        <th>'.$rec['uid'].'</th>
        <td><button type="button" class="btn btn-warning" onclick="view(\''.$rec['id'].'\')">Check Application</button></td>
     </tr>
            ');
    
    }
  }
  else {echo('
    <div class="alert alert-danger" role="alert">
    No Applications Are Found!
    </div>');
  }
  }


//lets create search employer methord for previous function
public function appr04s($searchData){

  //sqlSearchData
  $sqlSelect = "SELECT * FROM bform_status_tbl WHERE (id LIKE '$searchData%' OR uid  LIKE '$searchData%') AND 
  submit=1 AND chek1=1 AND chek2=1 AND chek3=0 AND chek3Error =0 ";
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
      echo('
      <tr>
        <th>'.$rec['id'].'</th>
        <th>'.$rec['uid'].'</th>
        <td><button type="button" class="btn btn-warning" onclick="view(\''.$rec['id'].'\')">Check Application</button></td>
     </tr>
            ');
    
    }
  }
  else {echo('
    <div class="alert alert-danger" role="alert">
    No Applications Are Found!
    </div>');
  }
  }




//this function to get address data to address form within areder proccess
public function appr01g($uid){
  $sqlSelect = "SELECT * FROM bform_tbl WHERE formID = '$uid' ;";
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


//this function to get address data to address form within areder proccess
public function geta($uid){
  $sqlSelect = "SELECT * FROM bform_tbl WHERE userID = '$uid' ;";
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

public function appr01e($uid){
  $sqlSelect = "SELECT * FROM attach_tbl WHERE id = '$uid' ;";
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


public function appr01gl($uid){
  $sqlSelect = "SELECT * FROM bform_tbl WHERE formID = '$uid' ;";
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
 echo('Birth Cetificate <a href="../'.$rec['bc'].'" download>
 Click to download file
</a><br>NIC<a href="../'.$rec['nic'].'" download>
 Click to download file
</a><br>Bank Pass Book<a href="../'.$rec['fpbpb'].'" download>
 Click to download file
</a>');
 }
}


public function appr01ok($uid,$cname,$caddress,$coname,$name,$number,$date){

  
  $sqlSelect = "DELETE FROM attach_tbl WHERE id = '$uid';";
  //lets check the errors 
   if($this->dbResult->error){
   echo($this->dbResult->error);
   exit;
  }
//sql execute 
$sqlResult = $this->dbResult->query($sqlSelect);
if($sqlResult > 0){

  $sqlSelect = "INSERT INTO attach_tbl VALUES ('$uid','$cname','$caddress','$coname','$name','$number','$date');";
  //lets check the errors 
   if($this->dbResult->error){
   echo($this->dbResult->error);
   exit;
  }
//sql execute 
$sqlResult = $this->dbResult->query($sqlSelect);

 //check the number of rows
 if($sqlResult > 0){
 //insert order to databace
 $sqlInsert1 = "UPDATE bform_status_tbl SET submit = 1 WHERE id = '$uid';";

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
}else{
  $sqlSelect = "INSERT INTO attach_tbl VALUES ('$uid','$cname','$caddress','$coname','$name','$number','$date');";
  //lets check the errors 
   if($this->dbResult->error){
   echo($this->dbResult->error);
   exit;
  }
//sql execute 
$sqlResult = $this->dbResult->query($sqlSelect);

 //check the number of rows
 if($sqlResult > 0){
 //insert order to databace
 $sqlInsert1 = "UPDATE bform_status_tbl SET submit = 1 WHERE id = '$uid';";

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
}


public function appr02ok($uid){

 //insert order to databace
 $sqlInsert1 = "UPDATE bform_status_tbl SET chek1 = 1 WHERE id = '$uid';";

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



public function appr03ok($uid){

  //insert order to databace
  $sqlInsert1 = "UPDATE bform_status_tbl SET chek2 = 1 WHERE id = '$uid';";
 
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
 


 public function appr04ok($uid){

  //insert order to databace
  $sqlInsert1 = "UPDATE bform_status_tbl SET chek3 = 1, done = 1 WHERE id = '$uid';";
 
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

 


 public function appr01not($uid,$error){
  $sqlInsert1 = "UPDATE bform_status_tbl SET submiterror = 1 , submitComment ='$error'  WHERE id = '$uid';";

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


public function appr02not($uid,$error){
  $sqlInsert1 = "UPDATE bform_status_tbl SET chek1Error = 1 , chek1Comment ='$error'  WHERE id = '$uid';";

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


public function appr03not($uid,$error){
  $sqlInsert1 = "UPDATE bform_status_tbl SET chek2Error = 1 , chek2Comment ='$error'  WHERE id = '$uid';";

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



public function appr04not($uid,$error){
  $sqlInsert1 = "UPDATE bform_status_tbl SET chek3Error = 1 , chek3Comment ='$error'  WHERE id = '$uid';";

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