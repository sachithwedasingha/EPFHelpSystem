<?php
//star the session
session_start();
//chek its logd in?
if(empty($_SESSION['user_id'])){
  header('location:login.php');
}
  
else{}

?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <!-- Link css and script file -->
    <link rel="stylesheet" href="../../../css/bootstrap.2min.css">
    <!--Link Bootstrap css file-->
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <!--Link Font awesome css file-->
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="../../../css/all.min.css">
    <script src="../../../js/all.min.js"></script>
    <script src="../../../js/jquery.js"></script>
    <style>
    @media print {
        .no-print,
        .no-print,
        #gradient,
        #steps-uid-0-p-3 * {
            display: none !important;
        }
        #date,
        #date * {
            display: none !important;
        }
        #sidenav,
        #sidenav * {
            display: none !important;
        }
    }
    table, th, td {
  border: 1px solid;
}
</style>
</head>

</html>
<div class="container" style="background-color:white;  color: black;">
    <div class="row pt-3">
        <br>
        <img src="../../upload/invoice/head.jpg" alt="">
    </div>
    <hr style="height: 6px; text-color: black;">
    <h2 class="py-3" style="text-align:center">Total Applications</h2>
    <div class="row"><div class="col-3"><h6>Service Number:</h6></div><div class="col-3"><h6 id="id"></h6></div></div>
    <div class="row"><div class="col-3"><h6>Date:</h6></div><div class="col-3"><h6 id="date"></h6></div></div>
    
     

    <table class="center mt-5" style="text-align:center; width:80%; border: 1px solid;margin-left: auto; margin-right: auto;">
        <tr>
            <th>Type</th>
            <th>Count</th>
        </tr>
        <tr>
            <th>All Users</th>
            <td id="01"></td>
        </tr>
        <tr>
            <th>Application Submited Count </th>
            <th id="02"></th>
        </tr> 
        <tr>
            <th>Application Employer Approved </th>
            <th id="03"></th>
        </tr> 
        <tr>
            <th>Application Clarical Approved </th>
            <th id="04"></th>
        </tr>
        <tr>
            <th>Application HB Approved </th>
            <th id="05"></th>
        </tr>
        <tr>
            <th>Application ACL Approved </th>
            <th id="06"></th>
        </tr>
        </tbody>
    </table>
    <br><br><br><br>
    <div class="row">
        <div class="col-8"></div>
        <div class="col-4">
            <h6>...................................................</h6>
            <h6> Signature</h6>
            <br><br><br>
        </div>
    </div>
</div>
<div class="no-print">
<button type="button" class="btn btn-secondary my-3 mx-5 px-5" onclick="history.back()"><i class="fas fa-arrow-left"></i>   Back</button>
<button type="button" class="btn btn-success my-3 px-5" onclick="window.print();"><i class="fas fa-print"></i>   Print</button>
</div>
<script>
$(document).ready(function(){

    $id=Math.floor((Math.random() * 100) + 1);
    //make id
        $('#id').text("INV00"+$id);
//get date
        var today = new Date();
        var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
//set date
        $('#date').text(date);

       


$.get("../../routes/invoice/gett1.php", function (res) {
      //display data 
      $("#01").html(res);
      
});

$.get("../../routes/invoice/gett2.php", function (res) {
      //display data 
      $("#02").html(res);
      
});


$.get("../../routes/invoice/gett3.php", function (res) {
      //display data 
      $("#03").html(res);
      
});

$.get("../../routes/invoice/gett4.php", function (res) {
      //display data 
      $("#04").html(res);
      
});


$.get("../../routes/invoice/gett5.php", function (res) {
      //display data 
      $("#05").html(res);
      
});


$.get("../../routes/invoice/gett6.php", function (res) {
      //display data 
      $("#06").html(res);
      
});
    })

</script> 