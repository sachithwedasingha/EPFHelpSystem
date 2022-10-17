<?php
//start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Department of labour</title>
  <!--Link Bootstrap css file-->
  <link rel="stylesheet" href="css/bootstrap.3min.css">
  <!--Link Font awesome css file-->
  <link rel="stylesheet" href="css/all.min.css">
  <!--Link Style sheet css file-->
  <link rel="stylesheet" href="css/style.css">

  <!--Link Font awesome bootstrap and Jquery scrip files-->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/all.min.js"></script>
  <script src="js/index.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <div class="container">
    <div class="row my-4">
      <div class="col-2">
        <a class="nav-link" href="lib/view/about.php" style="color:black; align:center;">About</a>
      </div>
      <div class="col-8">
        <img src="lib/upload/ui/logo.jfif" style="display: block;
  margin-left: auto;
  margin-right: auto;
  width: 60%;">
      </div>
      <div class="col-2">
        <a class="nav-link" id="btn_sign" href="lib/view/login.php" style="color:black;">Sign In</a>
        <a class="nav-link" id="btn_reg" href="lib/view/register.php" style="color:black;">Register</a>
        <a class="dropdown-item" id="btn_user" href="lib/function/logout.php" style="color:red"><i
            class="fas fa-sign-out-alt"></i>Sign Out</a>
      </div>
    </div>
    <hr style="height:2px; color:black;">
    <div id="welcome">
      <div class="container-fluid py-5">
        <div class="card shadow card card border-shadow col-8 center">
          <div class="">
            <div class=" py-0 px-0" style="height:400; " id="image1000">
              <div class="slider" id="slidergal">
                <div class="slides" id="slidersgal">
                  <input type="radio" name="radio-btn" id="radio1">
                  <input type="radio" name="radio-btn" id="radio2">
                  <input type="radio" name="radio-btn" id="radio3">
                  <input type="radio" name="radio-btn" id="radio4">
                  <div class="slidefirst" id="slidefirst">
                    <img src="lib/upload/gallery/01.jpg" alt="">
                  </div>
                  <div class="slide">
                    <img src="lib/upload/gallery/02.jpg" alt="">
                  </div>
                  <div class="slide">
                    <img src="lib/upload/gallery/03.jpg" alt="">
                  </div>
                  <div class="slide">
                    <img src="lib/upload/gallery/04.jpg" alt="">
                  </div>
                  <!-- automatic navigation -->
                  <div class="navigation-auto" id="navigationauto">
                    <div class="auto-btn1" id="autobtn1"></div>
                    <div class="auto-btn2" id="autobtn2"></div>
                    <div class="auto-btn3" id="autobtn3"></div>
                    <div class="auto-btn4" id="autobtn4"></div>
                  </div>
                  <!-- Manual nevigation -->
                  <div class="navigation-manual" id="navigationmanual">
                    <label for="radio1" class="manual-btn" id="manulbtn"></label>
                    <label for="radio2" class="manual-btn" id="manulbtn"></label>
                    <label for="radio3" class="manual-btn" id="manulbtn"></label>
                    <label for="radio4" class="manual-btn" id="manulbtn"></label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container py-5">
        <div class="row">
          <div class="col-6">
            <h3>About EPF ETF</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto dolore sint odit, animi sed laborum iure
              eligendi incidunt. Doloribus molestiae alias, harum repellat illum amet quasi voluptates quis similique
              aperiam.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate dolore exercitationem reiciendis ut
              accusantium. Similique cumque ratione aperiam. Ea, tenetur nesciunt eaque labore nihil cum. Numquam, rem
              deserunt. Laboriosam, minima!</p>
          </div>
          <div class="col-6">
            <img src="lib/upload/ui/20130318444788.jpg" alt="">
          </div>
        </div>
        <div class="row pt-5">
          <div class="col-6">
            <img
              src="lib/upload/ui/group-demonstrators-labour-rights-boards-concept-anger-revolution-group-demonstrators-labour-rights-boards-158346287.jpg"
              alt="" width="500px">
          </div>
          <div class="col-6">
            <h3>Labour Lows</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore laboriosam harum aliquid, accusamus
              non, exercitationem impedit vitae at eum modi, quia ea. Repellendus, ipsum repellat. Ratione officia
              reprehenderit quisquam minima?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis illum perferendis quibusdam ipsa earum
              velit, pariatur ex quae? Nostrum tenetur maiores optio laudantium voluptatem veniam amet iste ullam atque
              architecto.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="user">
    <div class="container px-0 py-2">
      <div class="container">
        <div class="row">
          <div class="col-4 my-5">
            <button type="button" class="btn btn-success" id="button01" style="height:80px; width:250px;">
              <div class="row">
                <div class="col-4"><i class="far fa-clipboard fa-2x"></i></div>
                <div class="col-6"> Application Submission</div>
              </div>
            </button>
            <button type="button" class="btn btn-success my-2" id="button02" style="height:80px; width:250px;">
              <div class="row">
                <div class="col-4"> <i class="far fa-calendar-check fa-2x"></i></div>
                <div class="col-6"> View Your Application Status</div>
              </div>
            </button>
            <button type="button" class="btn btn-success " id="button03" style="height:80px; width:250px;">
              <div class="row">
                <div class="col-4"><i class="far fa-comments fa-2x"></i></div>
                <div class="col-6"> Make an Appoinment</div>
              </div>
            </button>
            <button type="button" class="btn btn-success my-2" id="button04" style="height:80px; width:250px;">
              <div class="row">
                <div class="col-4"><i class="far fa-comment-alt fa-2x"></i></div>
                <div class="col-6"> Feedback</div>
              </div>
            </button>
            <button type="button" class="btn btn-success" id="button05" style="height:80px; width:250px;">
              <div class="row">
                <div class="col-4"><i class="far fa-file-alt fa-2x"></i></div>
                <div class="col-6">EPF Circulars</div>
              </div>
            </button>
            <button type="button" class="btn btn-success my-2" id="button06" style="height:80px; width:250px;">
              <div class="row">
                <div class="col-4"><i class="fas fa-search fa-2x"></i></div>
                <div class="col-6">B-Card Cheker</div>
              </div>
            </button>
          </div>
          <div class="col-7 my-3 mx-3" id="loadContentmain">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <input class="form-control mx-1 my-1" type="hidden" value="<?php
                                    //chek the user session
                                  if(empty($_SESSION['user_id'])){}

                                  else{print_r($_SESSION['user_id']);}?>" id="input_user_id">
  </div>
  <footer>
    <div class="container mt-5 pt-4">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="footer_title">
            <h4 style="color:green">About Company</h4>
          </div>
          <div class="footer_content">
            <div class="footer_logo">
            </div>
            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni
              dolores eos qui ratione voluptatem sequi nesciunt. Neque porro </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-10">
          <div class="footer_title">
            <h4 style="color: green">Contact us </h4>
          </div>
          <div class="footer_content">
            <ul class="contact_details">
              <li><a href="#"><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> 151 Kirula Rd, Colombo
                  00500</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="footer_title">
            <h4 style="color: green">About Us</h4>
          </div>
          <div class="footer_content">
            <div class="footer_social">
              <ul>
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
              </ul>
            </div>
            <li><a href="#"><span><i class="fa fa-envelope"
                    aria-hidden="true"></i></span>executivesecretariat@dol.gov</a></li>
            <li><a href="#"><span><i class="fa fa-phone" aria-hidden="true"></i></span>0112 581 142<br>0112 581 142</a>
            </li>
          </div>
        </div>
      </div>
    </div>
  </footer>
</body>
<script>
  // this script for auto changing gallery
  var counter = 1;
  setInterval(function () {
    document.getElementById('radio' + counter).checked = true;
    counter++;
    if (counter > 4) {
      counter = 1;
    }
  }, 5000)

  //user accunt handeling
  $userid = $("#input_user_id").val();

  //chek user loged or not
  if ($userid == "") {
    $("#btn_user").hide();
    $("#user").hide();

  } else {
    $("#welcome").hide();
    $("#btn_sign").hide();
    $("#btn_reg").hide();
  }

  $('#loadContentmain').load('lib/view/ui.php');
</script>

</html>