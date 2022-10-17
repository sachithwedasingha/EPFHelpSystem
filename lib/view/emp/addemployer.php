<div class="card border-primary">
    <div class="card-body">
        <h5>Add New Employer</h5>
        <hr>
        <form id="addEmployerForm" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">
                    <div class="form-group mt-2">
                        <input type="text" name="empfirstName" id="empfirstName" class="form-control"
                            placeholder="Employer First Name">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mt-2">
                        <input type="text" name="empsecondName" id="empsecondName" class="form-control"
                            placeholder="Employer Second Name">
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <label>Birthday </label>
                <input type="date" class="form-control" di="empBirthday" name="empBirthday">
            </div>
            <div class="form-check">
                <div class="row mt-3">
                    <div class="col-4">
                        <label>Select Gender</label>
                    </div>
                    <div class="col-4">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="empGender" id="empGender" value="Male"
                                checked="">
                            Male
                        </label>
                    </div>
                    <div class="col-4">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="empGender" id="empGender" value="female"
                                checked="">
                            Female
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <label>Employer Picture </label>
                <input class="form-control mt2" type="file" id="empImg" name="empImg">
                <img src="" alt="" id="imgPrev" height="200" widh="400">
            </div>
            <div class="form-group col-md-5 mt-3">
                <input type="text" name="empNIC" id="empNIC" class="form-control" placeholder="Employer NIC Number">
            </div>
            <h5>Contact Details</h5>
            <div class="form-group mt-3">
                <textarea class="form-control" name="empAddress" id="empAddress" placeholder="Employer Address"
                    rows="3"></textarea>
            </div>
            <div class="form-group col-md-5 mt-2">
                <input type="text" name="empPhone" id="empPhone" class="form-control"
                    placeholder="Employer Phone Number">
            </div>
            <div class="form-group col-md-5 mt-2">
                <input type="text" name="empEmail" id="empEmail" class="form-control"
                    placeholder="Employer Email Address">
            </div>
            <h5>Job Details</h5>
            <hr>
            <div class="form-group col-md-6 mt-2">
                <select class="form-select" name="empJobTitle" id="empJobTitle">
                    <option value="0">Select Job Position</option>
                    <option value="Admin">Admin</option>
                    <option value="Clarical">Clarical</option>
                    <option value="HB">HB</option>
                    <option value="ACL">ACL</option>
                    <option value="EMP">EMP</option>
                </select>
            </div>
            <div class="form-group col-md-6 mt-2">
                <select class="form-select" name="empJobType" id="empJobType">
                    <option value="0">Select Job Type</option>
                    <option value="Full Time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                </select>
            </div>
            <div class="form-group col-md-6 mt-2">
                <select class="form-select" name="empJobLevel" id="empJobLevel">
                    <option value="0">Select Job Level</option>
                    <option value="Tranee">Tranee</option>
                    <option value="Internship">Internship</option>
                    <option value="Junior">Junior</option>
                    <option value="Senior">Senior</option>
                </select>
            </div>
            <div class="form-group mt-2">
                <button id="btnAddEmployer" class="btn btn-success">Add Employer</button>
            </div>
        </form>
    </div>
</div>

<script>
    $("#empImg").change(function () {
        var fileRead = new FileReader();
        fileRead.onload = function (e) {
            $("#imgPrev").attr('src', e.target.result);
            $("#imgPrev").attr('style', "height:200px;widh:400px");
        }
        fileRead.readAsDataURL(this.files[0]);
    })

    $(document).on('click','#btnAddEmployer',function(e){
        e.preventDefault();
        var form = $("#addEmployerForm")[0];

        var formData = new FormData(form);

        $.ajax({
            url:"../routes/emp/addEmployer.php",
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {
                // alert(data);
                Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'employeer registerd Successfully please refure Enterd Email',
  showConfirmButton: false,
  timer: 1500
})
            },
            error: function (data) {
                alert(data);
            }
            
        });
    });

   
</script>