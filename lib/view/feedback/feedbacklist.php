<div class="card border-success py-4 px-4">
    <div class="card-body">
        <div class="row">
            <div class="col-12  " style="text-align:center;">
             <h5>ALL Feedbacks</h5>
             <div class="col-12" id = "alert">
             
            
            </div>
            </div>
        </div>
    </div>
</div>
<script>
 $(document).ready(function(){
    
        //send an ajax request at loading products
        $.get("../routes/feedback/feedbacklist.php", function (res) {
        //display data 
        $("#alert").html(res);
        })

        
    })
</script>
  