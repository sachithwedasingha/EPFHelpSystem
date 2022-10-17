<div class="card border-danger">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <h5>Edit User data</h5>
            </div>
            <siv class="col-6">
                <input class="form-control mx-1 my-1" type="search" name="searchData" id="search_user" placeholder="Search user">
            </siv>
        </div>
        <hr>

        <table class="table table-hover" id="userlist">
            <thead>
                <tr class="table-success">
                    <th scope="row">User Id</th>
                    <td>User Name</td>
                    <td>User Nic</td>
                    <td>Phone</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody id="user_list">
                
            </tbody>
        </table>
          
            <div class="card px=2 my-2" id=userdata>
                        <div class="form-group py-1 ">
                        <label for="staticEmail" class="col-form-label px=2 my-2">Name</label>
                        <input type="hidden"id="uid" class="form-control "> 
                            <input type="text"id="userName" class="form-control "> 
                        </div>
                        <div class="form-group mt-1">
                        <label for="staticEmail" class="col-form-label">Email</label>
                            <input type="Email"id="userEmail" class="form-control">
                        </div>
                        <div class="form-group mt-1">
                        <label for="staticEmail" class="col-form-label">Phone Number</label>
                            <input type="text" id="userPhone" class="form-control">    
                        </div>
                        <div class="form-group mt-1">
                        <label for="staticEmail" class=" col-form-label">NIC</label>
                            <input type="text" id="userNIC" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <button class="btn btn-success" onclick="edit()">Edit Data</button>

                            <button class="btn btn-secondary" onclick="backlist()">User List</button>
                        </div>

            </div>

    </div>
</div>
<script>
    $(document).ready(function(){
        $('#userdata').hide();
        //send an ajax request at loading employers
        $.get("../routes/users/user_list.php", function (res) {
        //display data 
        $("#user_list").html(res);
        })

        //search emp 
        $("#search_user").on('input',function(){
            $inputData = $(this).val();

            //send an ajax request 
            $.get("../routes/users/usersearch.php",{searchData:$inputData},function(res){
                $("#user_list").html(res);
            })
        })

    })

    function deleteuser(oid){
        Swal.fire({
        title: 'Are you sure?',
        text: "Do You want to delete this user permanently!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) 
        {
            $.get("../routes/users/delete_user.php",{
                uid:oid
            },function (res) {
                if(res="ok"){
            Swal.fire(
            'Successful!',
            'Your Deleted User Account.',
            'success'
            )
            //reload list
            $.get("../routes/users/user_list.php", function (res) {
            //display data 
            $("#user_list").html(res);
            })
                }
                else{
                    Swal.fire(
                    'Somethin Wrong',
                    'Can not delete user.',
                    'error')
                }
            })
        }
        });
     }

     function editacc(uid){
         $userid = uid;

        $('#userlist').hide();
        $('#userdata').show();

        $.get("../routes/users/getuserdata.php", {
        uid:uid
        }, function (res) {
        var jdata = jQuery.parseJSON(res);
            $("#uid").val(jdata.user_id);
            $("#userName").val(jdata.user_name);
            $("#userEmail").val(jdata.user_email);
            $("#userPhone").val(jdata.user_phone);
            $("#userNIC").val(jdata.user_nic);
           
        })
     }

     function backlist(){
        $('#userlist').show();
        $('#userdata').hide();
     }

     function edit(){
            $uid = $("#uid").val();
            $name = $("#userName").val();
            $mail = $("#userEmail").val();
            $phone = $("#userPhone").val();
            $nic = $("#userNIC").val();

        Swal.fire({
        title: 'Are you sure?',
        text: "Did You want to edit this customer details!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Edit it!'
        }).then((result) => {
        if (result.isConfirmed) 
        {
            $.get("../routes/users/editdata.php",{
                id: $uid,
                un: $name,
                em: $mail,
                ph: $phone,
                nic: $nic
            },function (res) {
                if(res="ok"){
            Swal.fire(
            'Successful!',
            'Your Edit Done.',
            'success'
            )
            $('#userlist').show();
            $('#userdata').hide();
            $.get("../routes/users/user_list.php", function (res) {
            //display data 
            $("#user_list").html(res);
            })
                }
                else{
                    Swal.fire(
                    'Somethin Wrong',
                    'Can not edit data.',
                    'error')
                    $('#userlist').show();
                    $('#userdata').hide();
                }
               
            })
        }
        });
    }

</script>