<div class="card border-success py-4 px-4">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <h5 style="text-align:center;">All Meeting Reqwests</h5>
                <div class="card border-danger px-5 my-2" id="edit">
                    <div class="form-group">
                        <label for="exampleTextarea" class="form-label mt-4">Reson of the appoinment</label>
                        <textarea class="form-control" id="reson" rows="3" for="disabledInput" readonly=""></textarea>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label mt-2" for="inputDefault">employer id</label>
                                <input type="hidden" class="form-control" id="id" for="disabledInput" readonly="">
                                <input type="text" class="form-control" id="eid" for="disabledInput" readonly="">
                            </div>
                        </div>
                        <h5>Add Applinment Date and time</h5>
                        <div class="form-group">
                        <label for="exampleTextarea" class="form-label mt-4">Applonment date</label>
                        <input type="date" class="form-control" placeholder="EG:-EMP0001" id="date">
                        <label for="exampleTextarea" class="form-label mt-4">Apploinment Time</label>
                        <input type="time" class="form-control" placeholder="EG:-EMP0001" id="time">
                        <label for="exampleTextarea" class="form-label mt-4">Attachment Documents</label>
                        <textarea class="form-control" id="attach" rows="3"></textarea>
                        </div>
                        <div class="form-group my-2">
                            <button class="btn btn-success" onclick="editit()">Submit Data</button>

                            <button class="btn btn-secondary" onclick="backlist()">Applinment List</button>
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
    $('#edit').hide();

    $(document).ready(function () {
        $.get("../routes/meeting/getmeeting1.php", function (res) {
            //display data 
            $("#list").html(res);
        })
    })
   
     //this is product edit function
     function set(id){

        $('#list').hide();
        $('#edit').show();

        $.get("../routes/meeting/getfromid.php", {
        id:id,
        }, function (res) {
        var jdata = jQuery.parseJSON(res);
            $("#id").val(jdata.id);
            $("#reson").val(jdata.reson);
            $("#eid").val(jdata.eid);
          
           
        })
     }

     function backlist(){
        $('#list').show();
        $('#edit').hide();
     }

     function editit(){
            $id = $("#id").val();
            $time = $("#time").val();
            $date = $("#date").val();
            $att = $("#attach").val();

        Swal.fire({
        title: 'Are you sure?',
        text: "Did You want to add this time and date!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, add it!'
        }).then((result) => {
        if (result.isConfirmed) 
        {
            $.get("../routes/meeting/adddate.php",{
                id: $id,
                ti: $time,
                de: $date,
                at: $att,
            },function (res) {
                if(res="ok"){
            Swal.fire(
            'Successful!',
            'Your update Done.',
            'success'
            )
            $('#list').show();
            $('#edit').hide();
            
            //reload product list
            $.get("../routes/meeting/getmeeting1.php", function (res) {
            //display data 
            $("#list").html(res);
        })
                }

                else{
                    Swal.fire(
                    'Somethin Wrong',
                    'Can not update data.',
                    'error')

                    $('#list').show();
                    $('#edit').hide();
                }
                $.get("../routes/meeting/getmeeting1.php", function (res) {
            //display data 
            $("#list").html(res);
        })
               
            })
        }
        });
    }

</script>