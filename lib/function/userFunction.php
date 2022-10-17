<?php
//we need to start the sessions 
session_start();


//include main.php
include_once('main.php');

//include auto number module 
include_once('auto_id.php');

//include send mail function
include_once('phpmailer/mail.php');

class User extends Main{

//lets create the Registration method

public function userRegistration($name,$email,$pwd,$phone,$nic){

    //generate new id for a User 
    $autoNumber = new AutoNumber;
    $userId = $autoNumber -> NumberGeneration("user_id","user_tbl","USR");

    //create token to activate account
    $token=bin2hex(random_bytes(15));

    //insert data to user table
    $sqlInsert = "INSERT INTO user_tbl VALUES('$userId','$name','$email','$phone','$nic','$token',0);";

    //lets check the errors 
    if($this->dbResult->error){
        echo($this->dbResult->error);
        exit;
    }

    //we need to execute our sql by query 
    $sqlResult = $this->dbResult->query($sqlInsert);

    //lest check the result is 0 or not 
    if($sqlResult > 0){
        
        //lets create a hash by using MD5
        $newPwd = md5($pwd);

        //insert dataset into the login table 
        $insertLogin = "INSERT INTO login_tbl VALUES('$userId','$email','$newPwd','user','$token',0);";

        //lets check the errors 
        if($this->dbResult->error){
            echo($this->dbResult->error);
            exit;
        }
        $loginResult = $this->dbResult->query($insertLogin);

         //send account activation email to user
        $email_send = new Mail();
        $email_send->Send_mail($email,"Welcome to Dipartment Of Labour","<h3>Hellow $name,</h3><br> <h4>Click this link to Activate your Account, <h4> <br> http://127.0.0.1/system_7/lib/routes/users/activate.php?id=$userId&token=$token ");
        

        if($loginResult > 0){
          return("01");
        }
        else{
            return("02");
        }
    }
    else{
        return("03");
    }
}//end of userRegistration

//*******************************************//

//user account activation module
public function userActivation($id,$token){
  //chektoken is in the databace
  $sqlQuery = "SELECT * FROM login_tbl WHERE user_id = '$id' AND d_status = 0";

  //database error checking part
  if($this->dbResult->error){
    echo($this->dbResult->error);
    exit;
  }
   //now we are going to execute the SQL query
   $sqlResult1 = $this->dbResult->query($sqlQuery);

   $rec = $sqlResult1->fetch_assoc();

  if($rec['login_status'] ==1 )
  {
    return("01");
  }
  elseif($rec['login_status']==$token)
    {
          //activate account
          $ubdate1=" UPDATE login_tbl SET login_status=1 WHERE user_id='$id';";
         if($this->dbResult->error){
          echo($this->dbResult->error);
          exit;
         }
        //now we are going to execute the SQL query
        $sqlResult2 = $this->dbResult->query($ubdate1);

        $ubdate2=" UPDATE user_tbl SET user_status=1 WHERE user_id='$id';";
        if($this->dbResult->error){
         echo($this->dbResult->error);
         exit;
        }
       //now we are going to execute the SQL query
       $sqlResult3 = $this->dbResult->query($ubdate2);
       return("02");
        
    }
  else
    {
      return("03");
    }
  }

//********************************************************//

// Now lets develop the Authentication Module

public function Authentication($userName,$pwd){
    //first check input data avalability
    if($userName!="" || $pwd!=""){
        //lets connect db and serch record
        $sqlQuery = "SELECT * FROM login_tbl WHERE login_email = '$userName' AND d_status = 0;";

        //database error checking part
        if($this->dbResult->error){
            echo($this->dbResult->error);
            exit;
        }

        //now we are going to execute the SQL query
        $sqlResult = $this->dbResult->query($sqlQuery);

        //lets count the number of rows
        $nor =  $sqlResult->num_rows;

        if($nor>0){

            //lets convert user entered password into a hash
            $newPwd = md5($pwd);

            //we need fetch the loginDetails 
            $rec = $sqlResult->fetch_assoc();

            //now lets validate the user pwd
            if($rec['login_pwd'] == $newPwd){
                //we need to check the status 
                if($rec['login_status'] == 1){
                    //lets check the user role
                        $logRole = $rec['login_role'];


                        switch($logRole){
                            case "user":

                            //lets create a cookie
                            setcookie('ucsc13',$rec['login_id'],time()+60*60);

                            //lets create sessions 
                            $_SESSION['user_id'] = $rec['user_id'];
                            $_SESSION['login_email'] = $rec['login_email'];
                              
                            if(!isset($_COOKIE[$location]))
                            {
                              header('location:../../index.php');
                            }
                            else
                            {
                              header($_COOKIE[$location]);
                            }
                      
                            break;

                            case "Admin":
                                //lets create a cookie
                                setcookie('ucsc13',$rec['login_id'],time()+60*60);

                                //lets create sessions 
                                $_SESSION['user_id'] = $rec['user_id'];
                                $_SESSION['login_email'] = $rec['login_email'];

          
                                //lets redirect user
                                header('location:admin.php');
                    
                                break;

                                case "Clarical":
                                  //lets create a cookie
                                  setcookie('ucsc13',$rec['login_id'],time()+60*60);
  
                                  //lets create sessions 
                                  $_SESSION['user_id'] = $rec['user_id'];
                                  $_SESSION['login_email'] = $rec['login_email'];
  
            
                                  //lets redirect user
                                  header('location:clarical.php');
                      
                                  break;

                                  case "HB":
                                    //lets create a cookie
                                    setcookie('ucsc13',$rec['login_id'],time()+60*60);
    
                                    //lets create sessions 
                                    $_SESSION['user_id'] = $rec['user_id'];
                                    $_SESSION['login_email'] = $rec['login_email'];
    
              
                                    //lets redirect user
                                    header('location:hb.php');
                        
                                    break;
                                    case "ACL":
                                      //lets create a cookie
                                      setcookie('ucsc13',$rec['login_id'],time()+60*60);
      
                                      //lets create sessions 
                                      $_SESSION['user_id'] = $rec['user_id'];
                                      $_SESSION['login_email'] = $rec['login_email'];
      
                
                                      //lets redirect user
                                      header('location:acl.php');
                          
                                      break;
                                      case "ENP":
                                        //lets create a cookie
                                        setcookie('ucsc13',$rec['login_id'],time()+60*60);
        
                                        //lets create sessions 
                                        $_SESSION['user_id'] = $rec['user_id'];
                                        $_SESSION['login_email'] = $rec['login_email'];
        
                  
                                        //lets redirect user
                                        header('location:emp.php');
                            
                                        break;
                            }
                }
                else{
                    echo("
                    <script>
                    Swal.fire({
                        icon: 'info',
                        text: 'Your Account has been Deactivated!',
                    })
                  </script>"
                );
                }
            }
            else{
                echo("
                <script>
                Swal.fire({
                    icon: 'error',
                    text: 'Please check your password!',
                })
              </script>"
            );
            }

        }
        else{
            echo("
                <script>
                Swal.fire({
                    icon: 'error',
                    text: 'Please check your User Name!',
                })
              </script>"
            );
        }
        }
        else{
            echo("
                <script>
                Swal.fire({
                    icon: 'warning',
                    text: 'Required fields!',
                })
              </script>"
            );
        }  
    }


      //view User Count
      function user_count(){

        
        $sqlSelect = "SELECT * FROM login_tbl WHERE d_status = 0 ORDER BY login_email DESC;";
         //lets check the errors 
          if($this->dbResult->error){
          echo($this->dbResult->error);
          exit;
         }
       //sql execute 
       $sqlResult = $this->dbResult->query($sqlSelect);

        //check the number of rows
        $nor = $sqlResult->num_rows;

        echo($nor);
          
    }

    function application_count(){

        
      $sqlSelect = "SELECT * FROM bform_status_tbl WHERE done = 0 ;";
       //lets check the errors 
        if($this->dbResult->error){
        echo($this->dbResult->error);
        exit;
       }
     //sql execute 
     $sqlResult = $this->dbResult->query($sqlSelect);

      //check the number of rows
      $nor = $sqlResult->num_rows;

      echo($nor);
        
  }

  function meeting_count(){

        
    $sqlSelect = "SELECT * FROM meeting_tbl WHERE respons = 0 ;";
     //lets check the errors 
      if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;
     }
   //sql execute 
   $sqlResult = $this->dbResult->query($sqlSelect);

    //check the number of rows
    $nor = $sqlResult->num_rows;

    echo($nor);
      
}
  
    // this function use to get user liat to admin page

    public function userList(){

        $sqlSelect = "SELECT * FROM user_tbl WHERE d_status = 0 ORDER BY user_id DESC;";
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
                <th >'.$rec['user_id'].'</th>
                <td>'.$rec['user_name'].'</td>
                <td>'.$rec['user_nic'].'</td>
                <td>'.$rec['user_phone'].'</td>
                <td>
                <button type="button" class="btn btn-warning" onclick="editacc(\''.$rec['user_id'].'\')">Edit</button> OR 
                <button type="button" class="btn btn-danger" onclick="deleteuser(\''.$rec['user_id'].'\')">Delete</button>
                </td>
             </tr>
                    ');
          }
        }
        else {echo('
          <div class="alert alert-danger" role="alert">
          No Users Are Found!
        </div>');
        }
    }



 //lets create search product methord
 public function userSearch($searchData){

    //sqlSearchData
    $sqlSelect = "SELECT * FROM user_tbl 
    WHERE (user_id LIKE '$searchData%' OR user_name LIKE '$searchData%' OR user_nic LIKE '$searchData%') 
    AND d_status = 0";
    
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
              <th >'.$rec['user_id'].'</th>
              <td>'.$rec['user_name'].'</td>
              <td>'.$rec['user_nic'].'</td>
              <td>'.$rec['user_phone'].'</td>
              <td>
              <button type="button" class="btn btn-warning" onclick="editacc(\''.$rec['user_id'].'\')">Edit</button> OR 
              <button type="button" class="btn btn-danger" onclick="deleteuser(\''.$rec['user_id'].'\')">Delete</button>
              </td>
           </tr>
                  ');
        }
      }
      else {echo('
        <div class="alert alert-danger" role="alert">
        No Users Are Found!
      </div>');
      }
  }

  public function delete_user($uid){
    $update1 = "UPDATE user_tbl SET d_status = 1 WHERE  user_id = '$uid' AND d_status = 0;";
    //lets check the errors 
     if($this->dbResult->error){
     echo($this->dbResult->error);
     exit;
    }
  //sql execute 
  $sqlResult = $this->dbResult->query($update1);

  $update2 = "UPDATE address_tbl SET d_status = 1 WHERE  user_id = '$uid' AND d_status = 0;";
    //lets check the errors 
     if($this->dbResult->error){
     echo($this->dbResult->error);
     exit;
    }
  //sql execute 
  $sqlResult = $this->dbResult->query($update2);

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

  
    // this function use to get user liat to admin page

    public function activate_userList(){

      $sqlSelect = "SELECT * FROM user_tbl WHERE d_status = 0 ORDER BY user_id DESC;";
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

          if($rec['user_status']==1){
            echo('
            <tr>
              <th >'.$rec['user_id'].'</th>
              <td>'.$rec['user_name'].'</td>
              <td>'.$rec['user_nic'].'</td>
              <td>'.$rec['user_phone'].'</td>
              <td><span class="badge bg-success py-2">Account Activated</span></td>
           </tr>
                  ');
          }
          else{
            echo('
            <tr>
              <th >'.$rec['user_id'].'</th>
              <td>'.$rec['user_name'].'</td>
              <td>'.$rec['user_nic'].'</td>
              <td>'.$rec['user_phone'].'</td>
              <td><button type="button" class="btn btn-warning py-1" onclick="activateacc(\''.$rec['user_id'].'\')">Activate </button></td>
           </tr>
                  ');
          }
           
        }
      }
      else {echo('
        <div class="alert alert-danger" role="alert">
        No Users Are Found!
      </div>');
      }
  }



  public function activate_userList_serch($searchData){

    $sqlSelect = "SELECT * FROM user_tbl WHERE (user_id LIKE '$searchData%' OR user_name LIKE '$searchData%' OR user_nic LIKE '$searchData%') AND d_status = 0";
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

        if($rec['user_status']==1){
          echo('
          <tr>
            <th >'.$rec['user_id'].'</th>
            <td>'.$rec['user_name'].'</td>
            <td>'.$rec['user_nic'].'</td>
            <td>'.$rec['user_phone'].'</td>
            <td><span class="badge bg-success py-2">Account Activated</span></td>
         </tr>
                ');
        }
        else{
          echo('
          <tr>
            <th >'.$rec['user_id'].'</th>
            <td>'.$rec['user_name'].'</td>
            <td>'.$rec['user_nic'].'</td>
            <td>'.$rec['user_phone'].'</td>
            <td><button type="button" class="btn btn-warning py-1" onclick="activateacc(\''.$rec['user_id'].'\')">Activate </button></td>
         </tr>
                ');
        }
         
      }
    }
    else {echo('
      <div class="alert alert-danger" role="alert">
      No Users Are Found!
    </div>');
    }
}

public function activate_user($uid){
  $update1 = "UPDATE user_tbl SET user_status = 1 WHERE  user_id = '$uid' AND d_status = 0;";
  //lets check the errors 
   if($this->dbResult->error){
   echo($this->dbResult->error);
   exit;
  }
//sql execute 
$sqlResult = $this->dbResult->query($update1);

$update2 = "UPDATE login_tbl SET login_status = 1 WHERE  user_id = '$uid' AND d_status = 0;";
  //lets check the errors 
   if($this->dbResult->error){
   echo($this->dbResult->error);
   exit;
  }
//sql execute 
$sqlResult = $this->dbResult->query($update2);

    return("ok"); 
 
 }

function userdata($uid){
  $sqlSelect = "SELECT * FROM user_tbl WHERE user_id = '$uid';";
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


function editdata($id,$name,$email,$phone,$nic){

  $update1 = "UPDATE user_tbl SET user_name='$name', user_email='$email', user_phone='$phone', user_nic='$nic' WHERE  user_id='$id' AND d_status = 0;";
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