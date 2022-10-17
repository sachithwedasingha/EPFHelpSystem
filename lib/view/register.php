<?php
//lets include app.php
include_once('../layout/app.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register Page</title>
</head>
<body>
    <section class="form my-4 mx-1">
        <div class="container">
        <div class="card border-primary col-10 offset-1 py-0"  id="logincard"> 
            <div class="row">
                <div class="col-5 px-2.5 mt-0">
                    <img src="../../lib/upload/ui/reg.jpg" class="img-fluid" style="height:500px" id="lofinImage">
                </div>
                <div class="col-md-7">
                    <div class="col-lg-10 px-1 pt-2">
                        <h1 class="font-weught-bold py-1">Register</h1>
                        <form id="registrationForm">
                            <div class="form-group has-danger mt-3">
                                <input type="text"  name="userName" id="userName" class="form-control"
                                    placeholder="Enter Your Name">
                            </div>
                            <div class="form-group mt-3">
                                <input type="Email" name="userEmail" id="userEmail" class="form-control"
                                    placeholder="Enter Your Email">
                            </div>
                            <div class="form-group mt-3">
                                <input type="password" name="userPwd" id="userPwd" class="form-control"
                                    placeholder="Enter Your Password">
                                <span id="pwd_errorMsg" style="color:red"></span>
                            </div>
                            <div class="form-group mt-3">
                                <input type="password" name="reuserPwd" id="reuserPwd" class="form-control"
                                    placeholder="Enter Your Password">
                                <span id="repwd_errorMsg" style="color:red"></span>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" name="userPhone" id="userPhone" class="form-control"
                                    placeholder="Enter Your Phone number">
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" name="userNIC" id="userNIC" class="form-control"
                                    placeholder="Enter Your NIC">
                            </div>
                            <div class="form-group mt-3">
                                <button class="btn btn-info" id="btnSave">Create Your Account</button>
                                <input type="reset" value="Clear" class="btn btn-outline-danger">
                                <a href="../../index.php">
                                    <button type="submit" name="add" class="btn btn-outline-primary">
                                         <i class="fas fa-home"></i>Home</bitton>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>