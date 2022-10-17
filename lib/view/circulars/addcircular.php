<div class="card border-primary">
    <div class="card-body">
        <h5>Add New Circular</h5>
        <hr>
        <form id="addProductForm"  enctype="multipart/form-data">
            <div class="form-group mt-2">
                <input type="date" name="date" id="date" class="form-control" value="<?= date('Y-m-d', time()); ?>"  >
            </div>
            <div class="form-group mt-2">
                <input type="text" name="name" id="name" class="form-control" placeholder="Circular Name">
            </div>
            <div class="form-group mt-2">
                <input class="form-control mt2" type="file" id="productImg" name="productImg">
            </div>
            <div class="form-group mt-2">
                <button id="btnAddProduct" class="btn btn-success">Add Circular</button>
            </div>
        </form>
    </div>
</div>

<script>
    // data submition
    $(document).on('click','#btnAddProduct',function(e){
        e.preventDefault();
        var form = $("#addProductForm")[0];

        var formData = new FormData(form);

        $.ajax({
            url:"../routes/circular/addcircular.php",
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {
                swal.fire(data);
            },
            error: function (data) {
                swal.fire(data);
            }
            
        });
    });

</script>
