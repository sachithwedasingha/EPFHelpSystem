$(document).ready(function(){
  
    //lode user image, name and jobtitel
    $.get("../routes/emp/show_current_user.php", function (res) {
        //display data 
        $("#show_current_user").html(res);
      });
    //lode product Count
    $.get("../routes/circular/circularcount.php", function (res) {
        //display data 
        $("#admin_product_count").html(res);
      });
      //load user count
    $.get("../routes/users/usercount.php", function (res) {
         //display data 
        $("#admin_user_count").html(res);
      });

      $.get("../routes/application/applicationcount.php", function (res) {
        //display data 
       $("#admin_service_count").html(res);
     });

     $.get("../routes/meeting/meetingcount.php", function (res) {
      //display data 
     $("#admin_order_count").html(res);
   });


      

    $('#cardadmin01').click(function(){
      $('#adminloadContentSide').load('product/prolist.php');
    });

    $('#cardadmin02').click(function(){
      $('#adminloadContentSide').load('user/userlist.php');
    });

    $('#cardadmin03').click(function(){
      $('#adminloadContent').load('application/allapplication.php');
    });

    $('#cardadmin04').click(function(){
      $('#adminloadContent').load('meeting/meeting1.php');
    });



    //load content to page
    $('#add_employer').click(function(){
        $('#adminloadContent').load('emp/addemployer.php');
    });
    
    $('#edit_employer').click(function(){
      $('#adminloadContent').load('emp/editemployer.php');
     });

    $('#edit_product').click(function(){
        $('#adminloadContent').load('circulars/editcircular.php');
    });

    $('#add_product').click(function(){
      $('#adminloadContent').load('circulars/addcircular.php');
    });

    $('#add_Customer').click(function(){
        $('#adminloadContent').load('user/adduser.php');
    });

    $('#edit_Customer').click(function(){
      $('#adminloadContent').load('user/edit_user.php');
    });

    $('#activate_Customer').click(function(){
      $('#adminloadContent').load('user/activate_user.php');
    });

    $('#bin').click(function(){
      $('#adminloadContent').load('design/bin.php');
    });

    $('#feedback').click(function(){
      $('#adminloadContent').load('feedback/feedbacklist.php');
    });
  
    $('#all').click(function(){
      $('#adminloadContent').load('application/allapplication.php');
    });

    $('#appr01').click(function(){
      $('#adminloadContent').load('application/appr01.php');
    });

    $('#appr02').click(function(){
      $('#adminloadContent').load('application/appr02.php');
    });

    $('#appr03').click(function(){
      $('#adminloadContent').load('application/appr03.php');
    });

    $('#appr04').click(function(){
      $('#adminloadContent').load('application/appr04.php');
    });

    $('#bcard').click(function(){
      $('#adminloadContent').load('bcard/add.php');
    });

    $('#video').click(function(){
      $('#adminloadContent').load('meeting/meeting1.php');
    });
});

