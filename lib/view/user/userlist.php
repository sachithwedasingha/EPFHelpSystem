<div class="container">
    
    <card class="card border-primary py-3 px-3" id="userlist2">
    
    </card>
</div>

<script>
    $(document).ready(function(){
        //send an ajax request at loading employers
        $.get("../routes/emp/user_list2.php", function (res) {
        //display data 
        $("#userlist2").html(res);
        })

    })
</script>