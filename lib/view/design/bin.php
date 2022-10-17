<div class="card border-danger">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <h5>Trash Folder</h5>
            </div>
            
        </div>
        <hr>
        <table class="table table-hover"  >
            <thead>
                <tr class="table-danger">
                    <th scope="row">Type</th>
                    <td>Id</td>
                    <td>Name</td>
                    <td>detail</td>
                    <!-- <td>Action</td> -->
                </tr>
            </thead>
            <tbody id="emp_list"  style="border: 1px solid;" class="center"  >
                
            </tbody>
        </table>
        
    </div>
</div>
<script>
     $(document).ready(function(){
        //send an ajax request at loading employers
        $.get("../routes/bin/list.php", function (res) {
        //display data 
        $("#emp_list").append(res);
        })
        $.get("../routes/bin/ulist.php", function (res) {
        //display data 
        $("#emp_list").append(res);
        })
      
       
    })
</script>