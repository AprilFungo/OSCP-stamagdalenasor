<?php
session_start();
require_once('../database/connection.php');
unset($_SESSION['adminid']);
unset($_SESSION['userid']);

if (isset($_POST['loginbtn'])) {
  $user = mysqli_real_escape_string($dbc, $_POST['uname']);
  $pass = mysqli_real_escape_string($dbc, $_POST['password']);
  // search in admin
  $q = @mysqli_query($dbc, "SELECT * FROM tbl_admin WHERE clm_username = '$user' AND clm_password = md5('$pass')");
  if (mysqli_num_rows($q) == 1) {
    $row = mysqli_fetch_array($q);
    $_SESSION['adminid'] = $row['clm_adminid'];
    echo '<script>location.replace("../admin");</script>';
  } else {
    // user
    $q = @mysqli_query($dbc, "SELECT * FROM tbl_seniors WHERE clm_username = '$user' AND clm_password = md5('$pass') AND clm_status = 2 AND clm_status !=3");
    if (mysqli_num_rows($q) == 1) {
      $row = mysqli_fetch_array($q);
      $_SESSION['userid'] = $row['clm_scid'];
      echo '<script>location.replace("../user");</script>';
    } else {
      echo '<script type="text/javascript">';
      echo 'alert("Username and Password Incorrect")';
      echo '</script>';
    }
  }
}

if (isset($_POST['submitBtn'])) {
  $fullname = mysqli_real_escape_string($dbc, $_POST['fullname']);
  $citizenship = mysqli_real_escape_string($dbc, $_POST['citizenship']);
  $email = mysqli_real_escape_string($dbc, $_POST['email']);
  $contact = mysqli_real_escape_string($dbc, $_POST['contact']);
  $bday = mysqli_real_escape_string($dbc, $_POST['bday']);
  $bplace = mysqli_real_escape_string($dbc, $_POST['bplace']);
  $address = mysqli_real_escape_string($dbc, $_POST['address']);
  $civil = mysqli_real_escape_string($dbc, $_POST['civil']);
  $religion = mysqli_real_escape_string($dbc, $_POST['religion']);
  //$valid = mysqli_real_escape_string($dbc, $_POST['valid']);
  //$seniorid = mysqli_real_escape_string($dbc, $_POST['seniorid']);
  // check email
  $q = @mysqli_query($dbc, "SELECT * FROM tbl_seniors WHERE clm_email = '$email' AND clm_status != 3");
  if (mysqli_num_rows($q) == 0) {
    $userid = 'SC' . date('ymdhis');
    // upload ID
    $validID = strtotime(date('y-m-d H:i')) . '_' . $_FILES['img']['name'];
    $move = move_uploaded_file($_FILES['img']['tmp_name'], '../uploads/' . $validID);
    $SCID = strtotime(date('y-m-d H:i')) . '_' . $_FILES['img1']['name'];
    $move1 = move_uploaded_file($_FILES['img1']['tmp_name'], '../uploads/' . $SCID);
    // insert into SC
    $q = @mysqli_query($dbc, "INSERT INTO tbl_seniors 
      (clm_scid, clm_fullname, clm_citizenship, clm_email, clm_contact, clm_bday, clm_bplace, clm_address, clm_civil, clm_religion, clm_valid, clm_seniorid) VALUES 
      ('$userid', '$fullname','$citizenship','$email','$contact','$bday','$bplace','$address','$civil','$religion','$validID','$SCID')");
    if ($q) {
      $q = @mysqli_query($dbc, "INSERT INTO tbl_notif (clm_desc) VALUES ('$fullname submitted the registration form and waiting for your approval')");
      $_SESSION['success'] = 'Your registration form has been submitted and subject for review and approval. You will receive an email once approved or declined.';
    } else {
      $_SESSION['error'] = mysqli_error($dbc);
    }
  } else {
    $_SESSION['error'] = 'Email is already in use';
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HOME</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendor/owl.carousel2/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="vendor/owl.carousel2/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendor/bootstrap-select/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="vendor/lightbox2/css/lightbox.min.css">
  <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <!-- Favicon-->
  <link rel="shortcut icon" href="asset/img/favicon.png">
</head>
<style>
  .background-logo {
    background-color: whitesmoke;
  }

  img#cimg {
    max-height: 20vh;
    max-width: 20vw;
  }

  img#cimg1 {
    max-height: 20vh;
    max-width: 20vw;
  }

  #feat {
    border: solid;
    border-radius: 50px;
    border-color: whitesmoke;
    margin-bottom: 15px;
  }

</style>
<!-- <body style="background-image: url(asset/img/view.jpg);background-repeat: no-repeat;background-attachment: fixed;background-size: cover; "> -->
<!-- navbar-->

<body class="background-logo">
  <header class="header fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 py-lg-2">
      <div class="container">
        <img class="navbar-brand" src="asset/img/logooos.png" alt="">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- buttons -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link " href="#LoginModal" data-toggle="modal">Login</a>
            </li>
            <li class="nav-item ml-lg-2 py-2 py-lg-0"><a style="text-decoration: none;" class="btn btn-primary" href="#GuestModal" data-toggle="modal">Register</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!--  Modal GUEST-->
  <div class="modal fade" id="GuestModal" tabindex="-1" role="dialog" aria-labelledby="GuestModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header px-lg-5 ">
          <h5 class="modal-title" id="listingModalLabel">Register</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body px-lg-5">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="form-group col-lg-6">
                <label for="fullName">Full name</label>
                <input required class="form-control form-control-lg" id="fullName" type="text" name="fullname" placeholder="Last name, First name, Middle name" minlength="5" maxlength="50">
              </div>
              <div class="form-group col-lg-6">
                <label for="fullName">Citizenship</label>
                <input required class="form-control form-control-lg" id="fullName" type="text" name="citizenship" placeholder="Citizenship" minlength="5" maxlength="50">
              </div>
              <div class="form-group col-lg-6">
                <label for="email">Email Address</label>
                <input required class="form-control form-control-lg" id="email" type="email" name="email" placeholder="Your email address">
              </div>
              <div class="form-group col-lg-6">
                <label for="email">Contact Number</label>
                <input required class="form-control form-control-lg" id="email" type="text" pattern="[0-9]{11}" name="contact" placeholder="Contact Number">
              </div>
              <div class="form-group col-lg-6">
                <label for="listingUrl">Birtdate</label>
                <input required class="form-control form-control-lg" id="listingUrl" type="date" name="bday" placeholder="MM/DD/YYY">
              </div>
              <div class="form-group col-lg-6">
                <label for="listingUrl">Birth Place</label>
                <input required class="form-control form-control-lg" id="listingUrl" type="text" name="bplace" placeholder="Birth Place" minlength="5" maxlength="100">
              </div>
              <div class="form-group col-lg-12">
                <label for="istingTitle">Address</label>
                <input required class="form-control form-control-lg" id="istingTitle" type="text" name="address" placeholder="Purok Number, Barangay Name, Municipality" minlength="5" maxlength="100">
              </div>
              <div class="form-group col-lg-6">
                <label for="fullName">Civil Status</label>
                <select required class="selectpicker" id="listingType" name="civil" data-style="bs-select-form-control" data-title="Civil Status" data-width="100%" required>
                  <option value="Married">Married</option>
                  <option value="Single">Single</option>
                  <option value="Divorced">Divorced</option>
                  <option value="Widowed">Widowed</option>
                </select>
              </div>
              <div class="form-group col-lg-6">
                <label for="listingUrl">Religion</label>
                <input required class="form-control form-control-lg" id="listingUrl" type="text" name="religion" placeholder="Religion" minlength="5" maxlength="50">
              </div>
              <div class="form-group col-lg-6 mb-lg-0">
                <label for="listingThumb">Upload Valid ID</label>
                <input required class="form-control form-control-lg-2" onchange="displayImg(this,$(this))" id="listingThumb" type="file" name="img">
                <img src="" alt="" id="cimg">
              </div>
              <div class="form-group col-lg-6 mb-lg-0">
                <label for="listingCover">Upload Senior Citizen ID</label>
                <input required class="form-control form-control-lg-2" onchange="displayImg1(this,$(this))" id="listingCover" type="file" name="img1">
                <img src="" alt="" id="cimg1">
              </div>
            </div>

        </div>
        <div class="modal-footer justify-content-start px-lg-5">
          <button class="btn btn-primary" type="submit" name="submitBtn">Submit</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!--  Modal LOGIN-->
  <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content w-75">
        <div class="modal-header px-lg-5">
          <h5 class="modal-title" id="listingModalLabel">LOG IN</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body px-lg-5">
          <form action="" method="POST">
            <div class="row">
              <div class="form-group col-lg-12">
                <label for="fullName">User Name</label>
                <input class="form-control form-control-lg" id="uname" type="text" name="uname" placeholder="Your usernname">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-12">
                <label for="Password">Password</label>
                <input class="form-control form-control-lg" id="Password" type="Password" name="password" placeholder="Input Password">
              </div>
            </div>
        </div>
        <div class="modal-footer justify-content-start px-lg-5">
          <button class="btn btn-primary" type="submit" name="loginbtn">Log in</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Hero section-->
  <section class="py-5">
    <div class="container pt-5">
      <div class="row">
        <div class="col-lg-7 mx-auto text-center">
          <?php
          if (!empty($_SESSION['error'])) {
            echo '
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>' . $_SESSION['error'] . '</strong>
                    </div>';
            unset($_SESSION['error']);
          }
          if (!empty($_SESSION['success'])) {
            echo '
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>' . $_SESSION['success'] . '</strong>
                    </div>';
            unset($_SESSION['success']);
          }
          ?>
          <p class="h6 text-uppercase text-primary pt-5 mt-5">ONLINE PORTAL</p>
          <h1 class="mb-5">Senior Citizen Management System</h1>
          <form class="p-2 rounded shadow-sm bg-white bg-primary" action="#">
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- Features section-->
  <section class="py-5">
    <div class="container py-5">
      <div class="row text-center">
        <div class="col-lg-10 mx-auto">
          <div class="card border-0 shadow">
            <div class="card-body p-5">
              <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                  <!-- <svg class="svg-icon mb-3 text-primary svg-icon-big"> -->

                  <div class="img">
                    <img id="feat" src="asset/img/1.png" alt="">
                  </div>

                  <use xlink:href="#list-details-1"> </use>
                  </svg>
                  <h2 class="h5">Submit Online Application</h2>
                  <p class="text-muted text-small mb-0">Easy to submit Senior Citizen membership application.</p>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                  <div class="img">
                    <img id="feat" src="asset/img/2.png" alt="">
                  </div>

                  <use xlink:href="#survey-1"> </use>
                  </svg>
                  <h2 class="h5">Gather Your Info</h2>
                  <p class="text-muted text-small mb-0">View your personal information and get a printable pdf generated copy.</p>
                </div>
                <div class="col-lg-4">
                  <div class="img">
                    <img id="feat" src="asset/img/3.png" alt="">
                  </div>
                  <use xlink:href="#stack-1"> </use>
                  </svg>
                  <h2 class="h5">Get Updated</h2>
                  <p class="text-muted text-small mb-0">Get informed with announcement and activities for senior citizens.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Categories section-->
  <!-- <section class="pb-5">
      <div class="container pb-5">
        <header class="text-center mb-5">
          <h2 class="mb-1">Explore our Places</h2>
          <p class="text-muted text-small">What in with Sta. Magdalen.</p>
        </header>
        <div class="row text-center">
          <div class="col-lg-4 px-lg-2">
            <div class="categories-item card border-0 shadow mb-4 reset-anchor hover-transition">
              <div class="card-body px-4 py-3">
                <div style="padding-bottom:20px;">
                 <img class="img-fluid" src="asset/img/welcome.jpg">
                </div>
                <h2 class="h5"> <a class="stretched-link reset-anchor-inherit" href="#">Welcome</a></h2>
                <p class="categories-item-number small mb-0">Sta. Magdalena Boundary</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 px-lg-2">
            <div class="categories-item card border-0 shadow mb-4 reset-anchor hover-transition">
              <div class="card-body px-3 py-2">
                <div style="padding-bottom:20px;">
                  <img class="img-fluid" src="asset/img/hall2.jpg">
                </div>
                <h2 class="h5"> <a class="stretched-link reset-anchor-inherit" href="#">Project management</a></h2>
                <p class="categories-item-number small mb-0">City Hall</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 px-lg-2">
            <div class="categories-item card border-0 shadow mb-4 reset-anchor hover-transition">
              <div class="card-body px-3 py-2">
                <div style="padding-bottom:20px;">
                  <img class="img-fluid" src="asset/img/sukibeach.jpg">
                </div>
                <h2 class="h5"> <a class="stretched-link reset-anchor-inherit" href="#">Suki Beach Resort</a></h2>
                <p class="categories-item-number small mb-0">Beach Resort</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
  <!-- Blog Section-->
  <!-- Newsletter section-->
  <section class="pb-5">
    <div class="container pb-5">
      <header class="text-center mb-5">
        <h2>ONLINE SENIOR CITIZEN PORTAL</h2>
        <p>Sta. Magdalena, Sorsogon</p>
      </header>
    </div>
  </section>
  <footer style="background: #111;">
    <div class="container py-4">
      <div class="row py-5">

      </div>
    </div>
  </footer>
  <!-- JavaScript files-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/owl.carousel2/owl.carousel.min.js"></script>
  <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
  <script src="vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
  <script src="vendor/lightbox2/js/lightbox.min.js"></script>
  <script src="js/bootstrap-filestyle.min.js"></script>
  <script src="js/front.js"></script>
  <script>
    function injectSvgSprite(path) {

      var ajax = new XMLHttpRequest();
      ajax.open("GET", path, true);
      ajax.send();
      ajax.onload = function(e) {
        var div = document.createElement("div");
        div.className = 'd-none';
        div.innerHTML = ajax.responseText;
        document.body.insertBefore(div, document.body.childNodes[0]);
      }
    }
    injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
  </script>
  <script>
    function displayImg(input, _this) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#cimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    function displayImg1(input, _this) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#cimg1').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
  <link rel="stylesheet" href="css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</body>

</html>