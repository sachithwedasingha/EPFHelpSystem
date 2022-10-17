<div class="card border-success py-4 px-4">
    <div class="card-body">
        <div class="row">
                    <h5>Your Application Status</h5>
<div>
    <div class="row">
        <div class="col-3">
        <div class="col-3 border border-primary border-secondary rounded-circle py-3 px-3 my-3 mx-3"  
        style="height:80px; width:80px; text-align:center;" id="log1">
        <i class="fas fa-paperclip fa-2x"></i>
        </div>
        </div>
        <div class="col-3">
        <div class="col-3 border border-primary border-secondary rounded-circle py-3 px-3 my-3 mx-3" 
        style="height:80px; width:80px; text-align:center;" id="log2">
        <i class="far fa-copy fa-2x"></i>
        </div>
        </div>
        <div class="col-3">
        <div class="col-3 border border-primary border-secondary rounded-circle py-3 px-3 my-3 mx-3"  
        style="height:80px; width:80px; text-align:center;" id="log3">
        <i class="fas fa-tasks fa-2x"></i>
        </div>
        </div>
        <div class="col-3">
        <div class="col-3 border border-primary border-secondary rounded-circle py-3 px-3 my-3 mx-3"  
        style="height:80px; width:80px; text-align:center;" id="log4">
        <i class="fas fa-tasks fa-2x"></i>
        </div>
        </div>
        
    </div>
    <idv class="row" style="text-align:center;">
        <div class="col-3">
      <h6>wmployer ckeck</h6>
        </div>
        <div class="col-3">
        <h6>Clarical check</h6>
        </div>
        <div class="col-3">
        <h6>HB Cheking</h6>
        </div>
        <div class="col-3">
        <h6>ACL cheking</h6>
        </div>
    </idv> 
    <div class="row my-3">
        <div class="col-1 border border border-primary " style="background-color:white;"></div>
        <div class="col-3">Still Not</div>
        <div class="col-1 border border border-primary " style="background-color:yellow;"></div>
        <div class="col-3">Progressing</div>
        <div class="col-1 border border border-primary " style="background-color:Chartreuse;"></div>
        <div class="col-3">Done</div>
        <div class="col-1 border border border-primary " style="background-color:red;"></div>
        <div class="col-3">Wrong thing</div>
    </div>
    <div>
      <div id="e1" class="alert alert-dismissible alert-danger">
      <strong>Application Rejected By Employer:</strong>
      <p id="et1"></p>
      </div>
      <div id="e2" class="alert alert-dismissible alert-danger">
      <strong>Application Rejected By Clarical:</strong>
      <p id="et2"></p>
      </div>
      <div id="e3" class="alert alert-dismissible alert-danger">
      <strong>Application Rejected By HB:</strong>
      <p id="et3"></p>
      </div>
      <div id="e4" class="alert alert-dismissible alert-danger">
      <strong>Application Rejected By ACL:</strong>
      <p id="et4"></p>
      </div>

    </div>
   </div>
  </div>
 </div>
</div>

  <script>
      $('#e1').hide();
      $('#e2').hide();
      $('#e3').hide();
      $('#e4').hide();
    
    $.get("lib/routes/Application/getstatus.php", {uid: $userid}, function (res) {
        if(res == ""){
          $('#loadContentmain').load('lib/view/application/submitformb.php');
        }

        else {
          let jdata = jQuery.parseJSON(res);
          let submit=jdata.submit;
          let submiterror = jdata.submiterror;
          let che1 = jdata.chek1;
          let che1error = jdata.chek1Error;
          let che2 = jdata.chek2;
          let che2error = jdata.chek2Error;
          let che3 = jdata.chek3;
          let che3error = jdata.chek3Error;

          let error1 = jdata.submitComment;
          let error2 =  jdata.chek1Comment;
          let error3 = jdata.chek2Comment;
          let error4 = jdata.chek3Comment;


      $('#et1').text(jdata.submitComment);
      $('#et2').text(jdata.chek1Comment);
      $('#et3').text(jdata.chek2Comment);
      $('#et4').text(jdata.chek3Comment);

                  if(submit==1 && submiterror == 0){
                        $("#log1").attr('style',"background-color:Chartreuse; height:80px; width:80px; text-align:center;");
                        $("#log2").attr('style',"background-color:yellow; height:80px; width:80px; text-align:center;");
                  }else if(submiterror == 1){
                        $("#log1").attr('style',"background-color:Red; height:80px; width:80px; text-align:center;");
                        $('#e1').show();
                  }else if(submit==0 && submiterror == 0 && error1 != 0){
                        $("#log1").attr('style',"background-color:yellow; height:80px; width:80px; text-align:center;");
                  };

                  if(che1==1 && che1error == 0){
                        $("#log2").attr('style',"background-color:Chartreuse; height:80px; width:80px; text-align:center;");
                        $("#log3").attr('style',"background-color:yellow; height:80px; width:80px; text-align:center;");
                  }else if(che1error == 1){
                        $("#log2").attr('style',"background-color:Red; height:80px; width:80px; text-align:center;");
                        $('#e2').show();
                  }else if(che1==0 && che1error == 0 && error2 != 0){
                        $("#log2").attr('style',"background-color:yellow; height:80px; width:80px; text-align:center;");
                  };

                  if(che2==1 && che2error == 0){
                        $("#log3").attr('style',"background-color:Chartreuse; height:80px; width:80px; text-align:center;");
                        $("#log4").attr('style',"background-color:yellow; height:80px; width:80px; text-align:center;");
                  }else if(che2error == 1){
                        $("#log3").attr('style',"background-color:Red; height:80px; width:80px; text-align:center;");
                        $('#e3').show();
                  }else if(che2==0 && che2error == 0 && error3 != 0){
                        $("#log3").attr('style',"background-color:yellow; height:80px; width:80px; text-align:center;");
                  };

                  if(che3==1 && che3error == 0){
                        $("#log4").attr('style',"background-color:Chartreuse; height:80px; width:80px; text-align:center;");
                  }else if(che3error == 1){
                        $("#log4").attr('style',"background-color:Red; height:80px; width:80px; text-align:center;");
                        $('#e4').show();
                  }else if(che3==0 && che3error == 0 && error4 != 0){
                        $("#log4").attr('style',"background-color:yellow; height:80px; width:80px; text-align:center;");
                  };
            }
      })
  
  </script>