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
                $("#userName").attr('value', "Please Enter Your Name");
                $("#userName").attr('class', "form-control is-invalid");
            }

            if ($email.length == "") {
                $("#userEmail").attr('value', "Please Enter Your Email");
                $("#userEmail").attr('class', "form-control is-invalid");
            }

            if ($nic.length < 10) {
                $("#userNIC").attr('value', "Please Enter valide NIC Number");
                $("#userNIC").attr('class', "form-control is-invalid");
            }

            if ($phone.length < 10) {
                $("#userPhone").attr('value', "Please Enter valide Phone Number");
                $("#userPhone").attr('class', "form-control is-invalid");
            }

            if ($pwd.length == "") {
                $("#pwd_errorMsg").html("Please Retypr Your Password");
                $("#userPwd").attr('class', "form-control is-invalid");
            }

            if ($pwd.length < 5) {
                $("#pwd_errorMsg").html("Password must be up to 5 characters");
                $("#userPwd").attr('class', "form-control is-invalid");
            }

            if ($repwd.length == "") {
                $("#repwd_errorMsg").html("Please Retypr Your Password");
                $("#reuserPwd").attr('class', "form-control is-invalid");
            }
        } else {
            if ($pwd == $repwd) {

                //late use ajax request to send the data
                $.ajax({
                    url: "../routes/users/register.php",
                    type: "post",
                    data: $("#registrationForm").serialize(),
                    success: function (res) {
                        if (res == "Message has been sent01") {
                            Swal.fire({
                                icon: 'success',
                                text: 'Successfully Regeisterd, Please Check Your Email Account',
                            });
                        } else if (res == "Message could not be sent.01") {
                            Swal.fire({
                                icon: 'info',
                                text: 'Something Wrong In Your Email Account',
                            });
                        } else if (res == "02") {
                            Swal.fire({
                                icon: 'info',
                                text: 'Please Check the inputs and try again!',
                            });
                        } else {
                            Swal.fire({
                                icon: 'info',
                                text: 'Please Try again later!',
                            });
                        }
                    }
                })
            } else {
                $("#repwd_errorMsg").html("Password mismatch");
            }
        }

    })
})