<div class="card border-success py-4 px-4">
    <div class="card-body">
        <div class="row">
            <div class="col-12" >
             <h5 style="text-align:center;">Add Your Meeting Reqwest with Our Officer</h5>
            <div class="card border-danger px-5 my-2">
                    
                    <div class="form-group">
                    <label for="exampleTextarea" class="form-label mt-4">Reson of the appoinment</label>
                    <textarea class="form-control" id="reson" rows="3"></textarea>
                    </div>
                    <div class="row">
                    <div class="col-6">
                    <div class="form-group">
                    <label class="col-form-label mt-2"  for="inputDefault">Enter Your employer id</label>
                    <input type="hidden" class="form-control" id="id">
                    <input type="text" class="form-control" placeholder="EG:-EMP0001" id="eid">
                    </div>
                    </div>
                    <div class="col-5 mt-4"><button  type="button" id="submit" class="btn btn-info my-2 mx-4">Submit</button>
                    </div>
                    </div>
                    </div>
                    <div id="list">

                    </div>
            
            </div>
        </div>
    </div>
</div>
<script>

$("#id").val($('#input_user_id').val());

     $(document).on('click','#submit',function(e){
        e.preventDefault();

            $id = $("#id").val();
            $eid = $("#eid").val();
            $reson = $("#reson").val()
            
        $.get("lib/routes/meeting/addmeeting.php",{
                id: $id,
                eid: $eid,
                reson: $reson,

            },function (res){
                if(res == 'done'){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Reqwest submited successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $.get("lib/routes/meeting/getmeeting.php", {
        uid: $('#input_user_id').val()
    }, function (res) {
    //display data 
    $("#list").html(res);
    })
                    
                    
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        
                    })
                    $.get("lib/routes/meeting/getmeeting.php", {
        uid: $('#input_user_id').val()
    }, function (res) {
    //display data 
    $("#list").html(res);
    })
                    
                }
            })
    });

    $(document).ready(function(){
    
    //send an ajax request at loading products
     
    $.get("lib/routes/meeting/getmeeting.php", {
        uid: $('#input_user_id').val()
    }, function (res) {
    //display data 
    $("#list").html(res);
    })

    
})
</script>
  