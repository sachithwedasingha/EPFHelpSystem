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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
<div class="container">
<div class="no-print">
        <div class="col-7 border my-2">
        <div class="form-group row">
                <div class="col-4 py-3 px-4">
                    <label>Enter B-form ID</label>
                </div>
                <div class="col-4 py-3">
                <input class="form-control" type="text" id="id" />
                </div>
                <div class="col-2 px-4 py-2">
                    <button type="button" class="btn btn-success" id="genarate">Genarate</button>
                </div>
            </div>
        </div>
</div>
</div>
<div class="container" style="background-color:white;  color: black;">
    <div class="row pt-3 " style="text-align:center;">
        <br>
        <img src="../../upload/invoice/head.jpg" alt="">
    </div>
    <hr style="height: 4px; text-color: black;">
    <form  enctype="multipart/form-data" class="mx-5">
                <h4>Personal Details</h4>
                <div class="form-group px-5">
                <input class="form-control mx-1 my-1" type="hidden" value="" id="ID" name="Id">
                </div>
                <div class="form-group px-5 ">
                <label class="form-label mt-2 ">Full Name of Member</label>
                <input type="text" class="form-control" id="Name" name="Name" for="disabledInput" readonly="" >
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">full Address</label>
                <input type="text" class="form-control " id="Address" name="Address" for="disabledInput" readonly="" >
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Father's Full Name </label>
                <input type="text" class="form-control" id="FatherName" name="FatherName" for="disabledInput" readonly="" >
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Mother's Full Name</label>
                <input type="text" class="form-control" id="MotherName" name="MotherName" for="disabledInput" readonly="" >
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Spouse full Name</label>
                <input type="text" class="form-control" id="SpouseName" name="SpouseName" for="disabledInput" readonly="" >
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Any natural distinguishig marks of Member</label>
                <input type="text" for="disabledInput" readonly="" class="form-control" id="Marks" name="Marks" identity card>
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Birthday of the Member</label>
                <input type="date" class="form-control" id="Birthday" for="disabledInput" readonly="" name="Birthday">
                </div>
                <h4>Identity Card Details</h4>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Identity card Number</label>
                <input type="text" class="form-control" id="IDNumber" name="IDNumber" for="disabledInput" readonly="" >
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Name Appearing on Identity card</label>
                <input type="text" class="form-control" id="IDName" name="IDNname" for="disabledInput" readonly="" >
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Date of Issue NIC</label>
                <input type="date" class="form-control" id="IDDate" for="disabledInput" readonly="" name="IDDate">
                </div>
                <h4>Bank Account Details</h4>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Type Of Account</label>
                <input type="text" class="form-control"" id="ACCType" for="disabledInput" readonly="" name="ACCType"></input>
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Bank Name</label>
                <input type="text" class="form-control" id="BankName" for="disabledInput" readonly="" readonly="" name="BankName"  >
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Bank Branch</label>
                <input type="text" class="form-control" id="BankBranch" name="BankBranch" for="disabledInput" readonly="" >
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Account Number</label>
                <input type="Number" class="form-control" id="ACCNumber" for="disabledInput" readonly="" name="ACCNumber" >
                </div>
                <h4>Name Cetification</h4>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Name in Birth Cetificate</label>
                <input type="text" class="form-control" id="NameBC" name="NameBC" for="disabledInput" readonly="" >
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Name in NIC</label>
                <input type="text" class="form-control" id="NameNIC" name="NameNIC" for="disabledInput" readonly="" >
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Name in B-Card</label>
                <input type="text" class="form-control" id="NameBCard" name="NameBCard" for="disabledInput" readonly="" >
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Name in EPF Account in Central Bank</label>
                <input type="text" class="form-control" id="NameEPFCB" name="NameEPFCB" for="disabledInput" readonly="" >
                </div>
                <h4>Membership Numbers</h4>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Last Membership Number</label>
                <input type="text" class="form-control" id="LastMN" name="LastMN"for="disabledInput" readonly="" >
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Last Employer's Number</label>
                <input type="text" class="form-control" id="LastEN" name="LastEN" for="disabledInput" readonly="">
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Last Job Leveing Date</label>
                <input type="Date" class="form-control" id="LastLD" for="disabledInput" readonly="" name="LastLD" >
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Cause of cessation of employment</label>
                <input type="text" class="form-control" id="LastLR" name="LastLR" for="disabledInput" readonly="" >
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Last Employer's Name</label>
                <input type="text" class="form-control" id="LastEName" name="LastEName" for="disabledInput" readonly="" >
                </div>
                <h6>If you work with any employer's membership numbre/employer's number/leving data</h6>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">membership numbre/employer's number/leving data</label>
                <input type="text" class="form-control" id="LastEN1" for="disabledInput" readonly="" name="LastEN1" >
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">membership numbre/employer's number/leving data</label>
                <input type="text" class="form-control" id="LastEN2" for="disabledInput" readonly="" name="LastEN2" >
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">membership numbre/employer's number/leving data</label>
                <input type="text" class="form-control" id="LastEN3" for="disabledInput" readonly="" name="LastEN3" >
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">membership numbre/employer's number/leving data</label>
                <input type="text" class="form-control" id="LastEN4" for="disabledInput" readonly="" name="LastEN4">
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">membership numbre/employer's number/leving data</label>
                <input type="text" class="form-control" id="LastEN5" for="disabledInput" readonly="" name="LastEN5" >
                </div>
                <h4>Attachment</h4>
                <div id="links" class="px-5">

                </div>
                <h4>Employer details</h4>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Company Name</label>
                    <input type="text" name="comname" id="comname" for="disabledInput" readonly="" class="form-control" >
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Company Address</label>
                    <input type="text" name="comaddress" id="comaddress" for="disabledInput" readonly="" class="form-control" >
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Owners Name</label>
                    <input type="text" name="comoname" id="comoname" for="disabledInput" readonly="" class="form-control" >
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Employee Name</label>
                    <input type="text" name="name" id="comemname" for="disabledInput" readonly="" class="form-control" >
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Employee Number</label>
                    <input type="text" name="number" id="number" for="disabledInput" readonly="" class="form-control" >
                </div>
                <div class="form-group px-5">
                <label class="form-label mt-2 ">Employee Last EPF Detail Date</label>
                    <input type="date" for="disabledInput" readonly="" name="date2" id="date2" class="form-control" >
                </div>
                
            </form>

  
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

$(document).ready(function() {

    $('#genarate').click(function (e) {
        $.get("../../routes/invoice/appr01g.php", {
        uid:$('#id').val(),
        }, function (res) {
        var jdata = jQuery.parseJSON(res);
            $("#ID").val(jdata.formID);
            $("#Name").val(jdata.name);
            $("#Address").val(jdata.address);
            $("#FatherName").val(jdata.fatherName);
            $("#MotherName").val(jdata.motherName);
            $("#SpouseName").val(jdata.spouseName);
            $("#Marks").val(jdata.marks);
            $("#Birthday").val(jdata.birthday);
            $("#IDNumber").val(jdata.idNumber);
            $("#IDName").val(jdata.idName);
            $("#IDDate").val(jdata.idDate);
            $("#ACCType").val(jdata.accType);
            $("#BankName").val(jdata.bankName);
            $("#BankBranch").val(jdata.bankBranch);
            $("#ACCNumber").val(jdata.accNumber);
            $("#NameBC").val(jdata.nameBC);
            $("#NameNIC").val(jdata.nameNIC);
            $("#NameBCard").val(jdata.nameBCard);
            $("#NameEPFCB").val(jdata.nameEPFCB);
            $("#LastMN").val(jdata.lastMN);
            $("#LastEN").val(jdata.lastEN);
            $("#LastLD").val(jdata.lastLD);
            $("#LastLR").val(jdata.lastLR);
            $("#LastEName").val(jdata.lastENAme);
            $("#LastEN1").val(jdata.lastEN1);
            $("#LastEN2").val(jdata.lastEN2);
            $("#LastEN3").val(jdata.lastEN3);
            $("#LastEN4").val(jdata.lastEN4);
            $("#LastEN5").val(jdata.lastEN5);
        })
        
        $.get("../../routes/invoice/appr01e.php", {
            uid:$('#id').val(),
        }, function (res) {
        var jdata = jQuery.parseJSON(res);
            $("#comname").val(jdata.cname);
            $("#comaddress").val(jdata.caddress);
            $("#comoname").val(jdata.coname);
            $("#comemname").val(jdata.name);
            $("#number").val(jdata.number);
            $("#date2").val(jdata.date);
            
        })

    })
});


</script> 