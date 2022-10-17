<div class="card border-success py-4 px-4">
    <div class="card-body">
        <div class="row">
            <div class="col-12  " style="text-align:center;">
             <h5>B-Card Registration Data</h5>
             <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Bcard Number</label>
      <input type="text" class="form-control" id="bid"  placeholder="Eg:-BCD0000">
      <div class="row py-2 px-5 mx-5">
      <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">User Name</label>
      <input type="text" class="form-control" id="bname"  placeholder="Eg:-Saman">
      <div class="row py-2 px-5 mx-5">
      <button type="button" class="btn btn-info mx-3" id="bbn" style="height:50px;"><i class="fas fa-add"></i>Add to databace</button>
      </div>
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

             </div>
            </div>
        </div>
    </div>
</div>

<script>
     $('#bbn').click(function (e) {
           $bid = $("#bid").val();
           $bname = $("#bname").val();

           if($bid==""){
            Swal.fire(
                    'Empty Fealds?',
                    'Enter number and add again?',
                    'error'
                    );
           }else{
                $.get("../routes/bcard/add.php", {
                    uid:$bid,
                    bna:$bname
                    }, function (res) {
                if(res=="1"){
Swal.fire(
  'REGISTERD?',
  'Your B-Card Registerd Successfully?',
  'success'
)
                }else{
                    Swal.fire(
  'NOT REGISTERD',
  'Your B-Card is not Registerd yet?',
  'error'
)
                }
                })
           }
           
     })
</script>