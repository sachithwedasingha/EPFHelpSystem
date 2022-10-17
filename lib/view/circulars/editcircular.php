<div class="card border-danger">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <h5>Edit Circular Data</h5>
            </div>
            <siv class="col-6">
                <input class="form-control mx-1 my-1" type="search" name="searchData" id="search_circular" placeholder="Search Circular">
            </siv>
        </div>
        <hr>
        <div id="edit">
        <form id="addProductForm"  enctype="multipart/form-data">
        <div class="form-group mt-2">
                <input type="hidden"id="cid" class="form-control ">
                <input type="date" name="date" id="date" class="form-control">
            </div>
            <div class="form-group mt-2">
                <input type="text" name="name" id="name" class="form-control" placeholder="Circular Name">
            </div>
            <div class="form-group my-2">
                            <button class="btn btn-success" onclick="editit()">Edit Data</button>

                            <button class="btn btn-secondary" onclick="backlist()">Circular List</button>
                        </div>
        </form>
        </div>

        <div id="list">
        <table class="table table-hover">
            <thead>
                <tr class="table-success outline-primary">
                    <th scope="row">Circular Id</th>
                    <td>Circular Date</td>
                    <td>Circular Name</td>
                    <td>Action</td>
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
        //hide edit part
        $('#edit').hide();
    
        //send an ajax request at loading products
        $.get("../routes/circular/circular_list1.php", function (res) {
        //display data 
        $("#pro_list").html(res);
        })

        //search emp 
        $("#search_circular").on('input',function(){
            $inputData = $(this).val();

            //send an ajax request 
            $.get("../routes/circular/circularsearch1.php",{searchData:$inputData},function(res){
                $("#pro_list").html(res);
            })
        })
    })

    function delete_pro(oid){
        Swal.fire({
        title: 'Are you sure?',
        text: "Do You want to delete this Circular permanently!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) 
        {
            $.get("../routes/circular/delete_circular.php",{
                uid:oid
            },function (res) {
                if(res="ok"){
            Swal.fire(
            'Successful!',
            'Your Deleted Circular.',
            'success'
            )
            //reload list
            //send an ajax request at loading products
        $.get("../routes/circular/circular_list1.php", function (res) {
        //display data 
        $("#pro_list").html(res);
        })

                }
                else{
                    Swal.fire(
                    'Somethin Wrong',
                    'Can not delete Product.',
                    'error')
                }
            })
        }
        });
     }


     //this is product edit function
     function edit(uid){
         $userid = uid;

        $('#list').hide();
        $('#edit').show();

        $.get("../routes/circular/getcirculardata.php", {
        uid:uid
        }, function (res) {
        var jdata = jQuery.parseJSON(res);
            $("#cid").val(jdata.circuler_id);
            $("#name").val(jdata.name);
            $("#date").val(jdata.date);
          
           
        })
     }

     function backlist(){
        $('#list').show();
        $('#edit').hide();
     }

     function editit(){
            $uid = $("#cid").val();
            $name = $("#name").val();
            $date = $("#date").val();

        Swal.fire({
        title: 'Are you sure?',
        text: "Did You want to edit this Circular details!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Edit it!'
        }).then((result) => {
        if (result.isConfirmed) 
        {
            $.get("../routes/circular/editdata.php",{
                id: $uid,
                un: $name,
                de: $date,
            },function (res) {
                if(res="ok"){
            Swal.fire(
            'Successful!',
            'Your Edit Done.',
            'success'
            )
            $('#list').show();
            $('#edit').hide();
            
            //reload product list
            $.get("../routes/circular/circular_list1.php", function (res) {
            //display data 
            $("#pro_list").html(res);
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
