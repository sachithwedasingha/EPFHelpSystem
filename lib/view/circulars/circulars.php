<div class="card border-success py-4 px-4">
    <div class="card-body">
        <div class="row">
            <div class="col-12  " style="text-align:center;">
             <h5>Laters Circulars</h5>
             <div class="col-6">
                <input class="form-control mx-1 my-1" type="search" name="searchData" id="search_product" placeholder="Search circulars using name or date">
            </div>
             <table class="table table-hover" style="outline:1px;">
                    <thead>
                    <tr class="table-success" >
                        <th scope="row">Date</th>
                        <th scope="col">Name</th>
                        <th scope="col">Download Link</th>
                        </tr>
                    </thead>
                    <tbody id="pro_list">
                        
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
<script>
 $(document).ready(function(){
    
        //send an ajax request at loading products
        $.get("lib/routes/circular/circular_list.php", function (res) {
        //display data 
        $("#pro_list").html(res);
        })

        //search emp 
        $("#search_product").on('input',function(){
            $inputData = $(this).val();

            //send an ajax request 
            $.get("lib/routes/circular/circularsearch.php",{searchData:$inputData},function(res){
                $("#pro_list").html(res);
            })
        })
    })
</script>
  