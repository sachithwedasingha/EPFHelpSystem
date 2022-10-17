<div class="card border-danger">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <h5>Edit Employer data</h5>
            </div>
            <div class="col-6">
                <input class="form-control mx-1 my-1" type="search" name="searchData" id="search_emp" placeholder="Search employer">
            </div>
        </div>
        <hr>
        <div id="list">
        <table class="table table-hover">
            <thead>
                <tr class="table-success">
                    <th scope="row">Emp Id</th>
                    <td>Employer Name</td>
                    <td>Employer Nic</td>
                    <td>Phone</td>
                    <td>position</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody id="emp_list">
                
            </tbody>
        </table>
    </div>
    <div id="edit">
    <div class="form-group py-1 ">
                        <label for="staticEmail" class="col-form-label px=2 my-2">Name</label>
                            <input type="hidden"id="uid" class="form-control "> 
                            <input type="text"id="userName" class="form-control "> 
                        </div>
                        <div class="form-group mt-1">
                        <label for="staticEmail" class="col-form-label">Phone Number</label>
                            <input type="text" id="userPhone" class="form-control">    
                        </div>
                        <div class="form-group mt-1">
                        <label for="staticEmail" class=" col-form-label">NIC</label>
                            <input type="text" id="userNIC" class="form-control">
                        </div>
                        <div class="form-group col-md-6 mt-2">
                            <select class="form-select" name="empJobTitle" id="empJobTitle">
                                <option value="0">Select Job Position</option>
                                <option value="Admin">Admin</option>
                                <option value="Manager">Manager</option>
                                <option value="Store Keeper">Store Keeper</option>
                                <option value="Designer">Delivery Man</option>
                                <option value="Technical Officer">Cashier</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 mt-2">
                            <select class="form-select" name="empJobType" id="empJobType">
                                <option value="0">Select Job Type</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 mt-2">
                            <select class="form-select" name="empJobLevel" id="empJobLevel">
                                <option value="0">Select Job Level</option>
                                <option value="Tranee">Tranee</option>
                                <option value="Internship">Internship</option>
                                <option value="Junior">Junior</option>
                                <option value="Senior">Senior</option>
                            </select>
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
        $('#edit').hide();

        //send an ajax request at loading employers
        $.get("../routes/emp/emp_list.php", function (res) {
        //display data 
        $("#emp_list").html(res);
        })

        //search emp 
        $("#search_emp").on('input',function(){
            $inputData = $(this).val();

            //send an ajax request 
            $.get("../routes/emp/empsearch.php",{searchData:$inputData},function(res){
                $("#emp_list").html(res);
            })
        })
    })

    function deleteemp(oid){
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
            $.get("../routes/emp/delete_emp.php",{
                uid:oid
            },function (res) {
                if(res="ok"){
                    Swal.fire(
                    'Successful!',
                    'Your Deleted User Account.',
                    'success'
                    )
                    $.get("../routes/emp/emp_list.php", function (res) {
                        //display data 
                        $("#emp_list").html(res);
        })
                }
                else if (res="no"){
                    Swal.fire(
                    'Somethin Wrong',
                    'You can not delete Loged User Account.',
                    'error')
                }else{
                    Swal.fire(
                    'Somethin Wrong',
                    'Can not delete user.',
                    'error')
                }
            })
        }
        });
     }

     function backlist(){
        $('#list').show();
        $('#edit').hide();
     }

     function editemp(uid){
         $userid = uid;

        $('#list').hide();
        $('#edit').show();

        $.get("../routes/emp/getuserdata.php", {
        uid:uid
        }, function (res) {
        var jdata = jQuery.parseJSON(res);
            $("#uid").val(jdata.emp_Id);
            $("#userName").val(jdata.emp_FirstName);
            $("#userPhone").val(jdata.emp_Phone);
            $("#userNIC").val(jdata.emp_Nic);
            $("#empJobTitle").val(jdata.emp_JobTitle);
            $("#empJobType").val(jdata.emp_JobType);
            $("#empJobLevel").val(jdata.emp_JobLevel);
           
        })
     }


        
     function edit(){
            $uid = $("#uid").val();
            $name = $("#userName").val();
            $phone = $("#userPhone").val();
            $nic = $("#userNIC").val();
            $title = $("#empJobTitle").val();
            $type = $("#empJobType").val();
            $level = $("#empJobLevel").val();

        Swal.fire({
        title: 'Are you sure?',
        text: "Did You want to edit this Employer details!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Edit it!'
        }).then((result) => {
        if (result.isConfirmed) 
        {
            $.get("../routes/emp/editdata.php",{
                id: $uid,
                un: $name,
                ph: $phone,
                nic: $nic,
                ti: $title,
                ty: $type,
                le: $level
            },function (res) {
                if(res="ok"){
            Swal.fire(
            'Successful!',
            'Your Edit Done.',
            'success'
            )
            $('#list').show();
            $('#edit').hide();

             //send an ajax request at loading employers
                $.get("../routes/emp/emp_list.php", function (res) {
                //display data 
                $("#emp_list").html(res);
                })
                }
                else{
                    Swal.fire(
                    'Somethin Wrong',
                    'Can not edit data.',
                    'error')
                    $('#list').show();
                    $('#edit').hide();
                }
               
            })
        }
        });
    }

</script>
