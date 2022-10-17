$(document).ready(function () {
 
  
  $('#button01').click(function () {
    $userid = $("#input_user_id").val();
    $.get("lib/routes/Application/getstatus.php", {
      uid: $userid
    }, function (res) {
      if (res == "") {
        $('#loadContentmain').load('lib/view/application/addapplication.php');
      } else {
        let jdata = jQuery.parseJSON(res);
        let ee1 = jdata.submiterror;
        let ee2 = jdata.chek1Error;
        let ee3 = jdata.chek2Error;
        let ee4 = jdata.chek3Error;
        if (ee1 == 1 || ee2 == 1 || ee3 == 1 || ee4 == 1) {
          $('#loadContentmain').load('lib/view/application/reapplication.php');
        } else {
          $('#loadContentmain').load('lib/view/application/Proccessing.php');
        }
      }
    })
  });

  $('#button02').click(function () {
    $('#loadContentmain').load('lib/view/application/status.php');
  });

  $('#button03').click(function () {
    $('#loadContentmain').load('lib/view/meeting/meeting.php');
  });

  $('#button04').click(function () {
    $('#loadContentmain').load('lib/view/feedback/addFeedback.php');
  });

  $('#button05').click(function () {
    $('#loadContentmain').load('lib/view/circulars/circulars.php');
  });

  $('#button06').click(function () {
    $('#loadContentmain').load('lib/view/bcard/finder.php');
  });
})