<div class="card border-danger">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <h5>All Application Status</h5>
            </div>
            <siv class="col-6">
                <input class="form-control mx-1 my-1" type="search" name="searchData" id="search_circular" placeholder="Search Circular">
            </siv>
        </div>
        <hr>
        <div id="list">
        <table class="table table-hover">
            <thead>
                <tr class="table-success outline-primary">
                    <th scope="row">Application Id</th>
                    <td>User ID</td>
                    <td>Employer</td>
                    <td>Clarical</td>
                    <td>HB</td>
                    <td>ACL</td>
                </tr>
            </thead>
            <tbody id="pro_list">
                
            </tbody>
        </table>
    </div>  
    </div>
</div>
<script>
    $(document).ready(function(){
       
        //send an ajax request at loading products
        $.get("../routes/application/application_list.php", function (res) {
        //display data 
        $("#pro_list").html(res);
        })

        //search emp 
        $("#search_circular").on('input',function(){
            $inputData = $(this).val();

            //send an ajax request 
            $.get("../routes/application/applicationsearch.php",{searchData:$inputData},function(res){
                $("#pro_list").html(res);
            })
        })
    })

</script>
