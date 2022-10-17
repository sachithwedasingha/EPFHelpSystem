<?php
//we need to start the sessions 
session_start();


//include main.php
include_once('main.php');

//include auto number module 
include_once('auto_id.php');

//include image upload function
include_once('img_upload.php');

//include auto password genaretor
include_once('passwordgenaretor.php');

//include send mail function
include_once('phpmailer/mail.php');

class Employer extends Main{

//lets create the employer Registration method

public function addEmployer($empFName,$empSName,$empBirthday,$empGender,$empNic,$empAddress,$empPhone,$empEmail,$empJobTitle,$empJobType,$empJobLevel,$empImageName,$empImageSize,$empImageType,$empImageLocation){

    //generate new id for a employer 
    $autoNumber = new AutoNumber;
    $empId = $autoNumber -> NumberGeneration("emp_Id","employer_tbl","EMP");

     //image upload function
    $objImage =new ImageUpload();
    $imageUrl = $objImage ->imgUpload($empImageName,$empImageType,"employer",$empImageLocation,$empId);

    //insert data to emplyer table
    $sqlInsert = "INSERT INTO employer_tbl VALUES('$empId','$empFName','$empSName','$empGender','$empNic','$empBirthday','$imageUrl','$empAddress','$empPhone','$empEmail','$empJobTitle','$empJobType','$empJobLevel',0);";

    //lets check the errors 
    if($this->dbResult->error){
        echo($this->dbResult->error);
        exit;
    }

    //we need to execute our sql by query 
    $sqlResult = $this->dbResult->query($sqlInsert);

    //lest check the result is 0 or not 
    if($sqlResult > 0){

        //genarete new password
        $pwd= get_password();

        //lets create a hash by using MD5
        $newPwd = md5($pwd);

          //send password to Employer
          $email_send = new Mail();
          $email_send->Send_mail($empEmail,"Welcome to Labour Department","<h3>Hellow $empFName,</h3><br> <h4>This is your account credentials, <br> please visit your account and Use it<h4> <br> Username: $empEmail <br> Password: $pwd ");

        //insert dataset into the login table 
        $insertLogin = "INSERT INTO login_tbl VALUES('$empId','$empEmail','$newPwd','$empJobTitle',1,0);";

        //lets check the errors 
        if($this->dbResult->error){
            echo($this->dbResult->error);
            exit;
        }
        $loginResult = $this->dbResult->query($insertLogin);

        if($loginResult > 0){
            return("Sign Up Success!");
        }
        else{
            return("Please Check the inputs and try again!");
        }

    }
    else{
        return("Please Try again later!");
    }
}

//this is user methord to get current user Details

public function Current_User_Details(){
            $sqlSelect = "SELECT * FROM employer_tbl ORDER BY emp_Id DESC;";
            //lets check the errors 
            if($this->dbResult->error){
            echo($this->dbResult->error);
            exit;
            }
        //sql execute 
        $sqlResult = $this->dbResult->query($sqlSelect);

            //check the number of rows
            $nor = $sqlResult->num_rows;

            //get the session stord user ID 
            if (isset($_SESSION['user_id'])){
            $id = $_SESSION['user_id'];

            if($nor > 0){
            while($rec = $sqlResult->fetch_assoc()){
                    if ($rec['emp_Id'] == $id){
                echo('<div class="user-pic">
                            <img class="img-responsive img-rounded" src="../'.$rec['emp_Image'].'" alt="User picture">
                        </div>
                        <div class="user-info">
                            <span class="user-name">'.$rec['emp_FirstName'].'
                                <strong>'.$rec['emp_SecondName'].'</strong>
                            </span>
                            <span class="user-role">'.$rec['emp_JobTitle'].'</span>
                            <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                            </span>
                        </div>'
                );
            }
            
        }
        }
            else {
            
            echo('<div class="user-pic">
            <img class="img-responsive img-rounded" src="../upload/employer/EMP0001_user1.png" alt="User picture">
        </div>
        <div class="user-info">
            <span class="user-name">Jhon
                <strong>Smith</strong>
            </span>
            <span class="user-role">Administrator</span>
            <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
            </span>
        </div>');
            }
        }
        else {
        echo('<div class="user-pic">
        <img class="img-responsive img-rounded" src="../upload/employer/EMP0001_user1.png" alt="User picture">
        </div>
        <div class="user-info">
        <span class="user-name">Jhon
            <strong>Smith</strong>
        </span>
        <span class="user-role">Administrator</span>
        <span class="user-status">
        <i class="fa fa-circle"></i>
        <span>Online</span>
        </span>
        </div>');
        }
     }
// this function use to get employer liat to admin page

        public function empList(){

            $sqlSelect = "SELECT * FROM employer_tbl WHERE d_status = 0 ORDER BY emp_Id DESC;";
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
                $badge="";
               if($rec['emp_JobTitle'] == "Admin")
                {$badge ='<span class="badge bg-danger">Admin</span>';}
              else if($rec['emp_JobTitle'] == "ACL")
                {$badge ='<span class="badge bg-success">ACL</span>';}
              else if($rec['emp_JobTitle'] == "HB")
                {$badge ='<span class="badge bg-warning">HB</span>';}
              else if($rec['emp_JobTitle'] == "Clarical")
                {$badge ='<span class="badge bg-info">Clarical</span>';}
              else if($rec['emp_JobTitle'] == "EMP")
                {$badge ='<span class="badge bg-econdary">EMP</span>';};
                  echo('
                  <tr>
                    <th >'.$rec['emp_Id'].'</th>
                    <td>'.$rec['emp_FirstName'].'</td>
                    <td>'.$rec['emp_Nic'].'</td>
                    <td>'.$rec['emp_Phone'].'</td>
                    <td>'.$badge.'</td>
                    <td><button type="button" onclick="editemp(\''.$rec['emp_Id'].'\');"  class="btn btn-warning">Edit
                    </button><button type="button" class="btn btn-danger" onclick="deleteemp(\''.$rec['emp_Id'].'\')">Delete</button></td>
                 </tr>
                        ');
              }
            }
            else {echo('
              <div class="alert alert-danger" role="alert" align="center">
              No Users Are Found!
            </div>');
            }
        }
  
        // this function use to get employer liat to admin page

        public function userList(){

          $sqlSelect = "SELECT * FROM employer_tbl WHERE d_status = 0 ORDER BY emp_Id DESC;";
           //lets check the errors 
            if($this->dbResult->error){
            echo($this->dbResult->error);
            exit;
           }
         //sql execute 
         $sqlResult = $this->dbResult->query($sqlSelect);

          //check the number of rows
          $nor = $sqlResult->num_rows;
          $a=""; $m=""; $s=""; $l=""; $e="";
          if($nor > 0){
            while($rec = $sqlResult->fetch_assoc()){

               

             if($rec['emp_JobTitle'] == "Admin")
              {$a .='<div class="row py-0 px-0">
                <div class="col-3 py-0 lp-">
                    <img style="width:36px;height:36;border-radius:50%"  src="../'.$rec['emp_Image'].'">
                </div>
                <div class="col-7 py-0 px-0">
                    <h6>'.$rec['emp_FirstName'].'</h6>
                </div>
                <div class="col-2 py-0 px-0">
                <i class="fas fa-circle" style="color:#5EFF33;font-size:11"></i>
                </div>
            </div>';}
            else if($rec['emp_JobTitle'] == "Clarical")
              {$m .='<div class="row py-0 px-0">
                <div class="col-3 py-0 lp-">
                    <img style="width:36px;height:36;border-radius:50%"  src="../'.$rec['emp_Image'].'">
                </div>
                <div class="col-7 py-0 px-0">
                    <h6>'.$rec['emp_FirstName'].'</h6>
                </div>
                <div class="col-2 py-0 px-0">
                <i class="fas fa-circle" style="color:#5EFF33;font-size:11"></i>
                </div>
            </div>';}
            else if($rec['emp_JobTitle'] == "HB")
              {$s .='<div class="row py-0 px-0">
                <div class="col-3 py-0 lp-">
                    <img style="width:36px;height:36;border-radius:50%"  src="../'.$rec['emp_Image'].'">
                </div>
                <div class="col-7 py-0 px-0">
                    <h6>'.$rec['emp_FirstName'].'</h6>
                </div>
                <div class="col-2 py-0 px-0">
                <i class="fas fa-circle" style="color:#5EFF33;font-size:11"></i>
                </div>
            </div>';}
            else if($rec['emp_JobTitle'] == "ACL")
              {$l .='<div class="row py-0 px-0">
                <div class="col-3 py-0 lp-">
                    <img style="width:36px;height:36;border-radius:50%"  src="../'.$rec['emp_Image'].'">
                </div>
                <div class="col-7 py-0 px-0">
                    <h6>'.$rec['emp_FirstName'].'</h6>
                </div>
                <div class="col-2 py-0 px-0">
                <i class="fas fa-circle" style="color:#5EFF33;font-size:11"></i>
                </div>
            </div>';}
            else if($rec['emp_JobTitle'] == "EMP")
              {$e .='<div class="row py-0 px-0">
                <div class="col-3 py-0 lp-">
                    <img style="width:36px;height:36;border-radius:50%"  src="../'.$rec['emp_Image'].'">
                </div>
                <div class="col-7 py-0 px-0">
                    <h6>'.$rec['emp_FirstName'].'</h6>
                </div>
                <div class="col-2 py-0 px-0">
                <i class="fas fa-circle" style="color:#5EFF33;font-size:11"></i>
                </div>
            </div>';}
            
            }  
              echo('
                <h6 style="color:green">Admin</h6>
                '.$a.'
                <hr>
                <h6 style="color:green">ACL</h6>
                '.$l.'
                <hr>
                <h6 style="color:green">HB</h6>
                '.$s.'
                <hr>
                <h6 style="color:green">Clarical</h6>
                '.$m.'
                <hr>
                <h6 style="color:green">EMP</h6>
                '.$e.'
                <hr>
                      ');
            
          }
          else {echo('
            <div class="alert alert-danger" role="alert" align="center">
            No Users Are Found!
          </div>');
          }
      }


        public function dList(){

            $sqlSelect = "SELECT * FROM employer_tbl WHERE d_status = 1 ORDER BY emp_Id DESC;";
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
                  <td><span class="badge bg-success">Employee</span></td>
                    <th >'.$rec['emp_Id'].'</th>
                    <td>'.$rec['emp_FirstName'].'</td>
                    <td>'.$rec['emp_JobTitle'].'</td>
                 </tr>
                        ');
              }
            }
            
        }
  
        public function duList(){

            $sqlSelect = "SELECT * FROM user_tbl WHERE d_status = 1 ORDER BY user_id DESC;";
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
                  <td><span class="badge bg-secondary">User</span></td>
                    <th >'.$rec['user_id'].'</th>
                    <td>'.$rec['user_name'].'</td>
                    <td>'.$rec['user_nic'].'</td>
                 </tr>
                        ');
              }
            }
            
        }

 
     //lets create search employer methord
     public function empSearch($searchData){

        //sqlSearchData
        $sqlSearch = "SELECT * FROM employer_tbl WHERE emp_Id LIKE '$searchData%' OR emp_FirstName LIKE '$searchData%' OR emp_SecondName LIKE '$searchData%'";
        
          //lets check the errors 
          if($this->dbResult->error){
              echo($this->dbResult->error);
              exit;
          }

        $sqlSearchData = $this->dbResult -> query($sqlSearch);

        $nor = $sqlSearchData -> num_rows;

        if($nor > 0){
          while($rec = $sqlSearchData -> fetch_assoc()){
            echo('
            <tr>
              <th >'.$rec['emp_Id'].'</th>
              <td>'.$rec['emp_FirstName'].'</td>
              <td>'.$rec['emp_Nic'].'</td>
              <td>'.$rec['emp_Phone'].'</td>
              <td>'.$rec['emp_JobTitle'].'</td>
              <td><button type="button" class="btn btn-warning" onclick="editemp(\''.$rec['emp_Id'].'\')">Edit</button>
              <button type="button" class="btn btn-danger" onclick="deleteemp(\''.$rec['emp_Id'].'\')">Delete</button></td>
            </tr>
                  ');
          }
        }
        else{echo('
          <div class="alert alert-danger" role="alert">
          No Users are Found!
        </div>');
        }
      }



      public function delete_emp($uid){

        if(($_SESSION['user_id']) == $uid){
          return ("no");
        }else{

        $update1 = "UPDATE employer_tbl SET d_status = 1 WHERE  emp_Id = '$uid' AND d_status = 0;";
        //lets check the errors 
         if($this->dbResult->error){
         echo($this->dbResult->error);
         exit;
        }
      //sql execute 
      $sqlResult = $this->dbResult->query($update1);
    
  
    
      $update2 = "UPDATE login_tbl SET d_status = 1 WHERE  user_id = '$uid' AND d_status = 0;";
        //lets check the errors 
         if($this->dbResult->error){
         echo($this->dbResult->error);
         exit;
        }
      //sql execute 
      $sqlResult = $this->dbResult->query($update2);
          
      return("ok"); 
       
       }
      }
    

      function userdata($uid){
        $sqlSelect = "SELECT * FROM employer_tbl WHERE emp_Id = '$uid';";
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
      
      function editdata($id,$name,$phone,$nic,$title,$type,$level,){

        $update1 = "UPDATE employer_tbl SET emp_FirstName='$name', emp_Phone='$phone', emp_Nic='$nic', emp_JobTitle='$title', emp_JobType='$type', emp_JobLevel='$level'  WHERE  emp_Id='$id' AND d_status = 0;";
           //lets check the errors 
            if($this->dbResult->error){
            echo($this->dbResult->error);
            exit;
           }
         //sql execute 
         $sqlResult = $this->dbResult->query($update1);
             return("ok"); 
      }
      


}
?>