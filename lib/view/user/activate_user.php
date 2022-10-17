<div class="card border-primary">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <h5>Delet User data</h5>
            </div>
            <siv class="col-6">
                <input class="form-control mx-1 my-1" type="search" name="searchData" id="search_user" placeholder="Search user">
            </siv>
        </div>
        <hr>
        <table class="table table-hover">
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
        
    </div>
</div>
<script>
    $(document).ready(function(){
        //send an ajax request at loading employers
        $.get("../routes/users/activate_user.php", function (res) {
        //display data 
        $("#user_list").html(res);
        })

        //search emp 
        $("#search_user").on('input',function(){
            $inputData = $(this).val();

            //send an ajax request 
            $.get("../routes/users/activate_user_serch.php",{searchData:$inputData},function(res){
                $("#user_list").html(res);
            })
        })
    })

    function activateacc(oid){
        Swal.fire({
        title: 'Are you sure?',
        text: "Do You want to Activate this user account!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Activate it!'
        }).then((result) => {
        if (result.isConfirmed) 
        {
            $.get("../routes/users/activate_useracc.php",{
                uid:oid
            },function (res) {
                if(res="ok"){
            Swal.fire(
            'Successful!',
            'You Activated account.',
            'success'
            )
            $.get("../routes/users/activate_user.php", function (res) {
            //display data 
            $("#user_list").html(res);
            })
                }
                else{
                    Swal.fire(
                    'Somethin Wrong',
                    'Can not activate user.',
                    'error')
                }
            })
        }
        });
     }


</script>