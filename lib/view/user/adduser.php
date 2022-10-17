
<div class="card border-primary">
    <div class="card-body">
        <h5>Add New User</h5>
        <hr>
<form id="registrationForm">
<div class="form-group py-3">
    <input type="text" name="userName" id="userName" class="form-control"
        placeholder="Enter Your Name">
    <span id="name_errorMsg" style="color:red"></span>
</div>
<div class="form-group mt-3">
    <input type="Email" name="userEmail" id="userEmail" class="form-control"
        placeholder="Enter Your Email">
    <span id="email_errorMsg" style="color:red"></span>
</div>
<div class="form-group mt-3">
    <input type="password" name="userPwd" id="userPwd" class="form-control"
        placeholder="Enter Tempory Password">
    <span id="pwd_errorMsg" style="color:red"></span>
</div>
<div class="form-group mt-3">
    <input type="password" name="reuserPwd" id="reuserPwd" class="form-control"
        placeholder="Re Enter Tempory Password">
    <span id="repwd_errorMsg" style="color:red"></span>
</div>
<div class="form-group mt-3">
    <input type="text" name="userPhone" id="userPhone" class="form-control"
        placeholder="Enter Your Phone number">
    <span id="phone_errorMsg" style="color:red"></span>
</div>
<div class="form-group mt-3">
    <input type="text" name="userNIC" id="userNIC" class="form-control"
        placeholder="Enter Your NIC">
    <span id="nic_errorMsg" style="color:red"></span>
</div>
<div class="form-group mt-3">
    <button class="btn btn-success" id="btnSave">Create Your Account</button>
    <input type="reset" value="clear" class="btn btn-ontline-warning">
</div>
</form>
</div>
</div>
<script>
    $(document).ready(function () {

$('#btnSave').click(function (e) {
    e.preventDefault();
    

    //Validation ruls

    //get the name input value
    $name = $("#userName").val();
    //get the Email input value
    $email = $("#userEmail").val();
    //fetch phone number value
    $phone = $("#userPhone").val();
    //fetch NIC value
    $nic = $("#userNIC").val();
    //fetch pwd value
    $pwd = $("#userPwd").val();
    //fetch pwd value
    $repwd = $("#reuserPwd").val();

    //validation rule
    if ($name.length == "" || $email.length == "" || $pwd.length == "" || $repwd.length == "" || $phone.length < 10 || $nic.length < 10) {
        if ($name.length == "") {
            $("#name_errorMsg").html("Please Enter Your Name");
        }

        if ($email.length == "") {
            $("#email_errorMsg").html("Please Enter Your Email Address");
        }

        if ($nic.length < 10) {
            $("#nic_errorMsg").html("Incorrect NIC");
        }

        if ($phone.length < 10) {
            $("#phone_errorMsg").html("Incorrect Phone Number");
        }

        if ($pwd.length == "") {
            $("#pwd_errorMsg").html("Please Enter Your Password");
        }

        if ($repwd.length == "") {
            $("#repwd_errorMsg").html("Please Retypr Your Password");
        }
    }
     else {
         if($pwd == $repwd)
         {

            //late use ajax request to send the data
            $.ajax({
                url: "../routes/users/register.php",
                type: "post",
                data: $("#registrationForm").serialize(),
                success: function (res) {
                        if( res == "Message has been sent01"){
                            Swal.fire({
                                icon: 'success',
                                text: 'Successfully Regeisterd, Please Check Your Email Account',
                            });
                        }
                        else if( res =="Message could not be sent.01"){
                            Swal.fire({
                                icon: 'info',
                                text: 'Something Wrong In Your Email Account',
                            });
                        }
                        else if( res =="02"){
                            Swal.fire({
                                icon: 'info',
                                text: 'Please Check the inputs and try again!',
                            });
                        }
                        else{
                            Swal.fire({
                                icon: 'info',
                                text: 'Please Try again later!',
                            });
                        }
                    }
            })
        }
        else{
            $("#repwd_errorMsg").html("Password mismatch");
        }
     }

})
})
</script>