<div class="card border-success py-4 px-4">
    <div class="card-body">
        <div class="row">
            <div class="col-12  ">
             <h5  style="text-align:center;">Add Your Feedback <i class="far fa-comment-alt fas-5x"></i></h5>
             <hr>
        <form id="feedback">
            <div class="form-group mt-2">
                <label style="text-align:left">Date</label>
                <input type="date" name="date" id="date" class="form-control" value="<?= date('Y-m-d', time()); ?>"  >
            </div>
            <div class="form-group mt-2">
            <label style="text-align:left">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Eg-kumara@gmail.com">
            </div><div class="col-3">
            <fieldset class="form-group">
            <label style="text-align:left">Feedback type</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type"  id="type" value="good" checked="">
                        <label class="form-check-label" for="optionsRadios1">
                        Good
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type"  id="type" value="bad">
                        <label class="form-check-label" for="optionsRadios2">
                        Bad
                        </label>
                    </div>
                    </div>
            </fieldset>
            <label style="text-align:left">Feedback</label>
            <div class="form-group">
            <textarea class="form-control" name="feedback" id="feedbackc" rows="3"></textarea>
            </div>
            </div>
            <div class="form-group mt-2">
                <button id="btnAddProduct" class="btn btn-success">Submit Feedback</button>
            </div>
        </form>
        </div>
    </div>
</div>


<script>
    // data submition
    $(document).on('click','#btnAddProduct',function(e){
        e.preventDefault();

            $date = $("#date").val();
            $email = $("#email").val();
            $type = $("input:radio[name=type]:checked").val()
            $feedback = $("#feedbackc").val();

        $.get("lib/routes/feedback/addfeedback.php",{
                date: $date,
                email: $email,
                type: $type,
                feedback: $feedback,
            },function (res){
                if(res == 'done'){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'feedback submited successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }else(
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        
                    })
                )
            })
        
            
       
    });

</script>
  