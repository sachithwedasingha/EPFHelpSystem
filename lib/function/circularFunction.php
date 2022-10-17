<?php
//we need to start the sessions 
session_start();

//include main.php
include_once('main.php');

//include auto number module 
include_once('auto_id.php');

//add Image upload model
include_once('img_upload.php');

class Circular extends Main{

      //view all Products
      function ViewAllcurcular(){

          $sqlSelect = "SELECT * FROM circular_tbl WHERE d_status = 0 ORDER BY date DESC; ";
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
                echo('<tr class="table-active">
                <th scope="row">'.$rec['date'].'</th>
                <td>'.$rec['name'].'</td>
                <td><a href="lib/'.$rec['link'].'" download> Download</a></td>
                </tr>');
            }
          }
          else {echo('
            <div class="alert alert-danger" role="alert">
            No Circulars Are Found!
          </div>');
          }
      }

      //lets create search product methord
      public function circularSearch($searchData){

        //sqlSearchData
        $sqlSearch = "SELECT * FROM circular_tbl WHERE (name LIKE '%$searchData%' OR date LIKE '$searchData%') AND d_status = 0";
        
          //lets check the errors 
          if($this->dbResult->error){
              echo($this->dbResult->error);
              exit;
          }

        $sqlSearchData = $this->dbResult -> query($sqlSearch);

        $nor = $sqlSearchData -> num_rows;

        if($nor > 0){
          while($rec = $sqlSearchData -> fetch_assoc()){

            echo('<tr class="table-active">
            <th scope="row">'.$rec['date'].'</th>
            <td>'.$rec['name'].'</td>
            <td><a href="lib/'.$rec['link'].'" download> Download</a></td>
            </tr>');
          }
        }
        else{echo('
          <div class="alert alert-danger" role="alert">
          No Circulars Are Found!
        </div>');
        }
      }


      //view product Count
      function circular_count(){

        
        $sqlSelect = "SELECT * FROM circular_tbl WHERE d_status = 0 ORDER BY name DESC;";
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


      
      //lets create the Add Product Methord

public function addcircular($name,$date,$imageName,$imageSize,$imageType,$imageTemp){

   //generate new id for a product
   $autoNumber = new AutoNumber;
   $productId = $autoNumber -> NumberGeneration("circuler_id","circular_tbl","CER");

   //image upload function
  $objImage =new ImageUpload();
  $imageUrl = $objImage ->imgUpload($imageName,$imageType,"circular",$imageTemp,$productId);

   //insert product to databace
  $sqlInsert = "INSERT INTO circular_tbl VALUES('$productId','$date','$name','$imageUrl',0);";

  //lets check the errors 
  if($this->dbResult->error){
      echo($this->dbResult->error);
      exit;
  }

  //we need to execute our sql by query 
  $sqlResult = $this->dbResult->query($sqlInsert);

  //lest check the result is 0 or not 
  if($sqlResult > 0){
        return("Circular Add Success!");
    }
    else{
        return("Please Check the inputs and try again!");
    }
  }//end of add product


// this function use to get product liat to admin page

public function circularList(){

  $sqlSelect = "SELECT * FROM circular_tbl WHERE d_status = 0 ORDER BY date ASC;";
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
          <th >'.$rec['circuler_id'].'</th>
          <td>'.$rec['date'].'</td>
          <td>'.$rec['name'].'</td>
          <td><button type="button" onclick="edit(\''.$rec['circuler_id'].'\');" class="btn btn-warning">Edit</button>
          <button type="button" onclick="delete_pro(\''.$rec['circuler_id'].'\');" class="btn btn-danger">Delete</button></td>
       </tr>
              ');
    }
  }
  else {echo('
    <div class="alert alert-danger" role="alert">
    No circulars Are Found!
  </div>');
  }
}

//lets create search employer methord
public function circularSearch1($searchData){

//sqlSearchData
$sqlSearch = "SELECT * FROM circular_tbl WHERE (date LIKE '$searchData%' OR name  LIKE '$searchData%') AND d_status=0";

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
    <th >'.$rec['circuler_id'].'</th>
    <td>'.$rec['date'].'</td>
    <td>'.$rec['name'].'</td>
    <td><button type="button" onclick="edit(\''.$rec['circuler_id'].'\');" class="btn btn-warning">Edit</button>
    <button type="button" onclick="delete_pro(\''.$rec['circuler_id'].'\');" class="btn btn-danger">Delete</button></td>
 </tr>
        ');
}
}
else{echo('
  <tr><th colspan="6">
<div class="alert alert-danger" role="alert">
No circular are Found!
</div></th></tr>');
}
}



public function delete_circular($uid){
  $update1 = "UPDATE circular_tbl SET d_status = 1 WHERE  circuler_id = '$uid' AND d_status = 0;";
  //lets check the errors 
   if($this->dbResult->error){
   echo($this->dbResult->error);
   exit;
  }
//sql execute 
$sqlResult = $this->dbResult->query($update1);

    return("ok"); 
 
 }

 function circulardata($uid){
  $sqlSelect = "SELECT * FROM circular_tbl WHERE circuler_id = '$uid';";
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



function editdata($id,$name,$date){

  $update1 = "UPDATE circular_tbl SET name='$name', date='$date' WHERE  circuler_id='$id' AND d_status = 0;";
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